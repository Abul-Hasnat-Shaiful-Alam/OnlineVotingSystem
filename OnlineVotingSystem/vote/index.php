<style>body{ background:#333;} a{ color:#FFFFFF; font-weight:bold; text-decoration:none; border:1px #999 solid; padding:2px; background:#2E6DA2;} td { background:#F0F0F0;} td:hover { background:#FFFFDD;}  </style>
<?php
session_start();
include('../db.php');
if(isset($_POST['submit'])){
$uname=$_POST['uname'];
$upass=$_POST['upass'];

$qry=mysql_query("SELECT * FROM voter WHERE vid='$uname'");
$num=mysql_num_rows($qry);
while($row=mysql_fetch_array($qry)){ 
$un=$row['vid']; $up=$row['pass']; $sn=$row['vid']; 
$nam=$row['usr'];
$fnam=$row['f_name'];
$mnam=$row['m_name'];
$add=$row['p_add'];
$dob=$row['dob'];
$flag=$row['flag'];
}

if(($up==$upass)&&($un==$uname)&&($upass!=NULL)&&($uname!=NULL)&&($num==1))
{

$_SESSION['admin'] = $sn;
echo "<div align='center' style='color:#F00; font-size:26px;'>Welcome &nbsp;".$_SESSION['admin'];

$xvoter[]=select_qry('*','election','vid',$un);
if($xvoter[0]['vid']==$un){ echo '<br>X You alrady voted X';}else {echo "<br> Ready to vote? <br><a href='voter.php' >View Nomination</a> ";}
echo "<br><br>Name: $nam <br>Father Name: $fnam <br>Mother Name: $mnam<br>Address: $add<br>Date of Birth: $dob <br></div>";
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

</div>

<?php } ?>