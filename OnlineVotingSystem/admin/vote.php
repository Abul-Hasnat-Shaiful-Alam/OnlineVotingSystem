<style>body{ background:#333;} a{ color:#FFFFFF; font-weight:bold; text-decoration:none; border:1px #999 solid; padding:2px; background:#2E6DA2;} td { background:#F0F0F0;} td:hover { background:#FFFFDD;}  </style>

<?php 
include_once('../db.php');
ses_chk();
$qry=mysql_query("SELECT * FROM election");

echo "<table border='1'>";
echo "<tr><td>id</td><td>VID</td><td>Date</td>
	<td>Time</td><td>Area</td>
	<td>Valid Vote</td><td>Status</td></tr>";

while($row=mysql_fetch_array($qry))
{

echo "<tr><td><a href='view.php?id='>".$row['id']."</a></td>
	<td>".$row['vid']."</td><td>".$row['date']."</td>
	<td>".$row['time']."</td>
	<td>".$row['area']."</td><td>".$row['vote']."</td>
	<td>".$row['status']."</td>
	<td><a href='page_edit.php?id='>Edit</a></td>
	<td><a href='del.php?id='>Delete</a></td></tr>";	

}

?>