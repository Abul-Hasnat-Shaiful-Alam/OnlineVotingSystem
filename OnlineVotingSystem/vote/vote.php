<?php 
session_start();
include('../db.php');
ses_chk();
$v=$_GET['v'];
$vid=$_SESSION['admin'];
$date=date('Y-m-d');
$status='OK';

$out[]=select_qry('*','voter','vid',$vid);
$area=$out[0]['area'];

mysql_query("INSERT INTO election (vid,vote,date,status,area) VALUES ('$vid','$v','$date','$status','$area')");
echo 'done'.$v;
echo '<br>'.time().'<br>'.date('d:m:Y');

session_unset();
session_destroy();
echo '<meta http-equiv="refresh" content="5;url=../index.php">';
?>
