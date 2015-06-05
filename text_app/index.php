<?php
include("text_app_connect/mysql_connect.php");

$route = $_SERVER['REQUEST_URI'];

switch($route){

  case "/":
    Core::render('homepage.php');
    break;

  case "/login":
    Core::render('login.php');
    break;

  case "/schedule":
    Core::render('schedule.php');
    break;

  case "/user_events":
    Core::render('user_events.php', ['futureEvents' => populate_future(), 'pastEvents' => populate_past()]);
    break;
}

?>