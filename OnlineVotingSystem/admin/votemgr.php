<style>body{ background:#333;} a{ color:#FFFFFF; font-weight:bold; text-decoration:none; border:1px #999 solid; padding:2px; background:#2E6DA2;} td { background:#F0F0F0;} td:hover { background:#FFFFDD;}  </style>

<?php session_start();
include_once('../db.php');
ses_chk();
//echo "<table width="200" border="0"><tr><td>";
echo '<div align="center">';
echo " <a class='botam' href='votemgr.php'>Vote. Manager</a>&nbsp;&nbsp;";
echo " <a class='botam' href='cand_add.php'>Add New Candidate</a>&nbsp;&nbsp;";
echo " <a class='botam' href='cand.php'>Candidate Manager</a>&nbsp;&nbsp;";
//echo " <a class='botam' href='#'>Party Manager</a>&nbsp;&nbsp;";
echo " <a class='botam' href='admin.php'>Voter Manager</a>&nbsp;&nbsp;";
echo " <a class='botam' href='page_add.php'>Add New Voter</a>&nbsp;&nbsp;";
echo " <a class='botam' href='pending.php'>Panding Voter</a>&nbsp;&nbsp;";
echo '<br/><br/>';

if(isset($_GET['ac'])&&($_GET['ac']=='off')){ echo 'Voing Closed'; $st=mysql_query("UPDATE voteflag SET start='0' WHERE start='1'"); }
if(isset($_GET['ac'])&&($_GET['ac']=='on')){ echo 'Voing Open'; $st=mysql_query("UPDATE voteflag SET start='1' WHERE start='0'"); }



$total=mysql_query("SELECT * FROM election");
$to=mysql_num_rows($total);

echo "<table border='1'>";
echo "<tr><td>id</td><td>Vote</td><td> Vote %</td></tr>";

$id=0; 
$can=mysql_query("SELECT * FROM candidate");

while($crow=mysql_fetch_array($can))
{
$ctmp=$crow['id'];

$qry=mysql_query("SELECT * FROM election WHERE vote='$ctmp'");
$id=mysql_num_rows($qry);

$px=($id/$to)*100;
echo "<tr><td>".$ctmp."</td><td>".$id."</td><td>".$px."</td></tr>";
$id=0;

}


echo "</table>";
echo "<br><br><a href='votemgr.php?ac=off'>Close Voting line</a>";
echo "<br><br><a href='votemgr.php?ac=on'>Open Voting line</a>";
echo '</div>';


?>