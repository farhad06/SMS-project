<?php
//session_start();
$class =$_SESSION["student"]["class"];
$sid = $_SESSION["student"]["id"];
$studentid = $_SESSION["student"]["studentid"];
include("connect.php");
$assignment = 0;
$students = 10;
$examination = 0;
$subjects = 0;
$categories = 0;
$notice = 0;
$questions = 0;
$banned_students = 0;
$std_fails = 0;
$std_pass = 0;

    include ('model/helper.class.php');
    $ins = new fetchtable;
    $tab = 'assignment';
    $assignment = $ins->viewtab("$tab","class","$class");
    $tab = 'student';
    $students = $ins->viewtab("$tab","class","$class");
    $tab = 'test';
    $examination = $ins->viewtab("$tab","class","$class");
    $tab = 'subject';
    $subjects = $ins->viewtab("$tab","class","$class");
    $tab = 'assignment';
    $assignment = $ins->viewtab("$tab","class","$class");
    $tab = 'exam';
    $categories = $ins->viewtab("$tab","sid","$sid");
    $tab = 'notice';
    $notice = new fetchnotice;
    $notice = $notice->viewtab("S");
    $tab = 'fees';
    $questions = $ins->viewtab("$tab","studentid","$studentid");



?>