<?php
//session_start();
$class =$_SESSION["staff"]["name"];
$sid = $_SESSION["staff"]["id"];
$studentid = $_SESSION["staff"]["empid"];
//var_dump($studentid);
include("connect.php");
$department =0;
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
    $ins3 = new fetchtable3;
    $tab = 'course';
    $department = $ins->viewtab("$tab");
    $tab = 'student';
    $students = $ins->viewtab("$tab");
    $tab = 'test';
    $examination = $ins->viewtab("$tab");
    $tab = 'subject';
    $subjects = $ins->viewtab("$tab","teacher","$class");
    $tab = 'assignment';
    $categories = $ins->viewtab("$tab","assignment","$class");
    $tab = 'notice';
    $notice = new fetchnotice;
    $notice = $notice->viewtab("T");
    $tab = 'fees';
    $questions = $ins->viewtab("$tab");

?>