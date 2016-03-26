<?php 


/*Get Data From App*/
$username=$_POST["username"];
$password=$_POST["password"];
$fullname=$_POST["fullname"];
define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
 
 define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
 
 define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
 
 define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );

mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());
$conn=mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
mysql_select_db(DB_DATABASE) or die(mysql_error()); 
mysql_query('SET NAMES "utf8"', $conn);
$insert = "INSERT INTO LitreInformation (username,password,fullname)VALUES ('$username','$password','$fullname')";
mysql_query('SET NAMES "utf8"', $conn);
mysql_query($insert);
echo "ok";
mysql_close();

 ?>