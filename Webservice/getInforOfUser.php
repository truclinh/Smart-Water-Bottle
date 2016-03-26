<?php 
define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
 
 define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
 
 define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
 
 define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );

mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());
$conn=mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
mysql_select_db(DB_DATABASE) or die(mysql_error()); 
mysql_query('SET NAMES "utf8"', $conn);
 $q = "select * from LitreInformation";
 $result = mysql_query($q) or die(mysql_error());
 $arr=array();
 while($row=mysql_fetch_array($result)){
 	array_push($arr, array('username'=>$row['username'],'password'=>$row['password'],'fullname'=>$row['fullname']));
 }
mysql_close();
echo json_encode($arr);
 ?>