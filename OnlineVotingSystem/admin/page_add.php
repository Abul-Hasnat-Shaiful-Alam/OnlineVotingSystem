<?php session_start(); ?>
<html>
<head>
<title>Edit Page</title>
<style>body{ background:#333;} a{ color:#FFFFFF; font-weight:bold; text-decoration:none; border:1px #999 solid; padding:2px; background:#2E6DA2;} td { background:#F0F0F0;} td:hover { background:#FFFFDD;}  </style>

</head>
<body>

<?php 
include_once('../db.php');
ses_chk();
echo '<div align="center">';
echo " <a class='botam' href='votemgr.php'>Vote. Manager</a>&nbsp;&nbsp;";
echo " <a class='botam' href='cand_add.php'>Add New Candidate</a>&nbsp;&nbsp;";
echo " <a class='botam' href='cand.php'>Candidate Manager</a>&nbsp;&nbsp;";
//echo " <a class='botam' href='#'>Party Manager</a>&nbsp;&nbsp;";
echo " <a class='botam' href='admin.php'>Voter Manager</a>&nbsp;&nbsp;";
echo " <a class='botam' href='page_add.php'>Add New Voter</a>&nbsp;&nbsp;";
echo " <a class='botam' href='pending.php'>Panding Voter</a>&nbsp;&nbsp;";
echo '<br/><br/>'; 

if(isset($_POST['submit']))
{

$usr=$_POST['usr'];
$pass=$_POST['pass'];
$fname=$_POST['f_name'];
$mname=$_POST['m_name'];
$dob=$_POST['dob'];
$blood=$_POST['blood'];
$flag=$_POST['flag'];
$vid=$_POST['vid'];
$area=$_POST['area'];
$p_add=$_POST['p_add'];
$h_add=$_POST['h_add'];
$pic=$_FILES['file']['tmp_name'];
$xpic="img/".$_FILES['file']['name'];

if(($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpg")
 || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))
{
move_uploaded_file($pic,"../".$xpic);  echo $xpic."<br>"; echo $pic; }


$qry=mysql_query("INSERT INTO voter (usr,pass,f_name,m_name,dob,blood,flag,vid,area,p_add,h_add,pic) VALUES ('$usr','$pass','$fname','$mname','$dob','$blood','$flag','$vid','$area','$p_add','$h_add','$xpic') ")or die(mysql_error());

echo "<div align='center' style='color:#F00; font-size:26px;'>Page Saved<br><br /><a class='botam' href='admin.php'>Back to Admin Home</a></div>";
exit;
}
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<table align="center" border="1">
  <tr>
    <td>Name:</td>
    <td><input type="text" name="usr"   /></td>
  <input type="hidden" name="idp"    />
  </tr>
  <tr>
    <td>Password:</td>
    <td><input type="text" name="pass"   /></td>
  </tr>
  <tr>
    <td>Father Name:</td>
    <td><input type="text" name="f_name"   /></td>
  </tr>
  <tr>
    <td>Mother Name:</td>
    <td><input type="text" name="m_name"   /></td>
  </tr>
  <tr>
    <td>Date of birth :</td>
    <td><input type="text" name="dob"  /></td>
  </tr>
  <tr>
    <td>Blood Group:</td>
    <td><input type="text" name="blood"  /></td>
  </tr>
  <tr>
  <td>Flag:</td>
  <td><input type="text" name="flag"   /> </td>
  </tr>
    <td>VOTER ID :</td>
      <td><input type="text" name="vid"   /> </td>
  </tr>
    <td>Area:</td>
      <td><input type="text" name="area"   /> </td>
  </tr>
    <td>Photo:</td>
      <td><input type="file" name="file"  id="file"/>  </td>
  </tr>
  <tr>
    <td>Present Address:</td>
    <td><textarea rows="6" name="p_add"> </textarea></td>
  </tr>
  <tr>
    <td>Parmanent Address: </td>
    <td><textarea name="h_add"> </textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="SAVE" name="submit" /></td>
  </tr>
</table></form>
</body></html>