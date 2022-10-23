<?php 
date_default_timezone_set("Asia/Bangkok");
$post=$_POST;
$get=$_GET;
$file=$_FILES;
$server=$_SERVER;
function displaydate($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$date_array=explode("-",$x);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2]*1;

	$m=$thai_m[$m];
    if(	$y<2500){
        $y=$y+543;
    }
    $Year='พ.ศ.'.$y;
	$displaydate="$d $m $Year";
	return $displaydate;
}

function displaydate_short($x) {
	$thai_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$date_array=explode("-",$x);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2]*1;

	$m=$thai_m[$m];
	$y=$y+543;

	$displaydate="$d $m $y";
	return $displaydate;
}

//echo max_days_month(4,2019); 
function max_days_month($month, $year) {
    // Using first day of the month, it doesn't really matter
    $date = $year."-".$month."-1";
    return date("t", strtotime($date));
}

$provinces = array(1 => "กรุงเทพมหานคร","กระบี่", "กาญจนบุรี", "กาฬสินธุ์", "กำแพงเพชร", "ขอนแก่น", "จันทบุรี", "ฉะเชิงเทรา", "ชลบุรี", "ชัยนาท", "ชัยภูมิ", "ชุมพร", "เชียงราย", "เชียงใหม่", "ตรัง", "ตราด", "ตาก", "นครนายก", "นครปฐม", "นครพนม", "นครราชสีมา", "นครศรีธรรมราช", "นครสวรรค์", "นนทบุรี", "นราธิวาส", "น่าน", "บุรีรัมย์","บึงกาฬ", "ปทุมธานี", "ประจวบคีรีขันธ์", "ปราจีนบุรี", "ปัตตานี", "พระนครศรีอยุธยา", "พะเยา", "พังงา", "พัทลุง", "พิจิตร", "พิษณุโลก", "เพชรบุรี", "เพชรบูรณ์", "แพร่", "ภูเก็ต", "มหาสารคาม", "มุกดาหาร", "แม่ฮ่องสอน", "ยโสธร", "ยะลา", "ร้อยเอ็ด", "ระนอง", "ระยอง", "ราชบุรี", "ลพบุรี", "ลำปาง", "ลำพูน", "เลย", "ศรีษะเกษ", "สกลนคร", "สงขลา", "สตูล", "สมุทรปราการ", "สมุทรสงคราม", "สมุทรสาคร", "สระแก้ว", "สระบุรี", "สิงห์บุรี", "สุโขทัย", "สุพรรณบุรี", "สุราษฏร์ธานี", "สุรินทร์", "หนองคาย", "หนองบัวลำพู", "อ่างทอง", "อำนาจเจริญ", "อุดรธานี", "อุตรดิตถ์", "อุทัยธานี", "อุบลราชธานี");
$character_e = array(1 => "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$thai_mo=array(1 =>"มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$date_now=date('Y-m-d');
$date_time_now=date('Y-m-d H:i:s',time());
$time_now=date('H:i:s',time());
$day_now=(date('d'))*1;
$month_now=(date('m'))*1;
$year_now=(date('Y'))*1;


function alert($x){ 
    $alt='<script language="javascript">';
    $alt.="alert('$x')";  //not showing an alert box.
    $alt.='</script>';
    echo $alt;
}

function convert($number)
    {
            $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
            $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
            $number = str_replace(",","",$number);
            $number = str_replace(" ","",$number);
            $number = str_replace("บาท","",$number);
            $number = explode(".",$number);
                if(sizeof($number)>2){
                    return 'ทศนิยมหลายตัว';
                    exit;
                }
            $strlen = strlen($number[0]);
            $convert = '';
            for($i=0;$i<$strlen;$i++){
                $n = substr($number[0], $i,1);
                if($n!=0){
                if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; }
                elseif($i==($strlen-2) AND $n==2){ $convert .= 'ยี่'; }
                elseif($i==($strlen-2) AND $n==1){ $convert .= ''; }
                else{ $convert .= $txtnum1[$n]; }
                $convert .= $txtnum2[$strlen-$i-1];
                }
            }
            $convert .= 'บาท';
            if($number[1]=='0' OR $number[1]=='00' OR $number[1]==''){
                $convert .= 'ถ้วน';
            }else{
                $strlen = strlen($number[1]);
                for($i=0;$i<$strlen;$i++){
                $n = substr($number[1], $i,1);
                if($n!=0){
                    if($i==($strlen-1) AND $n==1){$convert .= 'เอ็ด';}
                    elseif($i==($strlen-2) AND $n==2){$convert .= 'ยี่';}
                    elseif($i==($strlen-2) AND $n==1){$convert .= '';}
                    else{ $convert .= $txtnum1[$n];}
                    $convert .= $txtnum2[$strlen-$i-1];
                }
                }
                $convert .= 'สตางค์';
            }
            return $convert;
    }

    function age($birthday) { 
        list($year,$month,$day) = explode("-", $birthday); 
        //$year =$year-543; 
        $datedeb=mktime(0,0,0,$month,$day,$year); 
        $datefin=time(); 
        
        $aad=date("Y",$datedeb); 
        $mmd=date("m",$datedeb); 
        $jjd=date("d",$datedeb); 
        
        $aaf=date("Y",$datefin); 
        $mmf=date("m",$datefin); 
        $jjf=date("d",$datefin); 
        
        $nbj=array(0,31,28,31,30,31,30,31,31,30,31,30,31); 
        if(($aaf % 4)==0){$nbj[2]=29;} 
        if((($aaf % 100)==0)&(($aaf % 400)!=0)){$nbj[2]=28;} 
        
            if($jjf<$jjd){
                $jjf=$jjf+$nbj[(int)$mmf];
                $mmf=$mmf-1;
            } 
            if($mmf<$mmd){
                $mmf=$mmf+12;
                $aaf=$aaf-1;
            } 
        return ($aaf-$aad); 
    } 

    function expdate($startdate,$datenum){
        $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
        $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
        $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
        return $ndate; // ส่งค่ากลับ
    }

    function CountDay($date){
        $startTimeStamp = strtotime($date);
        $endTimeStamp = strtotime(date('Y-m-d'));
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        $numberDays = $timeDiff/86400;  // 86400 seconds in one day
        // and you might want to convert to integer
        return intval($numberDays);
    }
    function rankDaedline($num){
       if($num<=180){
           $t="success";
       } elseif ($num >180 &&  $num <=270 ) {
            $t="warning";
       }elseif ($num >270) {
            $t="danger";
        }
        return $t;
    }
//  $your_filename=upimg($_FILES['file'],"images/");   //Ex..

    function upimg($img,$imglocate){   
        if($img['name']!=''){   
        $fileupload1=$img['tmp_name'];   
        $g_img=explode(".",$img['name']);   
        $file_up=$img['name'];  // ไม่เปลี่ยนชื่อ
            if($fileupload1){   
                $array_last=explode(".",$file_up);   
                $c=count($array_last)-1;   
                $lastname=strtolower($array_last[$c]);   
                    @copy($fileupload1,$imglocate.$file_up);               
                    
            }                  
        }   
    return $file_up; // ส่งกลับชื่อไฟล์   
    }   
// RENAME ด้วย 
    function upimg_re($img,$imglocate){   
        if($img['name']!=''){   
        $fileupload1=$img['tmp_name'];   
        $g_img=explode(".",$img['name']);   
        $file_up=rand(100, 300)."".time().".".$g_img[1];  // เปลี่ยนชื่อไฟล์ไหม่ เป็นตัวเลข   
            if($fileupload1){   
                $array_last=explode(".",$file_up);   
                $c=count($array_last)-1;   
                $lastname=strtolower($array_last[$c]);   
                    @copy($fileupload1,$imglocate.$file_up);               
            }                  
        } else{
           $file_up=''; 
        }  
    return $file_up; // ส่งกลับชื่อไฟล์   
    } 
    // $carDocument=upPicture($_FILES['carDocument'],"../photo/");
    function upPicture($img,$imglocate){
        if($img['name']!=''){   
            $file_tmp =$img['tmp_name'];
            $g_img=explode(".",$img['name']);   
            $file_up=rand(100, 300)."".time().".".$g_img[1];
                        //@copy($fileupload1,$imglocate.$file_up);   
            $file_up=(move_uploaded_file($file_tmp,$imglocate.$file_up))?$file_up:'';
        } else{
            $file_up=''; 
        }
                 // ส่งกลับชื่อไฟล์   
        return $file_up;                
    }

function get_color($id) {
        switch ($id) {
            case "1":
                $color="#feb3cc";
                break;
            case "2":
                $color="#aed7fd";
                break;
            case "3":
                $color="#d6b3fe";
                break;
            case "4":
                $color="#ceb0a1";
                break;
            default:
                $color="#8e8e8e";
        }
        return $color;
}

 
function  encodeZ($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
  }
  
  function decodeZ($data) {
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
  }

  function chkStrInvoice($hisid){
    global $mysqli;
    if(chkInv($hisid)!=0){
    // $strSQL_in="select status from tb_invoice  where his_id = '$hisid' order by invoiceID DESC limit 1"; 
    // $result_in = $mysqli->query($strSQL_in); 
    // $row_in = $result_in->fetch_assoc();
    // $status = $row_in->status;
        $qInv = "SELECT tb_invoice.status FROM `tb_invoice` where  his_id = '$hisid' ORDER BY `tb_invoice`.`invoiceDate` DESC   LIMIT 1 ; ";
        $resInv= $mysqli->query($qInv);
        $rsInv = $resInv->fetch_object();
        $status=isset($rsInv->status)?$rsInv->status:'';
        if($status == 1){
            $result = 1 ; 
        } else if($status == 2){
            $result = "<div class='container-fluid text-center mt-4 pt-4'> <b> <h3 class='text-primary'>ไม่มียอดค้างชำระ</h3></b> </div>";
        } else {
            $result = "<div class='container-fluid text-center mt-4 pt-4'> <b> <h3 class='text-primary'>ไม่พบข้อมูล!!</h3></b> </div>";
        }
    }else {
        $result = "<div class='container-fluid text-center mt-4 pt-4'> <b> <h3 class='text-primary'>ไม่พบข้อมูล</h3></b> </div>";
    }

    return $result;
  }
function chkBill($billDetail){
    global $mysqli;
    $sqlchkinvoice="SELECT  count(invoiceID) as invoice  FROM `tb_invoice` WHERE `billDetail` = '$billDetail'  ORDER BY `status` ASC";
    $reschk = $mysqli->query($sqlchkinvoice);
    $num = $reschk->fetch_object();
    return $num->invoice;
    }
    function lastbill($invoiceID){
    global $mysqli;
    $sqlData="SELECT `invoiceID` FROM `tb_invoice` WHERE `invoiceID` LIKE '$invoiceID%' ORDER BY `invoiceID` DESC";
    $resData = $mysqli->query($sqlData);
    if($rowData = $resData->fetch_object())
        $lastData= (int)substr($rowData->invoiceID,6,6);
    else
        $lastData=0;
    return $lastData;
    }
 
    function chkInvForNewHisID($hisid) {
        // global $mysqli;
        $arr = array();
        if(chkInv($hisid) == 0){
            $arr['result'] =  addInvForNewHisID($hisid);
    }else{ 
        $arr['result']= "Error!" ; 
     }
     echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    function addInvForNewHisID($hisid) {
        global $mysqli;
        $invDate = date('Y-m-d H:i:s',time());
        $dueDate = date('Y-m-d',expdate($invDate,$nDays)) ; 

        if(strlen($hisid) < 8 ){ $hisid = str_pad($hisid, 8, "0", STR_PAD_LEFT); }
        $row = array();
        $sqlHisID = "SELECT (SELECT concat(substr(month_year,3,2) , substr(month_year,6,2)) AS monthYear FROM default_data) || 
                            m.build_type || m.loc_zone AS prefix , m.his_id  , b.total 
                    FROM meter as m
                    JOIN (SELECT his_id , SUM(total_amount) as total , chk FROM bill WHERE chk = '' GROUP BY his_id , chk ) as b on m.his_id = b.his_id
                    WHERE m.his_id = '$hisid' AND m.pay_id NOT IN ('149','285') AND m.chain_bill_id NOT IN ('49') ";
        if($resHisID = pg_query($sqlHisID)){ 
           $rsHisID = pg_fetch_assoc($resHisID);
              // $row['prefix']  = $rsHisID['prefix'];
            //   $row['hisid']   = $rsHisID['his_id'];
            //   $row['total']   = $rsHisID['total'];
        
              $sqlData="SELECT `invoiceID` FROM `tb_invoice` WHERE `invoiceID` LIKE '$rsHisID[prefix]%' ORDER BY `invoiceID` DESC limit 1";
              if($resData = $mysqli->query($sqlData)){
                  $rowData = $resData->fetch_object();
                  $lastData= (int)substr($rowData->invoiceID,6,6);
                  $lastData+=1;
                  $lastData = str_pad($lastData, 4, "0", STR_PAD_LEFT);
              }
              else{
                  $lastData=1;
                  $lastData = str_pad($lastData, 4, "0", STR_PAD_LEFT);
              }
              $b = 0;
              $billDetail = '';
              $sqlBill = "SELECT  bill_no AS bill  FROM bill where chk = ''  AND his_id = '$rsHisID[his_id]' order by month_year DESC ";
              $resBill = pg_query($sqlBill);
              while( $rsBill = pg_fetch_assoc($resBill) ){
                  $billDetail.= ($b==0?"":"+").$rsBill['bill'];
                  $b++;
              }
              $sqlInv = "INSERT INTO tb_invoice ( invoiceID , his_id , billDetail , invoiceDate , dueDate , totalAmount , `status` )
                          SELECT   concat($rsHisID[prefix] , '$lastData') AS invoiceID , '$hisid' , '$billDetail' AS billDetail ,
                                 '$invDate' AS invoiceDate , '$dueDate' AS dueDate , '$rsHisID[total]' AS totalAmount , '1' AS `status`
                         FROM meter as m
                         WHERE m.his_id = '$hisid' ";
              if($resInv = $mysqli->query($sqlInv)){
                  $qInv = "SELECT * FROM tb_invoice  WHERE `status` = 1 AND invoiceID LIKE  '$rsHisID[prefix]%' ORDER BY invoiceDate , invoiceID DESC LIMIT 1 ";
                  $resSelInv = $mysqli->query($qInv);
                  $rsInv = $resSelInv->fetch_object();
              
                    //   $row['preID']       = $rsHisID['prefix'];
                      $row['invoiceID']   = $rsInv->invoiceID;
                    //   $row['his_id']      = $rsInv->his_id;
                    //   $row['loc_zone']    = $rsHisID['loc_zone'];
                    //   $row['prapa_no']    = $rsHisID['prapa_no'];
                    //   $row['billDetail']  = $rsInv->billDetail;
                    //   $row['invoiceDate'] = $rsInv->invoiceDate;
                    //   $row['dueDate']     = $rsInv->dueDate;
                    //   $row['totalAmount'] = $rsInv->totalAmount;
                    //   $row['status']      = $rsInv->status;
                    //   $row['result']      = "Success!";
              }else{  
              $row['result'] = $sqlInv ;
            }   
        }else{   
                // $row['msg'] = "NO DATA!"; 
                $row['result'] = "error!"; 
        }
        return $row;
    }
    function chkInv($hisid) {
        global $mysqli;
        $qFindInv = "SELECT his_id , invoiceID  FROM `tb_invoice` where his_id = '$hisid' AND  `status` = '1'  ORDER BY invoiceID DESC LIMIT 1 ";
        $resFindInv = $mysqli->query($qFindInv);
        $num = $resFindInv->num_rows; 
        if($num){
            $rsFindInv = $resFindInv->fetch_object();
            $result = $rsFindInv->invoiceID;
        }else {
            $result = 0;
        }
        return $result;
    }

    function chkDebtData($hisid){
        global $mysqli;
        $resultPG = array();
        $resultPG = getDebtDataInPG($hisid);
        $resultInv = array();
        $resultInv = getDataFromTBInv($hisid);
      //  echo print_r($resultPG);
      //  echo print_r($resultInv);
            if( $resultPG['total'] == $resultInv['total'] && $resultPG['bill'] == $resultInv['bill']){
              $result = 0 ;
            }else{
              $res = array();
              $status = 2;
              $res['oldInvStatus'] = updateInv($hisid,$status);
              $res['newInv'] = array(newInv($hisid));
              $result = 1;
            }
        return $result;
      }
      
      
      function getDebtDataInPG($hisid){
        $hisid = str_pad($hisid,8,'0',STR_PAD_LEFT);
        $result = array();
        $qchk ="SELECT his_id , SUM(total_amount) as total , string_agg( bill_no , '+' order by bill_no desc) as bill  FROM bill WHERE his_id = '$hisid' AND chk NOT IN ('p','P','x','X')  GROUP BY his_id , chk ";
        $reschk = pg_query($qchk);
        if($rschk = pg_fetch_assoc($reschk)){
          $result['his_id'] = $rschk['his_id'];
          $result['total'] = $rschk['total'];
          $result['bill'] = $rschk['bill'];
        }else{
            $result['sql'] = $qchk;
            $result['total'] = 0;
            $result['bill'] = 0;
        }
        return $result;
      }
      function getDataFromTBInv($hisid){
        global $mysqli;
        $result = array();
        $qInv="SELECT invoiceID , his_id , billDetail , totalAmount , status  FROM `tb_invoice` WHERE `his_id` = '$hisid' AND status = 1 ORDER BY `invoiceID` DESC limit 1";
          $resData = $mysqli->query($qInv);
          if($rowData = $resData->fetch_object()){
            $result['his_id'] = $rowData->his_id;
            $result['total'] = $rowData->totalAmount;
            $result['bill'] = $rowData->billDetail;
        }else{
            $result['sql'] = $qInv;
            $result['total'] = 0;
            $result['bill'] = 0;
        }
        return $result;
      }
      
      function updateInv($hisid,$status=1){
        global $mysqli;
        $result = 0;
        $qUpdate = "UPDATE tb_invoice SET `status` = '$status' WHERE his_id = '$hisid' AND  `status` = 1  ";
        if($resUpdate = $mysqli->query($qUpdate)){
          $result = 3;
        }
        return $result ;
      }
      
      function newInv($hisid){
        global $mysqli;
        $return = array();
              $first = strtotime(time());
              $last = strtotime(date('Y-m-t ', strtotime(time() ) ));
              $ndays =  $last - $first;
              $ndays = floor($ndays/86400) ;
              $invDate = date('Y-m-d H:i:s',time());
              $dueDate = date('Y-m-d',expdate($invDate,$ndays)) ;
              $sqlHisID = "SELECT (SELECT concat(substr(month_year,3,2) , substr(month_year,6,2)) AS monthYear FROM default_data) || m.build_type || m.loc_zone AS prefix , 
                                    m.his_id , b.bill , b.total 
                          FROM meter as m
                          JOIN (SELECT his_id , SUM(total_amount) as total , string_agg( bill_no , '+' order by bill_no desc) as bill , chk FROM bill WHERE chk IN ('','r','R') GROUP BY his_id , chk ) as b on m.his_id = b.his_id
                          WHERE m.his_id = '$hisid' AND m.pay_id NOT IN  (SELECT group_pay_id FROM group_pay WHERE group_pay_name LIKE 'ธนาคาร%') 
                          AND m.chain_bill_id NOT IN ('49','F8','F9') AND m.build_type NOT IN ('02','06', '08') ";
                  $resHisID = pg_query($sqlHisID); 
                  if($rsHisID = pg_fetch_assoc($resHisID)){
                      $sqlData="SELECT `invoiceID` FROM `tb_invoice` WHERE `invoiceID` LIKE '$rsHisID[prefix]%' ORDER BY `invoiceID` DESC limit 1";
                      if($resData = $mysqli->query($sqlData)){
                          $rowData = $resData->fetch_object();
                          $lastData= (int)substr($rowData->invoiceID,8,4);
                          $lastData+=1;
                          $lastData = str_pad($lastData, 4, "0", STR_PAD_LEFT);
                      }else{
                          $lastData=1;
                          $lastData = str_pad($lastData, 4, "0", STR_PAD_LEFT);
                      }
                          $sqlInv = "INSERT INTO tb_invoice ( invoiceID , his_id , billDetail , invoiceDate , dueDate , totalAmount , `status` )
                                      value (  concat($rsHisID[prefix] , '$lastData')  , '$hisid' , '$rsHisID[bill]' , '$invDate'  , '$dueDate' , '$rsHisID[total]' , 1 )  ";
                          if($resInv = $mysqli->query($sqlInv)){
                              $q = "SELECT invoiceID FROM tb_invoice where his_id = '$hisid' and `status` = 1 order by invoiceID DESC limit 1 ";
                              $res = $mysqli->query($q);
                              $rs = $res->fetch_object();
                              $return["invoice"]= $rs->invoiceID ;
                          }else {
                              $return["sql"]= $sqlInv ;
                          }
                  }else {
                      $return['msg'] = "This his_id has no outstanding balance. ";
                  }
          return $return;
      }
    // function usageInfo($hisid){
    //     $data = array();
    //     $POSTData=array( "hisid" => $hisid );
    //     $data = json_decode(httpPost("http://apiprapa.phsmun.go.th/apipg/index.php?even=h6&his_id=".$hisid , $POSTData),true);
    //     // echo "<pre>"; echo print_r($data); echo "</pre>";
    //     return $data;
    // } 

    function fetchReceiptData00( $hisID , $month_year ){
        global $mysqli;
    $monthYear = substr($month_year,3,2).substr($month_year,5,2);
    $n=0; 
    $q = "SELECT i.invoiceID , p.idpayment , i.billDetail 
          FROM tb_payment as p 
          JOIN (SELECT invoiceID , billDetail , `status` FROM tb_invoice WHERE `status` = 2 ) as i on p.invoiceID = i.invoiceID 
          WHERE billDetail LIKE '%$monthYear%' and his_id = '$hisID' AND p.idpayment <> '' and p.status = 1   limit 1;";
    if($result = $mysqli->query($q)){
    $row= array();
    if($result && $rs = $result->fetch_object()){
        $billDetailNo = array();
        if(strlen($rs->billDetail)>10){
            $billDetailNo = explode("+",$rs->billDetail); 
        }else{
            $billDetailNo[0] = $rs->billDetail ;
        }
        $pmax = count($billDetailNo);
        $j=0; $k=1;
             for($p=0;$p<$pmax;$p++){
                        $sql_list="SELECT b.his_id , b.loc_zone , b.prapa_no , b.cust_name , b.cust_address , b.meter_id , b.chain_bill_id , 
                                            b.bill_no , b.month_year , b.before_read_date , b.before_meter_counter , b.read_date , b.meter_counter , 
                                            b.meter_amount , b.amount ,b.discount, b.service_charge , b.vat_amount , b.total_amount , 
                                            h.paid_date , h.paid_time
                                    FROM bill  as b 
                                    JOIN (SELECT paid_bill_no , bill_no FROM  paid_bill_item ) as i on b.bill_no = i.bill_no
                                    JOIN (SELECT paid_bill_no , paid_date , paid_time FROM  paid_bill_head ) as h on i.paid_bill_no = h.paid_bill_no
                                    WHERE b.bill_no ='$billDetailNo[$j]' ;";
                        $result_list = pg_query($sql_list);
                        $rs_list = pg_fetch_assoc($result_list);
                        $pay = explode("+",$rs->idpayment) ;
    
                        $dayP = (int)substr($rs_list['paid_date'],8,2);
                        $monthP = (string)substr($rs_list['paid_date'],5,2);
                        $yearP = (string)substr($rs_list['paid_date'],0,4);
                        $paid_date=$dayP."/".$monthP."/".$yearP;
    
                        $dayB = (int)substr($rs_list['before_read_date'],8,2);
                        $monthB = (string)substr($rs_list['before_read_date'],5,2);
                        $yearB = (string)substr($rs_list['before_read_date'],0,4);
                        $before_read_date=$dayB."/".$monthB."/".$yearB;
    
                        $dayR = (int)substr($rs_list['read_date'],8,2);
                        $monthR = (string)substr($rs_list['read_date'],5,2);
                        $yearR = (string)substr($rs_list['read_date'],0,4);
                        $read_date=$dayR."/".$monthR."/".$yearR;
    
                        $month_year = monththai($rs_list['month_year']);
    
                             $row[$n]['idpayment']=$pay[$k];
                             $row[$n]['invoiceID']=$rs->invoiceID; 
                             $row[$n]['his_id']=$rs_list['his_id'];
                             $row[$n]['loc_zone']=$rs_list['loc_zone'];
                             $row[$n]['prapa_no']=$rs_list['prapa_no'];
                             $row[$n]['cust_name']=$rs_list['cust_name'];
                             $row[$n]['cust_address']=$rs_list['cust_address'];
                             $row[$n]['meter_id']=$rs_list['meter_id'];
                             $row[$n]['chain_bill_id']=$rs_list['chain_bill_id'];
                             $row[$n]['bill_no']=$rs_list['bill_no'];
                             $row[$n]['month_year']=$month_year;
                             $row[$n]['before_read_date'] = $before_read_date;
                             $row[$n]['before_meter_counter'] = $rs_list['before_meter_counter'];
                             $row[$n]['read_date'] = $read_date;
                             $row[$n]['meter_counter'] = $rs_list['meter_counter'];
                             $row[$n]['meter_amount'] = $rs_list['meter_amount'];
                             $row[$n]['amount'] = $rs_list['amount'];
                             $row[$n]['service_charge'] = $rs_list['service_charge'];
                             $row[$n]['discount'] = $rs_list['discount'];
                             $row[$n]['vat_amount'] = $rs_list['vat_amount'];
                             $row[$n]['total_amount'] = $rs_list['total_amount']; 
                             $row[$n]['paid_date']=$paid_date;
                             $row[$n]['paid_time']=$rs_list['paid_time'];
                             $row[$n]['payee']="นางวิศัลยา พูพัฒนานุรักษ์";
                             $row[$n]['position']="หัวหน้าฝ่ายการเงินและบัญชี";
                             $row[$n]['paymentMethod']="ธนาคารกรุงไทย";
                $j++; $k++; $n++;   
            }  
        }
    } else {
        $row=0;
    }
    // echo "f = "; echo "<pre>";echo print_r($row); echo "</pre>";
    
    return $row;
    
    }
?>
