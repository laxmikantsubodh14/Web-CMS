function setPaymentInfo(check)
{
	    //alert(document.form1.mem_mhomeno.value); 
	   if(check)
	   {
			document.form1.mem_phomeno.value=document.form1.mem_mhomeno.value;
			document.form1.mem_pcolony.value=document.form1.mem_mcolony.value;
			document.form1.mem_psate.value=document.form1.mem_mstate.value;
			document.form1.mem_pcity.value=document.form1.mem_mcity.value;
			document.form1.mem_ppincode.value=document.form1.mem_mpincode.value;
			document.form1.pdistrict_id.value=document.form1.mdistrict_id.value;
			document.form1.POtherCity.value=document.form1.OtherCity.value;
			document.form1.pOtherDistrict.value=document.form1.OtherDistrict.value;
			
			
			document.form1.mem_phomeno.readOnly  = true;
			document.form1.mem_pcolony.readOnly   = true;
			document.form1.mem_pstate.readOnly   = true;
			document.form1.mem_pcity.readOnly   = true;
			document.form1.pdistrict_id.readOnly   = true;
			document.form1.mem_ppincode.readOnly  = true;	
			document.form1.POtherCity.readOnly  = true;	
			document.form1.pOtherDistrict.readOnly  = true;	
		} else {
			document.form1.mem_phomeno.readOnly  = false;
			document.form1.mem_pcolony.readOnly   = false;
			document.form1.mem_pstate.readOnly   = false;
			document.form1.mem_pcity.readOnly   = false;	
			document.form1.pdistrict_id.readOnly   = true;
			document.form1.mem_ppincode.readOnly      = false;	
			document.form1.POtherCity.readOnly  = false;	
			document.form1.pOtherDistrict.readOnly  = false;	
		}
	
}