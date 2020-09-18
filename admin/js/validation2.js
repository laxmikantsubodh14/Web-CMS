function MM_validateForm() 
{ 	var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
	j=0;
	//	/^([-a-zA-Z0-9._]+@[-a-zA-Z0-9.]+(\.[-a-zA-Z0-9]+)+)$/;
	var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var regBlank = /[^\s]/;
	var regAlphaNum = /^([a-zA-Z0-9_]+)$/;
	var regDate = /^([0-9_]+-[0-9][0-9]+-[0-9][0-9]+)$/;
	
	//alert (MM_validateForm.arguments[1].name);
	//alert("sss--->"+document.forms[""+args[0]].elements[""+args[0]].value);
	for (i=1; i<(args.length-2); i+=3) 
	{	
		mesg=args[i+1];
		test=args[i+2]; 
		val=document.forms[""+args[0]].elements[""+args[i]];
		    if (val) 
		{	nm=mesg; 
			
			val = val.value;
			//if ((val=val.value)!="") 
			if(regBlank.test(val))
			{
				if(test.indexOf('isEqual')!=-1)
				{
					result = trim(val);
				if(result.length==0){
				errors +='- Please enter your '+nm+ '.\n'; 
				}else{
					equal_obj_val = test.substring(8,test.indexOf(":"));
					mesg_string =test.substring((test.indexOf(":")+1));
					if(val != document.forms[""+args[0]].elements[""+equal_obj_val].value)
					{
						errors+='- '+nm+' and '+mesg_string+' are not same.\n';
					}
				}
				}
				else if(test.indexOf('isAlphaNum')!=-1)
				{
				result = trim(val);
				if(result.length==0){
				errors += '- '+nm+' is required.\n'; 
				}else{
					if(!regAlphaNum.test(val))
					{
						errors+='- '+nm+': Only Alpha Numeric and "_" Chars Allowed.\n';
					}
				}
				}
				else if (test.indexOf('isDate')!=-1) 
				{ 
					p=val.indexOf('-');
			        
					if (p != 4 )
					{
						errors+='- '+nm+' must contain Valid Date YYYY-MM-DD.\n';
		
					}
					else if(!regDate.test(val))
					{
						errors+='- '+nm+' must contain Valid Date YYYY-MM-DD.\n';
					}
			     }
				else if (test.indexOf('isEmail')!=-1) 
				{ 
					p=val.indexOf('@');
					s=val.indexOf('.');
			        if (p<1 || p==(val.length-1))
					{
						errors+='- Please enter a valid '+nm+' address (for e.g. xx@yahoo.com).\n';
		
					}
					//else if(s<p || s==(val.length-1))
					else if(!regEmail.test(val))
					{
						errors+='-Please enter a valid '+nm+' address (for e.g. xx@yahoo.com).\n';
					}
			     }
				else if (test.indexOf('isUrl')!=-1) 
				{ 
					p=val.indexOf('http://');
					s=val.indexOf('.');
			        if (p<0 || p==(val.length-1))
					{
						errors+='- '+nm+' must be valid URL e.g. http://www.abc.com\n';
		
					}
					else if(s<p || s==(val.length-1))
					{
						errors+='- '+nm+' must be valid URL e.g. http://www.abc.com\n';
					}
			     }else if (test.indexOf('isChar')!=-1) 
				 { 
					var first_char;
					first_char= val.charAt(0);
					if(first_char==0||first_char==1||first_char==2||first_char==3||first_char==4||first_char==5||first_char==6||first_char==7||first_char==8||first_char==9){
					 errors+='- '+nm+' must starts with  a char.\n';
					}
			     }
	   			 else if (test!='R') 
				 {
				 result = trim(val);
					if(result.length==0){
					errors +='- '+nm+' is required.\n'; 
					}
				    if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
					if (test.indexOf('inRange') != -1) 
					{ num = parseFloat(val);
						p=test.indexOf(':');
						min=test.substring(4,p); 
						max=test.substring(p+1);
						if (num<min || max<num) 
						errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
					} 
					if (val.indexOf('-') != -1) 
					{ 
						errors+='- '+nm+' must contain a number without dashes sign.\n';
					} 
					if (val.indexOf('+') != -1) 
					{ 
						errors+='- '+nm+' must contain a number without plus sign.\n';
					}
					
				}else if (test.charAt(0)=='R')
				{
				result = trim(val);
				if(result.length==0){
				errors += '- Please enter your '+nm+' .\n'; 
				}
				} 
			}
			else if (test.charAt(0) == 'R'){
				errors += '- Please enter your '+nm+'.\n'; 
			}
		}
		if(errors !="")
		{	if(j<=0)
			{
				
				focusitem = document.forms[""+args[0]].elements[""+args[i]];
				j++;
			}	
			
		}
	} 
	
//return errors;
  
  if (errors)
  {
	alert('Sorry, we cannot complete your request.\nKindly provide us the missing or incorrect information enclosed below.\n\n'+errors);
	
	focusitem.focus();
	return false;
   }
   else
	return true;

//  document.MM_returnValue = (errors == '');
	
}

function trim(inputString) {
   // Removes leading and trailing spaces from the passed string. Also removes
   // consecutive spaces and replaces it with one space. If something besides
   // a string is passed in (null, custom object, etc.) then return the input.
   if (typeof inputString != "string") { return inputString; }
   var retValue = inputString;
   var ch = retValue.substring(0, 1);
   while (ch == " ") { // Check for spaces at the beginning of the string
      retValue = retValue.substring(1, retValue.length);
      ch = retValue.substring(0, 1);
   }
   ch = retValue.substring(retValue.length-1, retValue.length);
   while (ch == " ") { // Check for spaces at the end of the string
      retValue = retValue.substring(0, retValue.length-1);
      ch = retValue.substring(retValue.length-1, retValue.length);
   }
   while (retValue.indexOf("  ") != -1) { // Note that there are two spaces in the string - look for multiple spaces within the string
      retValue = retValue.substring(0, retValue.indexOf("  ")) + retValue.substring(retValue.indexOf("  ")+1, retValue.length); // Again, there are two spaces in each of the strings
   }
   return retValue; // Return the trimmed string back to the user
} // Ends the "trim" function

//CODE FOR RECURRENCE STUFF  valid_admin

function valid_admin(formname) 
{	

if(MM_validateForm(formname,'adm_login_id','Login Id','R','adm_password','Password','RisEqualadm_conpwd:Confirm Password','adm_name','Username','R','adm_email','Email','RisEmailadm_email:Valid mail','adm_phone','Contact no','R','adm_address','Address','R','adm_city','City','R','adm_state','State','R','adm_zipcode','Zipcode','R'))
	{return true;}
	else
	{return false;}
}

function login_check(formname)
{	if(MM_validateForm(formname,'username_admin','user name','R','password_admin','password','R'))
	{return true;}
	else
	{return false;}
}

function login_check(formname)
{	if(MM_validateForm(formname,'username_admin','user name','R','password_admin','password','R'))
	{return true;}
	else
	{return false;}
}
 

function valid_Cat(formname)
{	if(MM_validateForm(formname,'TestTitle','Test Title','R'))
	{return true;}
	else
	{return false;}
}

function valid_clubincomedata(formname)
{	 
if(MM_validateForm(formname,'SecureClub','Secure Club Income ','R','SliverSecureClub','Sliver Secure Club Income','R','GoldClub','Gold Club Income','R','SuperSecureClub','Super Secure Club Income','R'))
	{return true;}
	else
	{return false;}
}  


function valid_smsdata(formname)
{	
if(MM_validateForm(formname,'LevelOne','Level One Income','R','LevelTwo','Level Two Income','R','LevelThree','Level Three Income','R','LevelFour','Level Four Income','R','LevelFive','Level Five Income','R','LocalSms','Local Sms Income','R'))
	{return true;}
	else
	{return false;}
}  


function valid_staff(formname)
{	if(MM_validateForm(formname,'cat_parent_id','Department','R','Name','Staff Name','R','EmployeeID','email','RisEmail','R','LoginID','Login ID','R','Password','Password ','R'))
	{return true;}
	else
	{return false;}
	
	/*if(MM_validateForm(formname,'cat_parent_id','Department','R','UnitID','Unit','R','Name','Staff Name','R','EmployeeID','email','RisEmail','R','LoginID','Login ID','R','Password','Password ','R'))
	{return true;}
	else
	{return false;}*/
}


 
function valid_page(formname)
{	if(MM_validateForm(formname,'page_name','pagename','R'))
	{return true;}
	else
	{return false;}
}

 
function checkPostForm(formname)
{	if(MM_validateForm(formname,'cat_name','category name','R' ,'cat_status','category status','R'))
	{return true;}
	else
	{return false;}
}


function valid_Question(formname)
{	

if(MM_validateForm(formname,'Cat_ID','Test','R','Question','Question','R','Ans1','Ans1','R','Ans2','Ans2','R','CurrectAns','Correct Answer','R','SortOrder','Sort Order','R'))
	{return true;}
	else
	{return false;}
return false;
}

function valid_shedule(formname)
{	

if(MM_validateForm(formname,'TestDate','Test Date','R','StartDateTime','Test Start Time','R','EndDateTime','Test End Time','R'))
	{return true;}
	else
	{return false;}
return false;
}


function login_user(formname)
{	if(MM_validateForm(formname,'UseName','user name','R','pasword','password','R'))
	{return true;}
	else
	{return false;}
}

function state_report(formname)
{	if(MM_validateForm(formname,'TestId','Test Title','R','StatesID','State','R'))
	{return true;}
	else
	{return false;}
}
function valid_unit(formname1)
{	
if(MM_validateForm(formname1,'UnitName','Unit Name','R'))
	{return true;}
	else
	{return false;}
}
 
 
function valid_education(formname1)
{	
if(MM_validateForm(formname1,'Education_name','Education Name','R'))
	{return true;}
	else
	{return false;}
}

function valid_bank(formname1)
{	
if(MM_validateForm(formname1,'Bank_name','Bank Name','R'))
	{return true;}
	else
	{return false;}
}

function valid_Interest(formname1)
{	
if(MM_validateForm(formname1,'Title','Title','R'))
	{return true;}
	else
	{return false;}
}


function valid_Payment(formname1)
{	
if(MM_validateForm(formname1,'Mode_name','Mode Name','R'))
	{return true;}
	else
	{return false;}
}

function valid_Advertisement(formname1)
{
if(MM_validateForm(formname1,'Company_name','Company Name','R','Address','Address','R','Contactno','Contact no','R','City','City','R','Emailid','Emailid','RisEmailEmailid:Valid mail','Add_date','Add Date','R'))
	{return true;}
	else
	{return false;}
}

// 
function valid_Data7(formname1)
{
if(MM_validateForm(formname1,'Level1','Level 1','R','Level2','Level2','R','Level3','Level3','R','Level4','Level4','R','Level5','Level5','R','Level6','Level6','R','Level7','Level7','R','Level8','Level8','R','Level9','Level9','R','Level10','Level10','R','Level11','Level11','R','Level12','Level12','R','Level13','Level13','R','Level14','Level14','R','Level15','Level15','R','Level16','Level16','R','Eleven_Twenty_Memincome','11-20 Member Income','R','Twenty_Thirtyfive_Memincome','20-35 Member Income','R','Thirty_Six_Above','36 above','R'))
	{return true;}
	else
	{return false;}
}



function valid_award(formname1)
{
if(MM_validateForm(formname1,'price_name','Price Name','R','level','Level','R','No_of_joining','No of Joining','R','amount','Amount','R','smaller_pitchure','Price Image','R'))
{return true;}
	else
	{return false;}
}


function valid_day(formname1)
{
if(MM_validateForm(formname1,'price_name','Price Name','R','No_of_days','No of days','R','No_of_ids','No of Ids','R','amount','Amount','R','price_photo','Price Image','R'))
{return true;}
	else
	{return false;}
}

function valid_city(formname1)
{
if(MM_validateForm(formname1,'country_id','Country','R','StatesID','states','R','city','City','R'))
	{return true;}
	else
	{return false;}
}


function valid_type(formname1)
{
if(MM_validateForm(formname1,'typename','Type Name','R'))
	{return true;}
	else
	{return false;}
}


function valid_smsmem(formname1)
{
if(MM_validateForm(formname1,'MemberName','Member Name','R','type_id','Sms Type','R','address','Address','R','contactno','Contact no','R','city','City','R','BuisenessName','Buiseness Name','R'))
{return true;}
	else
	{return false;}
}

function mobile_r(formname)
{	if(MM_validateForm(formname,'mem_firstName','First Name','R','mem_lastName','Last Name','R','mem_emailid','Email id','RisEmailmem_emailid:Valid Mail','mem_contactno','Contact no','R','mem_birthdate','Date of Birth','R','mem_pinno','Pin No','R','mem_mobileno','Mobile No','R','mem_sponsorid','Sponser I.D NO','R','mem_mhomeno','HN','R','mem_mcity','City','R','mem_mstate','State','R','mem_mcountry','Country','R','mem_mcolony','Street/Colony','R','mem_mpincode','PINcode','R'))
	{return true;}
	else
	{return false;}
}

function date_check1(formname)
{
if(MM_validateForm(formname,'start_date','Start Date','R','end_date','End Date','R'))
	{return true;}
	else
	{return false;}	
	
}


function mobile_s(formname)
{	if(MM_validateForm(formname,'fath_birthdate','Date of birth','R','fath_education','Education','R','fath_monthalyincome','Monthly Income','R','fath_remark','Remark','R','moth_birthdate','Date of birth','R','moth_education','Education','R','moth_monthalyincome','Monthly Income','R','moth_remark','Remark','R','sis_birthdate','Date of birth','R','sis_education','Education','R','sis_monthalyincome','Monthly Income','R','sis_remark','Remark','R','bro_birthdate','Date of birth','R','bro_education','Education','R','bro_monthalyincome','Monthly Income','R','bro_remark','Remark','R','self_birthdate','Date of birth','R','self_education','Education','R','self_monthalyincome','Monthly Income','R','self_remark','Remark','R','sp_birthdate','Date of birth','R','sp_education','Education','R','sp_monthalyincome','Monthly Income','R','sp_remark','Remark','R','child_birthdate','Date of birth','R','child_education','Education','R','child_monthalyincome','Monthly Income','R','child_remark','Remark','R','mem_nomineename','Nominee Name','R','child_nomineerelation','Nominee Relation','R','mem_birthdate','Nominee Date Of Birth','R','mem_emailid','Email Id','RisEmailmem_emailid: Valid Mail','memberid','Member Id','R'))
	{return true;}
	else
	{return false;}
}



