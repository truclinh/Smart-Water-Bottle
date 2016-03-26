<?php 

/*Get Data From App*/
$username=$_POST["username"];
$password=$_POST["password"];

/*Init Infor Of User To Send Back Android*/
$FULLNAME=null;
$USERNAME=null;
$PASSWORD=null;
$arrInforOfUser=array();

/*Connect To Server*/
define( "DB_SERVER",    getenv('OPENSHIFT_MYSQL_DB_HOST') );
define( "DB_USER",      getenv('OPENSHIFT_MYSQL_DB_USERNAME') );
define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );
define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );

mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());
$conn=mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
mysql_select_db(DB_DATABASE) or die(mysql_error()); 
mysql_query('SET NAMES "utf8"', $conn);
$q = "select * from LitreInformation where username='$username' and password='$password'";
$result = mysql_query($q) or die(mysql_error());
$row=mysql_num_rows($result);

//Kiểm tra nếu người dùng đăng nhập thành công
if($row>=1){
	while($arrInfor=mysql_fetch_array($result)){	
		array_push($arrInforOfUser, array('username'=>$arrInfor['username'],'password'=>$arrInfor['password'],'fullname'=>$arrInfor['fullname'],'remaining'=>$arrInfor['remaining'],'drank'=>$arrInfor['drank'],'litre'=>$arrInfor['litre']));
   }
   	echo json_encode($arrInforOfUser);
 }
 //ngược lại
else{
	echo "Failed";
}

?>