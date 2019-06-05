<?php
session_start();
// Maak een encrypred key
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['crsfToken'] = $token;
// zet de key in de session

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login | Make-a-thon</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
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
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Log in bij <b>BrownieStreaming!</b></h5>
                            <form id="LoginForm" action="LoginVerwerk.php" method="post">
                                <input type="hidden" name="crsfToken" value="<?php echo $token;?>">
                                <div class="form-label-group">


                                    <input type="text" name="Username" id="gebruikersnaam" maxlength="20" class="form-control" placeholder="Username" required autofocus>
                                    <label for="gebruikersnaam">Username</label>
                                </div>

                                <div class="form-label-group">


                                    <input type="password" name="Password" id="wachtwoord" maxlength="40"  class="form-control" placeholder="Password" required>
                                    <label for="wachtwoord">Wachtwoord</label>
                                </div>
                                <input name="Submit" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Login">
                            </form>
                        <hr class="my-4">
                        <h5 class="text-center">Nog geen account?</h5><a class="nav-link" href="#">
                            <button href="#" class="btn btn-lg btn-danger btn-block">Aanmelden</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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