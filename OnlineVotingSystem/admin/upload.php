<?php 
session_start();
include_once('../lib/db.php');
ses_chk();
if(isset($_POST['submit'])){

$name=db_real($_POST['name']);
$txt=db_real($_POST['txt']);
$page=db_real($_POST['page']);
$gid=$_POST['gid'];

$pic=$_FILES['file']['tmp_name'];
if($_FILES["file"]["type"] == "image/gif"){ $npic="img/aajcms_".$name.".gif"; } else{ $npic="img/aajcms_".$name.".jpg"; }
echo "<div align='center'>Upload: " . $_FILES["file"]["name"] . "<br />";
echo "<br>file type: ".$_FILES["file"]["type"];
echo "<br>$pic <br />";
if(($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpg")
 || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))
{
move_uploaded_file($pic,"../".$npic);
if($_FILES["file"]["type"] == "image/gif"){ $onpic="aajcms_".$name.".gif"; } else{ $onpic="aajcms_".$name.".jpg"; }
$qry=mysql_query("INSERT INTO photo (txt,url,page,caption) VALUES ('$name','$onpic','$page','$txt')");
 
include_once('../example/photo.php');
$des='../img/tmb/';
$loc='../'.$npic;
img_mgr($loc,$des);

echo "<br>Upload Done<br><br><a class='botam' href='gall_view.php?id=$gid'>Back</a><br />
<br /><a class='botam' href='admin.php'>Back to Admin Panel</a></div>";
//echo '<meta http-equiv=refresh content=0;url="admin.php?msg=NewCatagoryAdded">';

}
else{ echo "<br>Invalid file type</div>"; }

}
else{
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
<table align="center" border="1">
  <tr>
    <td>Title:</td>
    <td><input type="text" name="name"  />
	<input type="hidden" name="page" value="<?php echo $_GET['page']; ?>"  />
    <input type="hidden" name="gid" value="<?php echo $_GET['gid']; ?>"  /></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea name="txt"> </textarea></td>
  </tr>
  <tr>
    <td>Select Photo:</td>
    <td><input type="file" name="file" id="file" /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit"  value="Add to Gallery" /></td>
  </tr>
</table>
 </form>

<?php
}
?>