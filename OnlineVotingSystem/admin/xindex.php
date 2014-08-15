<?php
session_start();
include('../db.php');
if(isset($_POST['submit'])){
$uname=md5(db_real($_POST['uname']));
$upass=md5(db_real($_POST['upass']));

$qry=mysql_query("SELECT * FROM user WHERE name='$uname'");
$num=mysql_num_rows($qry);
while($row=mysql_fetch_array($qry)){ $un=$row['name']; $up=$row['upass']; $sn=$row['id']; }

if(($up==$upass)&&($un==$uname)&&($upass!=NULL)&&($uname!=NULL)&&($num==1))
{

$_SESSION['admin'] = $sn;
echo "<div align='center' style='color:#F00; font-size:26px;'>Welcome &nbsp;".$_SESSION['admin'];
echo "<br><br>&copy;<b>aajCMS</b> by aajIT.com<br><br><a class='botam' href='admin.php'>Goto Controll Panel</a></div>";
}
else{ echo "Login Failed"; echo "<br><a href='index.php'>Try Again</a>"; }

}
else{
?>
<div align="center">
<table width="277" align="center">
  <tr><td width="255"><br />
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
<label for="uname" >Admin Name:</label>
<input type="text" name="uname"  /><br  /><br  /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="uname" >Password:</label>
<input type="password" name="upass"  /><br  /><br  /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" value="    Login    "  />
</form>

</td>
</tr>
</table>
Designed using <a href="http://www.aajit.com">RUMMAN</a>. &copy;2010 Shaiful. 
</div>

<?php } ?>