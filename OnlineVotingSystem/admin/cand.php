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

echo "<table border='1'>";
echo "<tr><td>id</td><td>name</td><td>Qualification</td>
	<td>Gender</td><td>dob</td>
	<td>add</td><td>pic</td>
	<td>status</td><td>nation</td>
	<td>area</td><td>pinp</td>
	<td>party</td></tr>";

$qry=mysql_query("SELECT * FROM candidate");
while($row=mysql_fetch_array($qry))
{
$id=$row['id'];

	
	echo "<tr><td><a href='view.php?id=$id'>".$row['id']."</a></td>
	<td>".$row['name']."</td><td>".$row['Qualification']."</td>
	<td>".$row['Gender']."</td>
	<td>".$row['dob']."</td><td>".$row['add']."</td>
	<td><img src='../".$row['pic']."' height='100' width='100'></td><td>".$row['status']."</td>
	<td>".$row['nation']."</td><td>".$row['area']."</td>
	<td>".$row['pinp']."</td><td>".$row['party']."</td>
	<td><a href='cand_edit.php?id=$id'>Edit</a></td>
	<td><a href='cdel.php?id=$id'>Delete</a></td></tr>";	

}
echo "</table>";

echo '</div>';
	


?>