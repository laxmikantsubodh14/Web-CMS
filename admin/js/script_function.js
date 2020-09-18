function chkall(obj_frm,obj) {
	for(i=0;i<obj_frm.elements.length;i++)	{
		if(obj_frm.elements[i].type == "checkbox"){
		obj_frm.elements[i].checked = obj.checked;
		}
	}
}
function  del_prompt(obj_frm,val,act) {
	if(confirm("Are you sure you want to change the status to "+val)) {
		if(act!="") {
		obj_frm.action = act;
		}
		obj_frm.what.value=val;	
		obj_frm.submit();
	}
}