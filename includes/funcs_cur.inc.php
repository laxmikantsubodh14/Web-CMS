<?php
function protect_admin_page() {
	//return true;
	$cur_dir = dirname($_SERVER['PHP_SELF']);
	if($cur_dir == SITE_SUB_PATH.'/admin') {
		$cur_page = basename($_SERVER['PHP_SELF']);
		//echo "<br>cur_page: $cur_page";
		if($cur_page != 'login.php') {
			if ($_SESSION['sess_adm_login_id']=='') {
				header('Location: login.php');
				exit;
			}
		}
	}
}

function status_dropdown($name, $sel_value)
{
	$arr = array( "Active" => 'Active', 'Inactive' => 'Inactive');
	return array_dropdown($arr, $sel_value, $name);
}

function features_dropdown($name, $sel_value)
{
	$arr = array( "Featured" => 'Featured', 'Unfeatured' => 'Unfeatured');
	return array_dropdown($arr, $sel_value, $name);
}

function yes_no_dropdown($name, $sel_value)
{
	$arr = array( "Yes" => 'Active', 'Inactive' => 'Inactive');
	return array_dropdown($arr, $sel_value, $name);
}

function num_sub_categories($catid)
{
	$rtmp = executeQuery("select count(*) from swap_categories  where cat_parent_id='$catid'");
	$rwtmp = mysql_fetch_row($rtmp);
	return $rwtmp[0];
}
function option_categories($match=0,$parent=0,$space='',$matcharr=0,$optlabel=1)
{
	 
	// displays only <option> tags
	// use this function inside <select> tag
	
	// $matcharr = 0 if $match is not a array else $matcharr = 1 
	 
	$catSql="SELECT * FROM swap_categories WHERE cat_parent_id='".$parent."' order by cat_name";
	$rs = executeQuery($catSql);
	while($rw = mysql_fetch_assoc($rs))
	{		
		
			$arr=explode(",",$match);
			if(in_array($rw[cat_id],$arr))
			//if ($rw[Id]==$match)
				$sel = 'selected'; 
			else $sel = '';
				
		if ($parent==0)
		{
			if ($optlabel=='1')
			{
				//echo "<optgroup label='&nbsp;$rw[cat_name]' selected></optgroup>";
				echo "<option value='$rw[cat_id]' style='color:#000000;font:bold 12px arial;font-style:italic'  $sel>$rw[cat_name]</option>";
			}
			else
			{	
				echo "<option value='$rw[cat_id] style='color:#000000;font:bold 12px arial;font-style:italic' $sel>$rw[cat_name]--------------------------------------------</option>";
			}
		}
		else
		{
			echo "<option value='$rw[cat_id]' $sel>$space$rw[cat_name]</option>";
		}		
			$space_new = $space.' - ';
			option_categories($match,$rw[cat_id],$space_new,$matcharr,$just);
		
			
	}
}

function category_breadcrumbs($cat_id)
{
		
	$linkclass = 'bread1';
	$normalclass = 'bread2';
	
	$self = $_SERVER['PHP_SELF'];
	$break = "&nbsp;&raquo;&nbsp;";
	
	$root = "<a class=h1 href='$self'>Main Department</a>"; 	
	if ($cat_id == '0')
	{	
		$str = $root;		
	}	
	else
	{	
		$rs1 = executeQuery("SELECT cat_name,cat_parent_id from swap_categories where cat_id = '$cat_id' ");
		$rw1 = mysql_fetch_array($rs1);
		$lk1 = "<span class=h1>$rw1[cat_name]</span>";  
		$parent = $rw1[cat_parent_id];  
		if ($parent != '0')
		{ 
			
			while ($parent != 0)
			{ 
				$rs2 = executeQuery("SELECT cat_name,cat_parent_id,cat_id from swap_categories where cat_id = '$parent' ");
				$rw2 = mysql_fetch_array($rs2);
				
				$lk2 = "<a class=h1 href='$self?CategoryId=$rw2[cat_id]&show=product'>$rw2[cat_name]</a>".$break.$lk2;
				
				$parent = $rw2[cat_parent_id];
			}	
			
		} 
		$str = $root.$break.$lk2.$lk1; 
	}
	
	echo "<p align=left style='padding-left:10px'>$str</p>";
	
	
}
function delete_sub_categories($catid)
{
	
	$rs = executeQuery("SELECT * FROM swap_categories WHERE cat_parent_id='$catid' ");
	if (mysql_num_rows($rs)>0)
	{
		while ($rw = mysql_fetch_array($rs))
		{
			 
			delete_sub_categories($rw[cat_id]); 
			executeQuery("DELETE FROM swap_categories WHERE cat_id = '$rw[cat_id]'");
		}
	}
	executeQuery("DELETE FROM swap_categories WHERE cat_id = '$catid'");
} 
function display_session_msg()
{
	echo "<p class=msg>". $_SESSION['sessionMsg'] . "</p>";
	
	unset($_SESSION['sessionMsg']);
}
function getSingleResult($sql)
{
	$response = "";
	$result = mysql_query($sql) or die("<center>An Internal Error has Occured. Please report following error to the webmaster.<br><br>".$sql."<br><br>".mysql_error()."'</center>");
	if ($line = mysql_fetch_array($result)) {
		$response = $line['0'];
	} 
	return $response;
} 
function validate_admin()
{
	if($_SESSION['ses_userid']=='')
	{
		ms_redirect("index.php?back=$_SERVER[REQUEST_URI]");
	}
}

function ms_redirect($file, $exit=true, $sess_msg='')
{
	?>
	  <SCRIPT language="JavaScript">
		  location.href="<?php echo $file; ?>";
       </SCRIPT>
	<?php
	header("Location: $file");
	exit();
	
}

function display_date($date)
{
	if($date!='')
	{
		return date("d M,Y",strtotime($date));
	}
} 
function validate_user()
{
	if($_SESSION['user_login_id']=='')
	{
		ms_redirect("loginf.php?back=$_SERVER[REQUEST_URI]");
	}
}
function getUserName($sessionId)
{
	$sqlUser="select * from swap_users where user_id='$sessionId'";
	$rsUser=executeQuery($sqlUser);
	$arrUser=mysql_fetch_array($rsUser);
	return $arrUser["user_first_name"]." ".$arrUser["user_last_name"];
}
function getCatPoints($catId)
{
	$sqlCat="select cat_points from swap_categories where cat_id='$catId'";
	return $rsCat=getSingleResult($sqlCat);
}
function category_combo($sql='',$name,$selTxt='',$class,$javascript='')
{
	if($javascript=="Yes") { $script='onChange="javascript:select_type();"'; } else { $script=""; }
	if($sql=='') 
	{
		$sqlCat="select * from swap_categories where cat_parent_id!='0' and cat_status='Active' order by cat_name asc";		
	} else {
		$sqlCat=$sql;
	}
	$rsCat=executeQuery($sqlCat);
	
	$combo="<select name='$name' class='$class' $script>";
	$combo.="<option value=''>Select Category</option>";
	while($arrCat=mysql_fetch_array($rsCat))
	{
		@extract($arrCat);
		if($selTxt==$cat_id) {
			$sel="selected";
		} else {
		$sel="";
		}
		$combo.="<option value='$cat_id' $sel>$cat_name</option>";
		
	} 
	if($selTxt=='00')
	{
		$sel="selected";
	}
	$combo.="<option value='00' $sel>All Other Categories</option>";
	$combo.="</select>";
	
return $combo;
}
function getCategoryName($CatId)
{
	$sql="select cat_name from swap_categories where cat_id='$CatId'";
	return $rs=getSingleResult($sql);
}
function unlink_file( $file_name , $folder_name )
{
	$file_path = $folder_name."/".$file_name;
	@chmod ($foleder_name , 0777);
	@unlink($file_path);
	return true;	
}
function user_combo($sql='',$name,$selTxt='',$class)
{
	if($sql=='') 
	{
		$sqlCat="select * from swap_users where user_status='Active' order by user_login_id asc";		
	} else {
		$sqlCat=$sql;
	}
	$rsCat=executeQuery($sqlCat);
	
	$combo="<select name='$name' class='$class'>";
	$combo.="<option value=''>Select User Name</option>";
	while($arrCat=mysql_fetch_array($rsCat))
	{
		@extract($arrCat);
		if($selTxt==$user_id) {
			$sel="selected";
		} else {
		$sel="";
		}
		$combo.="<option value='$user_id' $sel>$user_login_id</option>";
	}
	$combo.="</select>";
	
return $combo;
}
function readmyfile($path)
{
	$text='';
	$fp = @fopen($path,"r");
	while (!@feof($fp))
	{
	$buffer = @fgets($fp, 4096);
	$text.= $buffer;
	}
	@fclose($fp);
	return $text;
}
if(!function_exists("send_mail"))
{
	function send_mail($email_to,$subject,$message,$from_email,$from_name='',$html=false)
	{
		 if($from_name == '') $from_name=$from_email;
		 if($html==true) $headers = "Content-type: text/html; charset=iso-8859-1\r\n";
		 else $headers = "Content-type: text/plain; charset=iso-8859-1\r\n";
		 $headers .= "From: $from_email \r\n";
		 mail($email_to,$subject,$message,$headers);
	}

}
function getUserFld($userId,$FldName)
{
	$sqlUser="select $FldName from swap_users where user_id='$userId'";
	return $rsUser=getSingleResult($sqlUser);
	
}
function getItemUser($ItemId)
{
	$sqlUser="select item_user_id from swap_items where item_id='$ItemId'";
	return $rsUser=getSingleResult($sqlUser);

}

function count_offer($ItemId)
{
	$sql="select count(*) as cnt from swap_offers where off_item_id='$ItemId' and off_status='Active'";
	return getSingleResult($sql);
}
function get_pagerent_child_id($child_id='')
{
	if($child_id!='')
	{
			$sqlCat="select cat_parent_id from swap_categories where cat_id='$child_id'";			
			$rsCat=getSingleResult($sqlCat);
			return getCategoryName($rsCat).">>".getCategoryName($child_id);

	}
}
function item_count_cat($catId,$subCat='')
{
		if($subCat=='')
		{
			$sqlCat="select * from swap_categories where cat_parent_id='".$catId."'";
			$rsCat=executeQuery($sqlCat);	
			$tempId="";
			while($arrCat=mysql_fetch_array($rsCat))
			{
			$tempId.=$arrCat[cat_id].",";
			}
			$tempId=substr($tempId,0,strlen($tempId)-1);
			if($tempId!='')
			{
				$sqlCat="select count(*) as cnt from swap_items where item_cat_id in($tempId)";
				$rsCat=executeQuery($sqlCat);
				$arrCat=mysql_fetch_array($rsCat);
				$varreturn=$arrCat["cnt"];
			}
			else
			{
				$varreturn=0;
			}
		}
		else 
		{
			$sqlCat="select count(*) as cnt from swap_items where item_cat_id='".$catId."'";
			$rsCat=executeQuery($sqlCat);
			$arrCat=mysql_fetch_array($rsCat);
			$varreturn=$arrCat["cnt"];
		}
		return $varreturn;
}
function check_item_in_cat($catId)
{
	$sqlCat="select * from swap_categories where cat_parent_id='".$catId."'";
	$rsCat=executeQuery($sqlCat);	
	$tempId="";
	while($arrCat=mysql_fetch_array($rsCat))
	{
		$tempId.=$arrCat[cat_id].",";
	}
	$tempId=substr($tempId,0,strlen($tempId)-1);
	if($tempId!='')
	{
		$sqlItem="select * from swap_items where item_cat_id in ($tempId)";
		$rsItem=executeQuery($sqlItem);
		if(mysql_num_rows($rsItem)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
function check_item_cat($catId)
{
	if($catId!='')
	{
		$sqlItem="select * from swap_items where item_cat_id ='".$catId."' and item_status='Active'";
		$rsItem=executeQuery($sqlItem);
		if(mysql_num_rows($rsItem)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

function change_order($cat_id,$question_id,$new_order,$id,$type,$is_ques_page=0)
{		

if($type=='cat_list')
{
	$table_name = "swap_categories";
	$col1       = "cat_order";
	$col2       = "cat_id";
	$id_head    = "";
	$id_head_value = "";
} 
elseif($type=='cat_drop_list')
{
	$table_name = "swap_categories";
	$col1       = "cat_drop_order";
	$col2       = "cat_id";
	$id_head    = "";
	$id_head_value = "";
}

	$sql = " select $col1 from $table_name where $col2='$id' ";
	$order_old=getsingleresult($sql);

	if(intval($order_old)>intval($new_order))
	{
		$sql= "select $col1,$col2 from $table_name where $col1 >='$new_order' and $col1<'$order_old' ";
		if($id_head_value!='' && $id_head!='') { 
			$sql .= " and $id_head ='$id_head_value' ";
		}
		$sql .= " order by $col1 asc ";
		$result=executeQuery($sql);
		while($line = mysql_fetch_array($result))
		{
			$orderx = $line[$col1];
			$idx	 = $line[$col2];
			$orderx++;
			$sql="update $table_name set $col1='$orderx' where $col2= '$idx'";
			executeQuery($sql);
		}
	}
	else
	{
		$sql= "select $col1,$col2 from $table_name where $col1>$order_old  and $col1<=$new_order ";
		if($id_head_value!='' && $id_head!='') { 
			$sql .= " and $id_head ='$id_head_value' ";
		}
		$sql .= " order by $col1 asc ";
		$result=executeQuery($sql);
		while($line = mysql_fetch_array($result))
		{
			$orderx  = $line[$col1];
			$idx	 = $line[$col2];
			$orderx--;
			$sql="update $table_name set $col1='$orderx' where $col2= '$idx'";
			executeQuery($sql);
		}
	}
	$sql= "update $table_name set $col1='$new_order' where $col2='$id'";
	executeQuery($sql);
}

function get_order($type)
{
	if($type=="drop")
	{
		$sql="select max(cat_drop_order)+1 as MaxOrder from swap_categories where cat_parent_id!='0'";
	} 
	else 
	{
		$sql="select max(cat_order)+1 as MaxOrder from swap_categories where cat_parent_id!='0'";
	}
	$rs=executeQuery($sql);
	$arr=mysql_fetch_array($rs);
	return $arr["MaxOrder"];
}
function get_item_name($item_id)
{
	$sql="select item_title from swap_items where item_id='$item_id'";
	$rs=executeQuery($sql);
	$arr=mysql_fetch_array($rs);
	return $arr["item_title"];

}
function get_points($point_id)
{
	$sqlPoint="select point from swap_point_price where point_id='".$point_id."'";
	$rsPoint=executeQuery($sqlPoint);	
	$arrPoint=mysql_fetch_array($rsPoint);
	return $arrPoint["point"];
}
function get_points_price($point_id)
{
	$sqlPoint="select point_price from swap_point_price where point_id='".$point_id."'";
	$rsPoint=executeQuery($sqlPoint);	
	$arrPoint=mysql_fetch_array($rsPoint);
	return $arrPoint["point_price"];
}
function get_from_email()
{
		$sql="select config_value from swap_configs where config_name='From Email'";
		$rs=executeQuery($sql);
		$arr=mysql_fetch_array($rs);
		return $arr["config_value"];
}
function cust_send_mail($email_to,$emailto_name,$email_subject,$email_body,$email_from,$reply_to,$html=true)
{
	require_once "class.phpmailer.php";
	global $SITE_NAME;
	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP
	$mail->Host   = "www.xicom.biz"; // SMTP servers
	$mail->From     = $email_from;
	$mail->FromName = $SITE_NAME;
	$mail->AddAddress($email_to,$emailto_name); 
	$mail->AddReplyTo($reply_to,$SITE_NAME);
	$mail->WordWrap = 50;                              // set word wrap
	$mail->IsHTML($html);                               // send as HTML
	$mail->Subject  =  $email_subject;
	$mail->Body     =  $email_body;
	if(!$mail->Send())
	{
		$error_detail="activation mail error for $email_address   Mailer Error: " . $mail->ErrorInfo;
		$error_type="mail error";
		$sql="INSERT INTO error_log (error_type,error_detail,error_date) VALUES ('$error_type','$error_detail',curdate())";
		executeQuery($sql);
		return false;
	}
	else{
	return true;
	}
}


function staff_breadcrumbs($staffid)
{
	
	
	$linkclass = 'bread1';
	$normalclass = 'bread2';
	
	$self = $_SERVER['PHP_SELF'];
	$break = "&nbsp;&raquo;&nbsp;";
	
	$root = "<a class=h1 href='$self'>Head Staff</a>"; 	
	if ($cat_id == '0')
	{	
		$str = $root;		
	}	
	else
	{	
		$rs1 = executeQuery("SELECT Name,StaffID  from dlf_staff  where StaffID  = '$staffid'");
		$rw1 = mysql_fetch_array($rs1);
		$lk1 = "<span class=h1>$rw1[Name]</span>";  
		$parent = $rw1[cat_parent_id];  
		if ($parent != '0')
		{ 
			
			while ($parent != 0)
			{ 
				$rs2 = executeQuery("SELECT Name,StaffID,UnderEmployee from dlf_staff where UnderEmployee = '$parent' ");
				$rw2 = mysql_fetch_array($rs2);
				
				$lk2 = "<a class=h1 href='$self?StaffID=$rw2[StaffID]&show=product'>$rw2[Name]</a>".$break.$lk2;
				
				$parent = $rw2[cat_parent_id];
			}	
			
		} 
		$str = $root.$break.$lk2.$lk1; 
	}
	
	echo "<p align=left style='padding-left:10px'>$str</p>";
	
	
}


?>
