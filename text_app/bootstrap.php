<?php
session_start();
error_reporting(E_ALL);
include("create_user.php");
include("create_event.php");
include("validate_user.php");
include("display_events.php");
?>