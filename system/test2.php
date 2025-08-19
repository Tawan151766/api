<?php
//<!--start update mt_money to hotspot databases-->
$rr="2031";
//echo ($rr %4);
                                 $now_time = $API->comm("/system/clock/print");
								 $now_date = $API->comm("/system/clock/print");
							    $miktime=($now_time['0']['time']);
								$mikdate=($now_date['0']['date']);
						       $hh_arr=substr("".$miktime."",-8,2);
			                   $mm_arr=substr("".$miktime."",-5,2);
			                   $ss_arr=substr("".$miktime."",-2);
							   $todaytime_con=(($hh_arr*3600) + ($mm_arr*60) + ($ss_arr));
							    $year_arr=substr("".$mikdate."",-4);
                               $month_arr=substr("".$mikdate."",-11,3);
                                $date_arr=substr("".$mikdate."",-7,2);
								if (($year_arr %4)==0){
								$month_arr_con=array("jan"=>(0),"feb"=>(31),"mar"=>(60),"apr"=>(91),"may"=>(121),"jun"=>(152),"jul"=>(182),"aug"=>(213),"sep"=>(244),"oct"=>(274),"nov"=>(305),"dec"=>(335));
								}else{
								 $month_arr_con=array("jan"=>(0),"feb"=>(31),"mar"=>(59),"apr"=>(90),"may"=>(120),"jun"=>(151),"jul"=>(181),"aug"=>(212),"sep"=>(243),"oct"=>(273),"nov"=>(304),"dec"=>(334));}
                               $month_num= ($month_arr_con[$month_arr]);
							  $convert=(($year_arr-2000)*365+($month_num-1)+$date_arr);
	                          $tocon=(($hh_arr*3600) + ($mm_arr*60) + ($ss_arr));
	                         $convert_total=(($convert*86400)+$tocon);

                        ####################################################################
						

             ////<!--ฟังชั่น แปลง commentเป็นไทย+คำนวนวันหมดอายุุุ  jan/31/2017 23:00:01 , +0=>31มกราคม2560-->jan/31/2017 23:00:01 ,+10=10กุมภาพันธ์2560
              ////$time_conv=jan/31/2017 23:00:01,$offset=7,$time_on=""(เวลาไม่แสดง)$time_on=1(แสดงเวลา)31มกราคม2560 23:00:01
	         function expdate($time_conv,$offset,$time_on){
             if($time_conv!=""){
               $year_arr=substr("".$time_conv."",-13,4);//=2017 ปี
               $month_comment_arr=substr("".$time_conv."",-20,3); //jan เดือน
               $date_arr=substr("".$time_conv."",-16,2);//=23 วัน
              $hh_arr=substr("".$time_conv."",-8,2);
			  $mm_arr=substr("".$time_conv."",-5,2);
			  $ss_arr=substr("".$time_conv."",-2);
			  if (($year_arr %4)==0){
			  $month_arr_con=array("jan"=>(0),"feb"=>(31),"mar"=>(60),"apr"=>(91),"may"=>(121),"jun"=>(152),"jul"=>(182),"aug"=>(213),"sep"=>(244),"oct"=>(274),"nov"=>(305),"dec"=>(335));
			  }else{
              $month_arr=array("jan"=>(0),"feb"=>(31),"mar"=>(59),"apr"=>(90),"may"=>(120),"jun"=>(151),"jul"=>(181),"aug"=>(212),"sep"=>(243),"oct"=>(273),"nov"=>(304),"dec"=>(334));}


              $month_num= ($month_arr[$month_comment_arr]);
              $convert=(($year_arr-2000)*365+($month_num-1)+$date_arr);
	          $tocon=(($hh_arr*3600) + ($mm_arr*60) + ($ss_arr));
	          $convert2=(($convert*86400)+$tocon);
	          $check_offset=($offset*3600);
               $convert3=($convert2+$check_offset);
               $seconds=$convert3;
                $years = floor($seconds / 31536000);
	             $days = floor($seconds % 31536000 / 86400);
                $hours = floor($seconds % 86400 / 3600); 
                $minutes = floor($seconds % 3600 / 60); 
               $seconds = $seconds % 60;
	          $return=sprintf("%dy%03dd%02d:%02d:%02d", ($years+2000),($days), $hours, $minutes, $seconds);
             $output= "".$return."";
              $month_com=substr("".$output."",-12,3)+1;
             $year_com=substr("".$output."",-17,4)+543;
              $time_com=substr("".$output."",-8);
              if($offset!=""){
              $time="";if($time_on!=""){$time=" ".$time_com."";}
			  if (($year_arr %4)==0){
			  if($month_com<=31){$rew="".($month_com)." มกราคม ".$year_com."".$time."";return  $rew;}
              if($month_com<=60){$rew="".($month_com-31)." กุมภาพันธ์ ".$year_com."".$time.""; return  $rew;}
            if($month_com<=91){$rew="".($month_com-60)." มีนาคม ".$year_com."".$time."" ;return  $rew;}
           if($month_com<=121){$rew="".($month_com-91)." เมษายน ".$year_com."".$time."";return  $rew;}
           if($month_com<=152){$rew="".($month_com-121)." พฤษภาคม ".$year_com."".$time."";return  $rew;}
           if($month_com<=182){$rew="".($month_com-152)." มิถุนายน ".$year_com."".$time."";return  $rew;}
             if($month_com<=213){$rew="".($month_com-182)." กรกฎาคม ".$year_com."".$time."";return  $rew;}
              if($month_com<=244){$rew="".($month_com-213)." สิงหาคม ".$year_com."".$time."";return  $rew;}
               if($month_com<=274){$rew="".($month_com-244)." กันยายน ".$year_com."".$time."";return  $rew;}
                 if($month_com<=305){$rew="".($month_com-274)." ตุลาคม ".$year_com."".$time."";return  $rew;}
                  if($month_com<=335){$rew="".($month_com-305)." พฤศจิกายน ".$year_com."".$time."";return  $rew;}
                  if($month_com>=336){$rew="".($month_com-335)." ธันวาคม ".$year_com."".$time."";return  $rew;}
			  }else{
               if($month_com<=31){$rew="".($month_com)." มกราคม ".$year_com."".$time."";return  $rew;}
              if($month_com<=59){$rew="".($month_com-31)." กุมภาพันธ์ ".$year_com."".$time.""; return  $rew;}
            if($month_com<=90){$rew="".($month_com-59)." มีนาคม ".$year_com."".$time."" ;return  $rew;}
           if($month_com<=120){$rew="".($month_com-90)." เมษายน ".$year_com."".$time."";return  $rew;}
           if($month_com<=151){$rew="".($month_com-120)." พฤษภาคม ".$year_com."".$time."";return  $rew;}
           if($month_com<=181){$rew="".($month_com-151)." มิถุนายน ".$year_com."".$time."";return  $rew;}
             if($month_com<=212){$rew="".($month_com-181)." กรกฎาคม ".$year_com."".$time."";return  $rew;}
              if($month_com<=243){$rew="".($month_com-212)." สิงหาคม ".$year_com."".$time."";return  $rew;}
               if($month_com<=273){$rew="".($month_com-243)." กันยายน ".$year_com."".$time."";return  $rew;}
                 if($month_com<=304){$rew="".($month_com-273)." ตุลาคม ".$year_com."".$time."";return  $rew;}
                  if($month_com<=334){$rew="".($month_com-304)." พฤศจิกายน ".$year_com."".$time."";return  $rew;}
                  if($month_com>=335){$rew="".($month_com-334)." ธันวาคม ".$year_com."".$time."";return  $rew;}
				  }}
                   }}
############################################################################################################

                                       $now_time = $API->comm("/system/clock/print");
								 $now_date = $API->comm("/system/clock/print");
							    $miktime=($now_time['0']['time']);
								$mikdate=($now_date['0']['date']);
						       $hh_arr=substr("".$miktime."",-8,2);
			                   $mm_arr=substr("".$miktime."",-5,2);
			                   $ss_arr=substr("".$miktime."",-2);
							   $todaytime_con=(($hh_arr*3600) + ($mm_arr*60) + ($ss_arr));
							    $year_arr=substr("".$mikdate."",-4);
                               $month_arr=substr("".$mikdate."",-11,3);
                                $date_arr=substr("".$mikdate."",-7,2);
								if (($year_arr %4)==0){
								$month_arr_con=array("jan"=>(0),"feb"=>(31),"mar"=>(60),"apr"=>(91),"may"=>(121),"jun"=>(152),"jul"=>(182),"aug"=>(213),"sep"=>(244),"oct"=>(274),"nov"=>(305),"dec"=>(335));
								}else{
								 $month_arr_con=array("jan"=>(0),"feb"=>(31),"mar"=>(59),"apr"=>(90),"may"=>(120),"jun"=>(151),"jul"=>(181),"aug"=>(212),"sep"=>(243),"oct"=>(273),"nov"=>(304),"dec"=>(334));}
                               $month_num= ($month_arr_con[$month_arr]);
							  $convert=(($year_arr-2000)*365+($month_num-1)+$date_arr);
	                          $tocon=(($hh_arr*3600) + ($mm_arr*60) + ($ss_arr));
	                         $convert_total=(($convert*86400)+$tocon);
#################################################################################################################


	   function exp_time($mik_time,$com_time_conv,$offset) {
		                     
								  //// 1= $mik_time;//////from date+time mikrotik may/03/2017 and 15:28:09
                                 ///   
								///   2= $com_time_conv; ///from comment=may/03/2017 15:28:09
						       ///   3= = from number pro_expire=7
								 ///output=30d 24:45:00
							////////////////////////////////////////////////////
											 
					
						///////////////////////////////////////////////////////
						///comment function////
              $com_year_arr=substr("".$com_time_conv."",-13,4);//=2017 ปี
              $com_month_comment_arr=substr("".$com_time_conv."",-20,3); //jan เดือน
               $com_date_arr=substr("".$com_time_conv."",-16,2);//=23 วัน
              $com_hh_arr=substr("".$com_time_conv."",-8,2);
			  $com_mm_arr=substr("".$com_time_conv."",-5,2);
			  $com_ss_arr=substr("".$com_time_conv."",-2);
			  if(($com_year_arr %4)==0){
		$com_month_arr=array("jan"=>(0),"feb"=>(31),"mar"=>(60),"apr"=>(91),"may"=>(121),"jun"=>(152),"jul"=>(182),"aug"=>(213),"sep"=>(244),"oct"=>(274),"nov"=>(305),"dec"=>(335));	  
			  }else{
		$com_month_arr=array("jan"=>(0),"feb"=>(31),"mar"=>(59),"apr"=>(90),"may"=>(120),"jun"=>(151),"jul"=>(181),"aug"=>(212),"sep"=>(243),"oct"=>(273),"nov"=>(304),"dec"=>(334));}
       $com_month_num= ($com_month_arr[$com_month_comment_arr]);
      
	  $com_convert=(($com_year_arr-2000)*365+($com_month_num-1)+$com_date_arr);
	  $com_tocon=(($com_hh_arr*3600) + ($com_mm_arr*60) + ($com_ss_arr));
	  $com_convert2=(($com_convert*86400)+$com_tocon);
	  $com_offset=($offset*3600);
	  $com_convert_total=($com_convert2+$com_offset);
	  $setexpi=($com_convert_total-$mik_time);
	  if(($setexpi)>0){
      
	   
	   
	   $seconds=$setexpi;
    $days = floor($seconds / 86400);
    $hours = floor($seconds % 86400/ 3600); 
    $minutes = floor($seconds % 3600 / 60); 
    $seconds = $seconds % 60; 
 //  return sprintf("%dd %02d:%02d:%02d", $days, $hours, $minutes, $seconds);
   $return=sprintf("%dd %02d:%02d:%02d", $days, $hours, $minutes, $seconds);
   return $return;
}}
##############################################################################################################
         
		  
			 function Expire_color($limit_uptimeA,$uptimeA,$status_userA,$profile_check){
		$pro="";		
        if($limit_uptimeA=="1s"){return $time="#ff0000";}
		if($status_userA=="true"){return $time="#ff0000";}
		if($uptimeA!=""){if($limit_uptimeA==$uptimeA){return $time="#ff0000";}}
        if($profile_check==$pro){return $time="#ff0000";}
        return $time="";
}



###########################################################################################################



                        

							?>