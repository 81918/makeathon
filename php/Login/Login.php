<?php
session_start();
// Maak een encrypred key
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token;
// zet de key in de session

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
    if (!isset($_SESSION['Login']['level'])) {
    ?>
        <form action="LoginVerwerk.php" method="post">
            <input type="hidden" name="crsfToken" value="<?php echo $token;?>">
            <table>
                <tr>
                    <td><input type="text" name="Username" maxlength="20" placeholder="Username"></td>
                </tr>
                <tr>
                    <td><input type="password" name="Password" maxlength="40" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Login"></td>
                </tr>
            </table>
        </form>
    <?php
    } else {
    ?>
        <h1>Oops!</h1>
        <p class="error">U bent al ingelogt.</p>
    <?php
    }
    ?>
</main>

<!--Footer-->
<footer>
    <!--Copyright Claims-->
</footer>
</body>
</html>