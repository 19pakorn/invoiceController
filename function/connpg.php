<?php
date_default_timezone_set("Asia/Bangkok");

// connect.php
   $host        = "host = 192.168.180.7";
   $port        = "port = 5432";
   $dbname      = "dbname = PRAPA1";
   $credentials = "user = postgres password=postgres";
   $charset     = "utf8"; // กำหนด charset
$db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      // echo "Opened database successfully\n";
   }
   if (!pg_set_client_encoding($charset)) { // เปลี่ยน charset เป้น utf8 พร้อมตรวจสอบการเปลี่ยน
     // printf("Error loading character set utf8: %sn"); //,  $pg_connect->error); // ถ้าเปลี่ยนไม่ได้
     } else {
      //  printf("Current character set: %sn", $mysqli->character_set_name()); // ถ้าเปลี่ยนได้
     }
//$sql="SELECT  email FROM authors" ;
// $result = pg_query($conn,$sql);
// $rs = pg_fetch_assoc($result)
// $rs['email'] ;
// $row = pg_fetch_row($result);    
// $row[0];
