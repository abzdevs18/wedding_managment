<?php

function redirect($page){
	header("Location: " . URL_ROOT . '/' . $page);
}

function setupRedirect($page){
	header("Location: http://" . $_SERVER['SERVER_NAME'] . '/wedding_cms/' . $page);
}