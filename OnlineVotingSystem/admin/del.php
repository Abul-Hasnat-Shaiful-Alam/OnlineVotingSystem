<?php
session_start();
include_once('../db.php');
//ses_chk();
if($_GET['id']!=NULL)
{	
	$id=$_GET['id'];
	
			if(isset($_GET['con'])&&($_GET['con']=='yes')){
				
				/*$dele=select_qry("url","photo","id",$id);
				$pu="../photo/ori/".$dele['url'];
				$pu2="../photo/".$dele['url'];
				
				fclose($pu2);
				unlink($pu2);

				fclose($pu);
				unlink($pu);*/

				mysql_query("DELETE FROM voter WHERE id='$id'");
   				echo "<div align='center' style='color:#F00; font-size:26px;'>
				Voter Deleted. <br> <a class='botam' href='admin.php'>BACK Admin Panel</a></div>";
				}
				else
				{ echo "<div align='center' style='color:#F00; font-size:26px;'>
				Are you sure you want to delete this Page &nbsp;&nbsp;<a class='botam' href='del.php?id=$id&con=yes'>Yes</a>
				&nbsp;&nbsp; <a class='botam' href='admin.php'>No</a></div>";
				}


}
?>