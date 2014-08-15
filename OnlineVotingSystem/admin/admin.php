<style> body{ background:#333;} 
a{ color:#FFFFFF; font-weight:bold; text-decoration:none; border:1px #999 solid; padding:2px; background:#2E6DA2;} 
td { background:#F0F0F0;} td:hover { background:#FFFFDD;}  
</style>
<?php session_start();
include_once('../db.php');
ses_chk();

echo '<div align="center">';
echo " <a class='botam' href='votemgr.php'>Vote. Manager</a>&nbsp;&nbsp;";
echo " <a class='botam' href='cand_add.php'>Add New Candidate</a>&nbsp;&nbsp;";
echo " <a class='botam' href='cand.php'>Candidate Manager</a>&nbsp;&nbsp;";

echo " <a class='botam' href='admin.php'>Voter Manager</a>&nbsp;&nbsp;";
echo " <a class='botam' href='page_add.php'>Add New Voter</a>&nbsp;&nbsp;";
echo " <a class='botam' href='pending.php'>Panding Voter</a>&nbsp;&nbsp;";
echo '<br/><br/>';



echo "<table border='1'>";
echo "<tr><td>id</td><td>pass</td><td>usr</td>
	<td>f_name</td><td>m_name</td>
	<td>dob</td><td>blood</td>
	<td>pic</td><td>p_add</td>
	<td>h_add</td><td>flag</td>
	<td>vid</td><td>area</td></tr>";

$qry=mysql_query("SELECT * FROM voter");
while($row=mysql_fetch_array($qry))
{
$id=$row['id'];

	
	echo "<tr><td>".$row['id']."</td>
	<td>".$row['pass']."</td><td>".$row['usr']."</td>
	<td>".$row['f_name']."</td><td>".$row['m_name']."</td>
	<td>".$row['dob']."</td><td>".$row['blood']."</td>
	<td><img hight='120' width='120' src='../".$row['pic']."'></td><td>".$row['p_add']."</td>
	<td>".$row['h_add']."</td><td>".$row['flag']."</td>
	<td>".$row['vid']."</td><td>".$row['area']."</td>
	<td><a href='page_edit.php?id=$id'>Edit</a></td>
	<td><a href='del.php?id=$id'>Delete</a></td></tr>";	

}
echo "</table>";

echo '</div>';
	
	?>