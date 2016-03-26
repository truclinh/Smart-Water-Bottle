<?php 


/*Get Data From App*/
$username=$_POST["username"];
$remaining=$_POST["remaining"];
$drank=$_POST["drank"];
$litre=$_POST["litre"];
define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
 
 define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
 
 define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
 
 define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );

mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());
$conn=mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
mysql_select_db(DB_DATABASE) or die(mysql_error()); 
mysql_query('SET NAMES "utf8"', $conn);
$update = "Update LitreInformation Set litre = '$litre', remaining='$remaining',drank='$drank' Where username = '$username'";
mysql_query('SET NAMES "utf8"', $conn);
mysql_query($update);
if($username){
	echo $litre;
}
else{
	echo "Error";
}
mysql_close();

 ?>