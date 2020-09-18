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
 

function valid_smsmem(formname1)
{
if(MM_validateForm(formname1,'MemberName','Member Name','R','type_id','Sms Type','R','address','Address','R','contactno','Contact no','R','city','City','R','BuisenessName','Buiseness Name','R'))
{return true;}
	else
	{return false;}
}



function mobile_s(formname)
{	if(MM_validateForm(formname,'mem_nomineename','Nominee Name','R','child_nomineerelation','Nominee Relation','R','mem_birthdate','Nominee Age','R','memberid','Member Id','R'))
	{return true;}
	else
	{return false;}
}

function valid_communitycat(formname)
{	if(MM_validateForm(formname,'category_name','Category Name','R','category_description','Description','R'))
	{return true;}
	else
	{return false;}
} //valid_community

function valid_community(formname)
{	if(MM_validateForm(formname,'community_category','Community Category','R','community_name','Community Name','R','community_type','Community Type','R','community_forum','Community Forum','R','community_messaging','Community Messaging','R','community_country','Country','R','community_state','State','R','community_city','City','R','community_zip','Zip','R'))
	{return true;}
	else
	{return false;}
} //community_city


function valid_media(formname)
{	if(MM_validateForm(formname,'MediaName','Media Name','R'))
	{return true;}
	else
	{return false;}
} // media 

function valid_state(formname)
{	if(MM_validateForm(formname,'StatesName','States Name','R'))
	{return true;}
	else
	{return false;}
} // state

function valid_city(formname)
{	if(MM_validateForm(formname,'StatesID','States Name','R','city','City Name','R'))
	{return true;}
	else
	{return false;}
} // city

function valid_dirlist(formname)
{	if(MM_validateForm(formname,'StatesID','States Name','R','city','City Name','R'))
	{return true;}
	else
	{return false;}
} // city  ,'Zip','Zip','R','MainContact','Contact Person 1','R','SecondryContact','Contact Person 2','R','Email','Email-ID','R','Phone','Phone Number','R'

function valid_dirlist(formname)
{	if(MM_validateForm(formname,'Dir_ID','Directory','R','Title','Listing Title','R','Description','Description','R','Address','Address','R','Stateid','State','R','cityid','City','R'))
	{return true;}
	else
	{return false;}
} // dir

function valid_bannerlist(formname)
{	if(MM_validateForm(formname,'PageID','Page','R','LocationID','Location','R','url','Destination URL','R','target','Target','R','atext','Alternate Text','R','stext','Status Text','R','below','Text below Image','R','start','Start Date','R','end','End Date','R'))
	{return true;}
	else
	{return false;}
} // banner

function valid_mail(formname)
{	if(MM_validateForm(formname,'EMAILS','Email-ID','RisEmailadm_email:Valid mail'))
	{return true;}
	else
	{return false;}
} // city

function valid_forumcategory(formname)
{	if(MM_validateForm(formname,'Category_id','Forum Category','R', 'Subject','Subject','R','Message','Description','R','SortOrder','Sort Order','R'))
	{return true;}
	else
	{return false;}
} // forum category

function valid_Group(formname)
{	if(MM_validateForm(formname,'gcategory_id','Group Category','R', 'GroupName','Group Name','R','GroupDescription','Description','R'))
	{return true;}
	else
	{return false;}
}
function valid_link(formname)
{	if(MM_validateForm(formname,'LinkCategory','Link Category','R','LinkTitle','Link Title','R','LinkDescription','Link Description','R','LinkAddedDate','Added Date','R','Status','Status','R'))
	{return true;}
	else
	{return false;}
}// forum category
