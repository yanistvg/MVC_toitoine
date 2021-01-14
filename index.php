<?php
session_start();
require("controller/controller.php");
require_once("model/userManager.class.php");
require_once("model/secondUser.class.php");

if(isset($_GET["page"]))
{
	switch ($_GET["page"]) {
		case 'connect':
			connect();
			break;
		case 'admint1':
			admint1();
			break;
		case 'admint2':
			admint2();
			break;
		default:
			connect();
			break;
	}
}
else
{
	connect();
}