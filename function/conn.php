<?php
date_default_timezone_set('Asia/Bangkok');
// connect.php
$db_config = array(
 "host" => "localhost", // กำหนด host
 "user" => "root", // กำหนดชื่อ user
 "pass" => "SQLxxx@65000", // กำหนดรหัสผ่าน
"dbname" => "db_payment", // กำหนดชื่อฐานข้อมูล
"charset" => "utf8", // กำหนด charset
);
$mysqli = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);
if (mysqli_connect_error()) {
 die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
 exit;
}
if (!$mysqli->set_charset($db_config["charset"])) { // เปลี่ยน charset เป้น utf8 พร้อมตรวจสอบการเปลี่ยน
 printf("Error loading character set utf8: %sn", $mysqli->error); // ถ้าเปลี่ยนไม่ได้
} else {
 //  printf("Current character set: %sn", $mysqli->character_set_name()); // ถ้าเปลี่ยนได้
}
$apiPath="http://127.0.0.1/shoes/api/";
//echo $mysqli->character_set_name();  // แสดง charset เอา comment ออก
//echo 'Success... ' . $mysqli->host_info . "n";
//$mysqli->close();
//==============HELP============================
//$q="SELECT * FROM province_th LIMIT 30 ";
//$result = $mysqli->query($q); // ทำการ query คำสั่ง sql
//$total=$result->num_rows;  // นับจำนวนถวที่แสดง ทั้งหมด
//while($rs=$result->fetch_object()){ // วนลูปแสดงข้อมูล
//      echo $rs->province_name;
// }
// $mysqli->close()