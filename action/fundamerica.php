<?php         
				$sql = "select * from ".REGISTERED_UESR." where User_Id='".$_SESSION['userid']."'";
				$fundregister = $objDB->select($sql);
				
				//Select query for select recors from profile table
				$sql = "select * from ".USER_PROFILE." where User_Id='".$_SESSION['userid']."'";
				$userprofile = $objDB->select($sql);
				
				//$dob=date('d-m-Y',strtotime($fundregister[0]['InvBirthDate']));
				//echo $dob=$userprofile[0]['DOB'];
				$AmountPerShare = inserttext(loadvariable("AmountPerShare",""));
				$pid=inserttext(loadvariable("productid",""));
				
				//select recors for project table
				$sql = "select * from ".PROJECTS." where Project_Id='".$pid."'";
				$investingproject= $objDB->select($sql);
				
				//select query for fund_api_data
				$sql = "select * from ".FUND_API_DATA." where Project_Id='".$pid."'";
				$fundapidata= $objDB->select($sql);
				
				//select recors for fund_api_data table
				$sql = "select * from ".REGISTERED_UESR." where User_Id='".$_SESSION['userid']."'";
				$fundregister= $objDB->select($sql);
				
				$sql = "select * from ". INVESTMENTS ." where User_Id='". $_SESSION['userid'] ."' AND Project_Id='".$pid."'";
				$investment=$objDB->select($sql);
				$sql="select AdminEmail from ". TABLE_ADMINISTRATOR . " where AdminID='".$investingproject[0]['User_Id']."'"; 
				$admin=$objDB->select($sql);
				$isLogin = $client->vtigerLogin($store_url, $user_id, $accesskey);	
						
				//form variables
					$paymentmethod=inserttext(loadVariable("fund_type","")); 
					$noofshare=inserttext(loadVariable("NoOfShare","")); 
					$amount=$noofshare*$AmountPerShare;	
					//$DigitalSign =	inserttext(loadVariable("signature","")); 
					$InvestorID =  $investment[0]['Investor_ID'];
					$ProjectName = $investingproject[0]['Deal_Title'];
					$City = $investingproject[0]['City'];
					$State = $investingproject[0]['State'];
					$Name = $fundregister[0]['First_Name']. " " . $fundregister[0]['Last_Name'];
					$UserEmail = $fundregister[0]['Email'];
					
				//api code for entity---------
//-------If investor is not registered on fund america----------------------//
				if(empty($fundregister[0]['Entity_Id']))
				{
					
					$url = 'entities';
					$method='post';

					$data = array(
					'city'=>$userprofile[0]['City']		//City of entity's address. Required.
					, 'country'=>'US'
					, 'email'=>$fundregister[0]['Email']	//Entity's contact email. Required.
					,'date_of_birth'=>$userprofile[0]['DOB']  //Entity's date of birth. Required if type is person and entity is greater then 18
					, 'name'=>$fundregister[0]['First_Name'].$fundregister[0]['Last_Name']
					, 'phone'=>$userprofile[0]['Phone_No']
					, 'postal_code'=>$userprofile[0]['Zip']
					, 'region'=>$userprofile[0]['State']//'NY'					//State of entity's address. Required.
					, 'street_address_1'=>$userprofile[0]['Address']
					, 'tax_id_number'=>$userprofile[0]['SSN']			//SSN or FEIN for entity. Required.
					, 'type'=>'person'					// Must be person, company or custodial. Required.
					//, 'executive_name'=>'John+Johnson'     //Required if type is company.
					//, 'region_formed_in'=>'NY'				//The state where the company was formed. Required if type is company
					);

					if(!empty($data)) 
					{
						$result=fundapiupdate($url, $data,$method);
						//print_r($result); 
					} 
				 	$sql="update ".REGISTERED_UESR." set Entity_Id='".$result->id."' where User_Id='".$_SESSION['userid']."'"; 
					$update = $objDB->sql_query($sql);
					
					if($paymentmethod==2)
					{
						//------------------------------------------------//
						//Example Create (with entity) Investments
						//return investment id
						$url = 'investments';
						$method='post';
						$data = array(
						'amount'=>$amount,
						'entity[city]'=>$userprofile[0]['City'],
						'entity[country]'=>'US',
						'entity[date_of_birth]'=>$userprofile[0]['DOB'],
						'entity[email]'=>$fundregister[0]['Email'],
						'entity[name]'=>$fundregister[0]['First_Name'].$fundregister[0]['Last_Name'],
						'entity[phone]'=>$userprofile[0]['Phone_No'],
						'entity[postal_code]'=>$userprofile[0]['Zip'],
						'entity[region]'=>$userprofile[0]['State'],//'NV',
						'entity[street_address_1]'=>$userprofile[0]['Address'],
						'entity[tax_id_number]'=>$userprofile[0]['SSN'],
						'equity_share_count'=>$noofshare,
						'offering_id'=>$fundapidata[0]['Offering_Id'],
						'payment_method'=>'wire',
						);
						if(!empty($data)) 
						{
							$result=fundapiupdate($url, $data,$method);
							//print_r($result);
						}
						//$sql = "insert ".INVESTMENTS." set User_Id='".$_SESSION['userid']."',Project_Id='".$investingproject[0]['Project_Id']."',NoOfShare='".$noofshare."',Amount='".$amount."',AmoutPerShare='".$AmountPerShare."',Funding_Status='1',Date='".date('Y-m-d h:i:s')."',DigitalSignature='".$fundregister[0]['First_Name'].$fundregister[0]['Last_Name']."'";
						//$invest = $objDB->insert($sql);
					 $sql = "insert ".INVESTMENTS." set User_Id='".$_SESSION['userid']."',Project_Id='".$pid."',NoOfShare='".$noofshare."',Amount='".$amount."',AmountPerShare='".$AmountPerShare."',Funding_Status='1',Date='".date('Y-m-d h:i:s')."',DigitalSignature='".$DigitalSign."'"; 
				
				 $LastInvestedUserId = $objDB->insert($sql);	
				 $params = array();
				 $params['user_id'] = $_SESSION['userid'];
				 $params['project_id'] = $pid;
				 $params['no_of_share'] = $noofshare;
				 $params['total_amount'] = $amount;
				 $params['amount_per_share'] = $AmountPerShare;
				 $params['funding_status'] = "1";
				 $params['investment_date'] = date('Y-m-d h:i:s');
				 $params['digital_signature'] = $DigitalSign;
				 $params['investment_no'] = $LastInvestedUserId ;
				 if($isLogin)
				 { 
					$client->sync_gb_info($store_url,$params,"Investment");
				 }
				 $sql = "insert ". TRANSACTION ." set UserID='".$_SESSION['userid']."',ProjectID='".$pid."',NoOfShare='".$noofshare."',TotalAmount='".$amount."',AmountPerShare='".$AmountPerShare."',Status='1',InvestedDate='".date('Y-m-d h:i:s')."'";				
				$LastUserTransationId = $objDB->insert($sql);	
				$params = array();
				$params['user_ids'] = $_SESSION['userid'];
				$params['projects_id'] = $pid;
				$params['no_of_share'] = $noofshare;
				$params['total_amounts'] = $investingproject[0]['Currency'].$amount;
				$params['amount_per_share'] = $investingproject[0]['Currency'].$AmountPerShare;
				$params['status'] = "1";
				$params['invest_date'] = date('Y-m-d h:i:s');
				$params['transaction_no'] = $LastUserTransationId;
				$params['transaction_name']=$ProjectName;
				
				 if($isLogin)
				 { 
					$client->sync_gb_info($store_url,$params,"Transaction");
				 }
				 $sql="update ".PROJECTS ." Set Money_Raised=(Money_Raised+".$amount.") where Project_Id='".$pid."'";
				$objDB->sql_query($sql);
				$params = array();
				$params['cf_684'] = $amount;
				if($isLogin)
				 { 
					$client->project_update($store_url,$params,$pid,18);
				 }
				if($investingproject[0]['Funding_Goal'] <= ($investingproject[0]['Money_Raised']+$amount)){
					 $sql= "update ".PROJECTS . " Set Status='Funded' where Project_Id='".$pid."'"; 
					$objDb->sql_query($sql);
					$params = array();
					$params['cf_721'] = "Funded";
					if($isLogin)
					 { 
						$client->project_update($store_url,$params,$pid,19);
					 }
				} 
				$sql="select * from ".EMAIL_TEMPLATES. " where TemplatePage='investment' AND Status='1'";
				$temp=$objDB->select($sql);
								
						$mail = new PHPMailer();
						//$UserEmail = $OneUserDetail[0]['Email'];	
						//$Name = $OneUserDetail[0]['First_Name']." ". $OneUserDetail[0]['Last_Name'];						
						
						$pdfdwnlink = $AbsoluteURL."investment-agreement/action/pdfaction/".$LastInvestedUserId;											
							
							if(!empty($temp[0]['Template'])) {  $File = MAIL_TEMPLATE. $temp[0]['Template'] ; }
							else {	$File = MAIL_TEMPLATE_PATH."investment_nitification.html"; }
							$Body=file_get_contents($File);
							
							$Body=str_replace("{{url}}",$AbsoluteURL."images/Realty_Wealth_new_logo.png",$Body);
							$Body=str_replace("{{Name}}",$Name,$Body);
							$Body=str_replace("{{ProjectTitle}}",$ProjectName ,$Body);
							$Body=str_replace("{{TxtProjCity}}",$City,$Body);
							$Body=str_replace("{{TxtProjState}}",$State,$Body);
							$Body=str_replace("{{AmountPerShare}}",number_format($AmountPerShare,2),$Body);
							$Body=str_replace("{{NomberOfShare}}",$noofshare,$Body);
							$Body=str_replace("{{TotalAmount}}",number_format($amount,2),$Body);
							$Body=str_replace("{{pdfdwnlink}}",$pdfdwnlink,$Body);	
							
							$mail->SetFrom(EMAIL_FROM, EMAIL_FROM_NAME);
							$mail->AddReplyTo(EMAIL_FROM, EMAIL_FROM_NAME);
							$mail->AddAddress($UserEmail,$Name);
							
							$mail->Subject = 'Investment Notification - Realtywealth';
							$mail->MsgHTML($Body);					
							$mail->Send();
					}
					
				}
			
//-------If investor is already registered on fund america----------------------//				
				
				else 
				{ 		
						// if($paymentmethod==2)
						// {
							//------------------------------------------------//
							//Example Create (with entity) Investments
							//return investment id
							$url = 'investments';
							$method='post';
							$data = array(
							'amount'=>$amount,
							'entity[city]'=>$userprofile[0]['City'],
							'entity[country]'=>'US',
							'entity[date_of_birth]'=>$userprofile[0]['DOB'],
							'entity[email]'=>$fundregister[0]['Email'],
							'entity[name]'=>$fundregister[0]['First_Name'].$fundregister[0]['Last_Name'],
							'entity[phone]'=>$userprofile[0]['Phone_No'],
							'entity[postal_code]'=>$userprofile[0]['Zip'],
							'entity[region]'=>$userprofile[0]['State'],//'NV',
							'entity[street_address_1]'=>$userprofile[0]['Address'],
							'entity[tax_id_number]'=>$userprofile[0]['SSN'],
							'equity_share_count'=>$noofshare,
							'offering_id'=>$fundapidata[0]['Offering_Id'],
							'payment_method'=>'wire',
							);
						//}
						if(!empty($data)) 
						{
							$result = fundapiupdate($url, $data,$method);
							echo "<pre>";print_r($result);
						}
						//$sql = "insert into ".INVESTMENTS." set User_Id='".$_SESSION['userid']."',Project_Id='".$investingproject[0]['Project_Id']."',NoOfShare='".$noofshare."',Amount='".$amount."',AmoutPerShare='".$AmountPerShare."',Funding_Status='1',Date='".date('Y-m-d h:i:s')."',DigitalSignature='".$fundregister[0]['First_Name'].$fundregister[0]['Last_Name']."'";
						//$invest = $objDB->insert($sql);
						$sql = "update ".INVESTMENTS." set NoOfShare=(NoOfShare+".$noofshare."), Amount=(Amount+".$amount."), AmountPerShare='".$AmountPerShare."' where Investor_ID='".$InvestorID."'";  
				
				$result = $objDB->sql_query($sql);
				$params = array();
				$params['no_of_share'] = $noofshare;
				$params['total_amount'] = $amount;
				$params['amount_per_share'] = $AmountPerShare;
				if($isLogin)
				 { 
					$client->investments($store_url,$params,$InvestorID);
				 } 
				  
				$sql="select * from ".EMAIL_TEMPLATES. " where TemplatePage='update_investment' AND Status='1'"; 
				$temp=$objDB->select($sql);
				
				$sql = "insert ".TRANSACTION." set UserID='".$_SESSION['userid']."',ProjectID='".$pid."',NoOfShare='".$noofshare."',TotalAmount='".$amount."',AmountPerShare='".$AmountPerShare."',Status='1',InvestedDate='".date('Y-m-d h:i:s')."'";
				$LastUserTransationId = $objDB->insert($sql);	
				$params = array();
				$params['user_ids'] = $_SESSION['userid'];
				$params['projects_id'] = $pid;
				$params['no_of_share'] = $noofshare;
				$params['total_amounts'] = $investingproject[0]['Currency'].$amount;
				$params['amount_per_share'] = $investingproject[0]['Currency'].$AmountPerShare;
				$params['status'] = "1";
				$params['invest_date'] = date('Y-m-d h:i:s');
				$params['transaction_no'] = $LastUserTransationId;
				$params['transaction_name']=$ProjectName;
				
				if($isLogin)
				 { 
					$client->sync_gb_info($store_url,$params,"Transaction");
				 }
				$sql="update ".PROJECTS ." Set Money_Raised=(Money_Raised+".$amount.") where Project_Id='".$pid."'";
				$objDB->sql_query($sql); 
				$params = array();
				$params['cf_684'] = $amount;
				if($isLogin)
				 { 
					$client->project_update($store_url,$params,$pid,18);
				 }		
				if($investingproject[0]['Funding_Goal'] <= ($investingproject[0]['Money_Raised']+$amount)){
					 $sql= "update ".PROJECTS . " Set Status='Funded' where Project_Id='".$pid."'"; 
					 $objDB->sql_query($sql);
					 $params = array();
					 $params['cf_721'] = "Funded";
					 if($isLogin)
					 { 
						$client->project_update($store_url,$params,$pid,19);
					 }
				} 
				$sql = "select * from ". INVESTMENTS ." where Investor_ID='".$InvestorID."'";
				$SendIntoMailDetail = $objDB->select($sql);

				$NoOfShare = $SendIntoMailDetail[0]['NoOfShare'];
				$TotalAmount = $SendIntoMailDetail[0]['Amount'];
				
						$mail = new PHPMailer();
						
						//$UserEmail = $OneUserDetail[0]['Email'];		
						
						//$Name = $OneUserDetail[0]['First_Name']. " ". $OneUserDetail[0]['Last_Name'];						
						$pdfdwnlink = $AbsoluteURL."investment-agreement/action/pdfaction/".$result;					
							if(!empty($temp[0]['Template'])) { $File = MAIL_TEMPLATE. $temp[0]['Template'] ; }
							else {  $File = MAIL_TEMPLATE_PATH."investment_update_nitification.html"; }
							$Body=file_get_contents($File);
							
							$Body=str_replace("{{url}}",$AbsoluteURL."images/Realty_Wealth_new_logo.png",$Body);
							$Body=str_replace("{{Name}}",$Name,$Body);
							$Body=str_replace("{{UserId}}",$InvestorID,$Body);
							$Body=str_replace("{{ProjectTitle}}",$ProjectName ,$Body);
							$Body=str_replace("{{TxtProjCity}}",$City,$Body);
							$Body=str_replace("{{TxtProjState}}",$State,$Body);
							$Body=str_replace("{{AmountPerShare}}",number_format($AmountPerShare,2),$Body);
							$Body=str_replace("{{NomberOfShare}}",$NoOfShare,$Body);
							$Body=str_replace("{{TotalAmount}}",number_format($TotalAmount,2),$Body);
							$Body=str_replace("{{pdfdwnlink}}",$pdfdwnlink,$Body);
							
							$mail->SetFrom(EMAIL_FROM, EMAIL_FROM_NAME);
							$mail->AddReplyTo(EMAIL_FROM, EMAIL_FROM_NAME);
							$mail->AddAddress($UserEmail,$Name);
							
							$mail->Subject = 'Investment Notification - Realtywealth';
							$mail->MsgHTML($Body);	
							
							$mail->Send(); 
					}
				echo '<script>window.location="'.$AbsoluteURL.'deal/'.$pid.'"</script>';
				
?>