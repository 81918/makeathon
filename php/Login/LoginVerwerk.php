<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Make-a-thon</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="main.css">
    <!--BOOTSTRAPCSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--JS|Popper|Jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--JAVESCRIPT-->
</head>
<body>
<!--Header-->
<header>
    <!--Nav-->
</header>

<!--Main-->
<main>
    <!--Chat-->
    <?php
    /*
     * variable
     */
    $contact = "../Contact/contact.php";

// login check
 $login = ["Level" => null];
 $_SESSION['Login'] = $login;
//    $_POST['Username'] = null;
    /*
     *  check of je in bent gelogt
     */
    if (!isset($_SESSION['Login']['Level'])){
        $login = true;
    } else {

        ?>

        <h1 class="error">Oops!</h1>
        <p class="error">U bent al ingelogt.</p>

    <?php

    }
    /*
     * check of velden niet leeg zijn
     */
    if ($login == true) {
        if (isset($_POST['submit']) && isset($_POST['submit'])) {
            $SubmitFilled = true;
        } else {
            echo "<p class='error'>form is niet verstuurd.</p>";
        }
        if (isset($_POST['Username']) && isset($_POST['Username'])) {
            $UsernameFilled = true;
        } else {
            echo "<p class='error'>Username is niet ingevuld.</p>";
        }
        if (isset($_POST['Password']) && isset($_POST['Password'])) {
            $PasswordFilled = true;
        } else {
            echo "<p class='error'>Password is niet ingevuld.</p>";
        }

    }

    /*
     * check of token klopt en/of is ingevuld
     */
    if (isset($SubmitFilled) && $SubmitFilled == true &&
        isset($UsernameFilled) && $UsernameFilled == true &&
        isset($PasswordFilled) && $PasswordFilled == true ) {
        if (isset($_POST['token']) && isset($_POST['submit'])) {
            $SubmitFilled = true;
        } else {
            echo "<p class='error'>form is niet verstuurd.</p>";
        }
    }

    /*
     * check of de string length klopt
     */
    if (isset($SubmitFilled) && $SubmitFilled == true &&
        isset($UsernameFilled) && $UsernameFilled == true &&
        isset($PasswordFilled) && $PasswordFilled == true ) {
        /*
         * check of Password klein of groot genoeg is
         */
        if (strlen($_POST['Username']) <= 20 && strlen($_POST['Username']) >= 8) {
            $UsernameLength = true;
        } else {
            echo "<p class='error'>Username is niet groter dan 8 characters of kleiner dan 20 characters.</p>";
        }

        /*
         * check of Password klein of groot genoeg is
         */
        if (strlen($_POST['Password']) <= 40 && strlen($_POST['Password']) >= 8) {
            $PasswordLength = true;
        } else {
            echo "<p class='error'>Password is niet groter dan 8 characters of kleiner dan 40 characters.</p>";
        }
    }

    /*
     * check of het voldoet aan de eisen
     */
    if (isset($UsernameLength) && $UsernameLength == true &&
        isset($PasswordLength) && $PasswordLength == true ) {
        /*
         * check of de username is ingevuld
         */
        $UsernamePattern = "/^[a-z\d_]{8,20}$/i";
        if (preg_match($UsernamePattern, $_POST['Username']) ) {
            $UsernamePCheck = true;
        } else {
            echo "<p class='error'>Username voldoet niet aan de eisen.</p>";
        }

        /*
         * check of de password is ingevuld
         */
        $PasswordPattern = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#-_?$%]{8,40}$/";
        if (preg_match($PasswordPattern, $_POST['Password']) ) {
            $PasswordPCheck = true;
        } else {
            echo "<p class='error'>Password voldoet niet aan de eisen.</p>";
        }
    }

    require '../functions/InternalError.php';

    /*
     * initalize Statement
     */
    if(isset($UsernamePCheck) && $UsernamePCheck == true &&
        isset($PasswordPCheck) && $PasswordPCheck == true) {

        require '../makeathonConfig.inc.php';

        $StmtInit = false;
        if ($stmt = mysqli_stmt_init($mysqli)) {
            $StmtInit = true;
        } else {
            echo InternalError("../contact/contact.php", "Login1010");
        }
    }

    /*
     * berijd statement voor
     */
    if(isset($StmtInit) && $StmtInit == true ) {

        $query = "SELECT `Naam`, `Level` FROM `user` WHERE Naam = ? AND Wachtwoord = ?";

        $StmtPrep = false;
        if (mysqli_stmt_prepare($stmt, $query)) {
            $StmtPrep = true;
        } else {
            echo InternalError($contact, "Login1020");
        }
    }

    /*
     * verbind de vraagtekens met een value
     */
    if(isset($StmtPrep) && $StmtPrep == true ) {

        $StmtBind = false;
        $PasswordHash = hash("sha512", $_POST['Password']);
        $UsernameSecure = mysqli_escape_string($mysqli, htmlentities($_POST['Username']));
        if (mysqli_stmt_bind_param($stmt, "ss",$UsernameSecure, $PasswordHash)) {
            $StmtBind = true;
        } else {
            echo InternalError($contact, "Login1030");
        }
    }

    /*
     * execute statemtent
     */
    if(isset($StmtBind) && $StmtBind == true ) {

        $StmtExe = false;
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            $StmtExe = true;
        } else {
            echo InternalError($contact, "Login1040");
        }
    }

    /*
     * check of het account gevonde is
     */
    if(isset($StmtExe) && $StmtExe == true ) {
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // verbind de opgehaalde gegevends aan een variable
            mysqli_stmt_bind_result($stmt, $username, $level);
            mysqli_stmt_fetch($stmt);
            session_regenerate_id();
            $login = ['Username' => $username, 'Level' => $level];
            $_SESSION['Login'] = $login;
            echo "u bent nu ingelogt";

        } else {
            echo "<p class='error'>Het account kon niet gevonde worden.</p>";
        }
    }
    ?>
</main>

<!--Footer-->
<footer>
    <!--Copyright Claims-->
</footer>
</body>
</html>