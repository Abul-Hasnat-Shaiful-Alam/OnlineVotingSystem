<?php session_start(); include_once('../db.php');
ses_chk();?>
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
$idp=$_POST['idp'];
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
$xpic="img/".$idp.".jpg";

if(($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpg")
 || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))
{
move_uploaded_file($pic,"../".$xpic);  echo $xpic."<br>"; echo $pic; }


$qry=mysql_query("UPDATE candidate SET name='$usr',Qualification='$qu',Gender='$ge',`add`='$add',dob='$dob',status='$status',nation='$nation',area='$area',pinp='$pinp',party='$party',pic='$xpic' WHERE id='$idp'")or die(mysql_error());

echo "<div align='center' style='color:#F00; font-size:26px;'>Page Saved<br><br /><a class='botam' href='admin.php'>Back to Admin Home</a></div>";
exit;
}
$id=$_GET['id'];
$out[]=select_qry("*","candidate","id",$id);
?><form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<table align="center" border="1">
  <tr>
    <td>Name:</td>
    <td><input type="text" name="name" value="<?php echo $out[0]['name']; ?>" /></td>
  <input type="hidden" name="idp" value="<?php echo $out[0]['id']; ?>"  />
  </tr>
  <tr>
    <td>Qualification:</td>
    <td><input type="text" name="Qualification" value="<?php echo $out[0]['Qualification']; ?>" /></td>
  </tr>
  <tr>
    <td>Gender:</td>
    <td><input type="text" name="Gender" value="<?php echo $out[0]['Gender']; ?>" /></td>
  </tr>
  <tr>
    <td>Picture:</td>
    <td><img src="../<?php echo $out[0]['pic']; ?>" height="100" width="100"><input type="file" name="file"  id="file"/></td>
  </tr>
  <tr>
    <td>Date of birth :</td>
    <td><input type="text" name="dob" value="<?php echo $out[0]['dob']; ?>" /></td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><input type="text" name="add" value="<?php echo $out[0]['add']; ?>" /></td>
  </tr>
  <tr>
  <td>Status:</td>
  <td><input type="text" name="status" value="<?php echo $out[0]['status']; ?>" /> </td>
  </tr>
    <td>Namtionality:</td>
      <td><input type="text" name="nation" value="<?php echo $out[0]['nation']; ?>" /> </td>
  </tr>
    <td>Area:</td>
      <td><input type="text" name="area" value="<?php echo $out[0]['area']; ?>" /> </td>
  </tr>
    <td>Position in Party:</td>
      <td><input type="text" name="party" value="<?php echo $out[0]['pinp']; ?>"> </td>
  </tr>
  <tr>
    <td>party:</td>
    <td><input type="text" name="party" value="<?php echo $out[0]['party']; ?>"></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="SAVE" name="submit" /></td>
  </tr>
</table></form>
</body></html>