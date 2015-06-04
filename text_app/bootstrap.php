<?php
session_start();
error_reporting(E_ALL);
include("text_app_connect/mysql_connect.php");
include("create_user.php");
include("create_event.php");
include("validate_user.php");
?>