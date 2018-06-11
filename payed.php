<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container container__payed">

        <a class="payed__cross" href="index.php"><p>&#x2715;</p></a>

        <div class="payed__txt">
        <h2>Bedankt voor je aankopen!</h2>
        <p>je kan je aankopen terugvinden in je voorraad.</p>
        </div>

        <a href="index.php" class="payed__btn">Bekijk voorraad </a>
    </main>

    <footer class="footer footer__account">
    <?php include_once("includes/confirmationInvitation.inc.php") ?>
    <?php include_once("includes/nav.inc.php") ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>