<?php session_start();
include "conn.php";
include "function.php";
include "connpg.php";


function getNameLevel($id){
    if($id==1)
        return 'ใช้งาน';   
    else if($id==99)
        return 'ผู้ดูแลระบบ';
    else if($id==0)
        return 'ยกเลิก';
    else 
        return 'Error';
}
 
function statusOrder($status){
    if($status==1)
        return 'รอดำเนินการ';   
    else if($status==2)
        return 'เสร็จสิ้น';  
    else if($status==99)
        return 'ยกเลิก';
    else 
        return 'Error';
}
function productTypeStatus($status){
    if($status==1)
        return 'ค้าปลีก';   
    else if($status==2)
        return 'ค้าส่ง';
    else
        return 'Error';
}
function statusColor($status){
    if($status==1)
        return 'warning';   
    else if($status==2)
        return 'success';  
    else if($status==99)
        return 'danger';
    else
        return 'info';
} 
function BColor($status){
    if($status==1)
        return 'primary';   
    else if($status==2)
        return 'secondary';  
    else if($status==3)
        return 'success';  
    else if($status==4)
        return 'danger';
    else if($status==5)
        return 'warning';
    else if($status==6)
        return 'info';
    else if($status==7)
        return 'dark';
    else 
        return 'light';
} 
function setPhotoBlank(){
    $_SESSION['sess_Newphoto'][1]='';
    $_SESSION['sess_linePhoto']="1";
    $_SESSION['sess_pathPhoto']="";
    return true;
}
?>