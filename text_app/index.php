<?php
phpinfo();
session_start();
include("text_app_connect/mysql_connect.php");
include('User_class.php');
include('Event_class.php');
include('Event_Table.php');
//session_start();

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

  case "/logout":
    Core::render('logout.php');
    break;

  case "/user_events":
    Core::render('user_events.php', ['futureEvents' => Event_Table::populate_future(), 'pastEvents' => Event_Table::populate_past()]);
    break;
}

?>