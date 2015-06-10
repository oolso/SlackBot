<?
	define("__ROOT__", __DIR__);

	include __ROOT__ . "/config.php";
	include __ROOT__ . "/lib/util.php";
	include __ROOT__ . "/lib/Snoopy.class.php";

	include_glob(__ROOT__ . "/model/*.php");