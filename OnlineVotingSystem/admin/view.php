<?php 
session_start();
include_once('../lib/db.php');
ses_chk();
$id=$_GET['id'];

echo "<div align='center'><br /> <a class='botam' href='page_add.php'>Add New Page</a><br /><br />";
echo "<table border='1'>";
echo "<tr><td>ID</td><td>Page Name</td><td>Content</td><td>Ads</td><td>Extra</td></tr>";
$qry=mysql_query("SELECT * FROM page WHERE id='$id'");
while($row=mysql_fetch_array($qry))
{
echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['content']."</td><td>".$row['ads']."</td><td>".$row['ext']."</td> ";

echo "<td><a href='page_edit.php?id=$id'>Edit</a></td><td><a href='del.php?id=$id'>Delete</a></td></tr>";

}
echo "</table>";
echo "<br /><a class='botam' href='admin.php'>Back to Admin Panel</a></div>";

?>
