<?php  
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ovms";
 
 	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
	//Select Database
mysql_select_db($dbname) or die(mysql_error());

function db_real($string) {
	if ( !empty($string) && !is_numeric($string) ) {
		$string = mysql_real_escape_string($string);		
	}
	return $string;
}

function db_strip($string) {
	return stripslashes($string);	
}




//My SQL select function from aaj_lib www.aajit.com
function select_qry($item,$tbl,$fld,$valu)
{
if( (isset($fld)&& isset($valu)) && (($fld!=NULL)&&($valu!=NULL)) ){
$str="SELECT ".$item." FROM ".$tbl." WHERE ".$fld."=".$valu;
}
else{ $str="SELECT ".$item." FROM ".$tbl; }

$qry=mysql_query($str);

while($row=mysql_fetch_array($qry)){
$out=$row;
}
if(isset($out)){return $out;}

} //select end here

//function to check the session and echo user name 
function ses_chk(){

//session_start();

if($_SESSION['admin']==NULL){
session_unset();
session_destroy();
echo '<meta http-equiv=refresh content=0;url=index.php>';
}
else
{echo "<div align='center' ><span><b>";
 echo "Welcome&nbsp;".$_SESSION['admin']; 
echo "		&nbsp;<a style='color:#FFF;' href='signout.php'>Logout</a>
</span></div><br>";
} }//session check end here
?>