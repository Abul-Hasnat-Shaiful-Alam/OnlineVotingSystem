<style>body{ background:#333;} a{ color:#FFFFFF; font-weight:bold; text-decoration:none; border:1px #999 solid; padding:2px; background:#2E6DA2;} td { background:#F0F0F0;} td:hover { background:#FFFFDD;}  </style>
<?php session_start();
include('../db.php');
ses_chk();

$qry=mysql_query("SELECT * FROM candidate");
$num=mysql_num_rows($qry);

echo '<table align="center" style="border:1px solid #666;">';

while($row=mysql_fetch_array($qry)){ 
echo '<tr><td  style="border-right:1px solid #666666"><img height="120" width="120" src="../'.$dob=$row['pic'].'"></td>
<td>
'.$un=$row['name'].'<br> 
'.$up=$row['Qualification'].'<br> 
'.$sn=$row['Gender'].'<br> 
'.$nam=$row['add'].'<br>
'.$fnam=$row['area'].'<br>
'.$mnam=$row['pinp'].'<br>
'.$add=$row['party'].'<br>
</td><td  style="border-left:1px solid #666666; color:#f00; font-size:18px;"><a href="vote.php?vid='.$_SESSION['admin'].'&v='.$row['id'].'">Vote Now</a></td></tr>';
}

echo '</table>'
?>







