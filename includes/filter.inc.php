<?php 
    $currentPage = $_SERVER['SCRIPT_NAME'];
    $parts = explode("/",$currentPage);
?>

<header>
    <ul class=filter>
        <li class="filter__item"><a href="index.php" class="<?php if($parts[count($parts)-1] == "index.php") echo "active"; ?>">Alles</a></li>
        <li class="filter__item"><a href="vers.php" class="<?php if($parts[count($parts)-1] == "vers.php") echo "active"; ?>">Vers</a></li>
        <li class="filter__item"><a href="eetbaar.php" class="<?php if($parts[count($parts)-1] == "eetbaar.php") echo "active"; ?>">Eetbaar</a></li>
        <li class="filter__item"><a href="vervalt.php" class="<?php if($parts[count($parts)-1] == "vervalt.php") echo "active"; ?>">vervalt</a></li>
    </ul>
</header>