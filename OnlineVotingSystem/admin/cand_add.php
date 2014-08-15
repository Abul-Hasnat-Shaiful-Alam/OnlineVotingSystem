<?php session_start(); 
include_once('../db.php');
ses_chk();
?>
<html>
<head>
<title>Edit Candidate</title>
<style>body{ background:#333;} a{ color:#FFFFFF; font-weight:bold; text-decoration:none; border:1px #999 solid; padding:2px; background:#2E6DA2;} td { background:#F0F0F0;} td:hover { background:#FFFFDD;}  </style>

</head>
<body>
<?php 
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
//$idp=$_POST['idp'];
$usr=$_POST['name'];
$qu=$_POST['Qualification'];
$ge=$_POST['Gender'];
$add=$_POST['add'];
$dob=$_POST['dob'];
$status=$_POST['status'];
$nation=$_POST['nation'];
$area=$_POST['area'];
$pinp=$_POST['pinp'];
$party=$_POST['party'];
$pic=$_FILES['file']['tmp_name'];
$xpic="img/".$usr.".jpg";

if(($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpg")
 || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))
{
move_uploaded_file($pic,"../".$xpic);  echo $xpic."<br>"; echo $pic; }


$qry=mysql_query("INSERT INTO candidate (name,Qualification,Gender,dob,status,nation,area,pinp,party,pic,`add`) VALUES ('$usr','$qu','$ge','$dob','$status','$nation','$area','$pinp','$party','$xpic','$add')")or die(mysql_error());

echo "<div align='center' style='color:#F00; font-size:26px;'>Candidate added<br><br /><a class='botam' href='admin.php'>Back to Admin Home</a></div>";
exit;
}

?><form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<table align="center" border="1">
  <tr>
    <td>Name:</td>
    <td><input type="text" name="name"  /></td>
  
  </tr>
  <tr>
    <td>Qualification:</td>
    <td><input type="text" name="Qualification"   /></td>
  </tr>
  <tr>
    <td>Gender:</td>
    <td><input type="text" name="Gender"  /></td>
  </tr>
  <tr>
    <td>Picture:</td>
    <td><input type="file" name="file"  id="file"/></td>
  </tr>
  <tr>
    <td>Date of birth :</td>
    <td><input type="text" name="dob" /></td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><textarea name="add"></textarea></td>
  </tr>
  <tr>
  <td>Status:</td>
  <td><input type="text" name="status"  /></td>
  </tr>
    <td>Namtionality:</td>
      <td><input type="text" name="nation" /> </td>
  </tr>
    <td>Area:</td>
      <td><input type="text" name="area"  /></td>
  </tr>
    <td>Position in Party:</td>
      <td><input type="text" name="pinp" /> </td>
  </tr>
  <tr>
    <td>party:</td>
    <td><input type="text" name="party" /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="SAVE" name="submit" /></td>
  </tr>
</table></form>
</body></html>