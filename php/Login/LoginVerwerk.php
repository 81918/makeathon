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

    if (!isset($_SESSION['Login']['Level']) && $_SESSION['Login']['Level'] == 0) {

    }

    // test
    echo "<pre>";
    var_dump($_POST,$_SESSION);
    echo "</pre>";
    ?>
</main>

<!--Footer-->
<footer>
    <!--Copyright Claims-->
</footer>
</body>
</html>