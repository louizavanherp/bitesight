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
    <main class="container container__account">

        <h1 class="account__title">MIJN PROFIEL</h1>

        <div class="account__basicInformation">
            
            <div class="account__basicInformation__details">
                <h2 class="account__basicInformation__details__name">Margot</h2>
                <p class="account__basicInformation__details__email">Margot.Desmet@gmail.com</p>
            </div>

            <a href="#" class="account__basicInformation__icon"><img src="images/icon/edit_yellow.svg" alt="edit pencil"></a>
        </div>

        <div class="account__changePassword">
            <a class="account__changePassword__link" href="#">WACHTWOORD VERANDEREN</a>
        </div>

        <div class="account__household">
            <p class="account__household__title">Huishouden samenstellen</p>
            <div class="account__household__newMember">
                <img src="images/icon/add_people.svg" alt="add people">
                <input type="text" name="addMember" placeholder="Voeg familielid toe">
            </div>
            <ul class="account__household__members">
                <li>EmilyBerghem@gmail.com</li>
                <li>MichelleSchutlz@hotmail.com</li>
                <li>Louiza.vanherp@gmail.com</li>
            </ul>
        </div>

        <a href="#" class="account__invitation">Verstuur uitnodiging </a>
    </main>
    <?php include_once("includes/nav.inc.php") ?>
</body>
</html>