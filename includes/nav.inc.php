<?php 
    $currentPage = $_SERVER['SCRIPT_NAME'];
    $parts = explode("/",$currentPage);
?>

<nav class=nav>
    <li class="nav__item"><a href="index.php"><img src="images/home.svg" alt="home" class="<?php if($parts[count($parts)-1] == "index.php" OR $parts[count($parts)-1] == "vers.php" OR $parts[count($parts)-1] == "eetbaar.php" OR $parts[count($parts)-1] == "vervalt.php" OR $parts[count($parts)-1] == "detail.php" ) echo "current current--home"; ?>"></a></li>
    <li class="nav__item"><a href="search.php"><img src="images/icon/search.svg" alt="search" class="<?php if($parts[count($parts)-1] == "search.php") echo "current current--search"; ?>"></a></li>
    <li class="nav__item"><a href="list.php"><img src="images/list.svg" alt="list" class="<?php if($parts[count($parts)-1] == "list.php") echo "current current--list"; ?>"></a></li>
    <li class="nav__item"><a href="graphic.php"><img src="images/graphic.svg" alt="graphic" class="<?php if($parts[count($parts)-1] == "graphic.php") echo "current current--graphic"; ?>"></a></li>
    <li class="nav__item"><a href="account.php"><img src="images/account.svg" alt="account" class="<?php if($parts[count($parts)-1] == "account.php") echo "current current--account"; ?>"></a></li>
</nav>