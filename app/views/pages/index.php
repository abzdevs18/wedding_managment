<?php require_once APP_ROOT . '/views/inc/header.php'; ?>

<h1><?=$data['title'];?></h1>
<li class="nav" data-page="home"><a href="<?=URL_ROOT.'/pages/about';?>">HOME</a></li>
<li class="nav" data-page="home"><a href="<?=URL_ROOT.'/pages/signup';?>">Signup</a></li>
<?php require_once APP_ROOT . '/views/inc/footer.php'; ?>