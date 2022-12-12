<script>	
/****************************************************
Function name :- lettersOnly
Developer :- Shankar Kanase
Parameters :- 	1. evt (event)
Purpose :- To restrict user to enter only letter keys
Returns :- true or false
*****************************************************/	
	function lettersOnly(evt) 
	{
		evt = (evt) ? evt : event;
		var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :((evt.which) ? evt.which : 0));
		
		if (evt.keyCode == 8 ||   evt.keyCode == 39 || evt.keyCode == 32) 
		{
			return true;
		} 
		else if (charCode > 32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) ) 
		{
		// alert("Enter letters only.");
			return false;
		}
		return true;
	}
/****************************************************
Function name :- lettersOnly
Developer :- Shankar Kanase
Parameters :- 	1. evt (event)
Purpose :- To restrict user to enter only numeric keys
Returns :- true or false
*****************************************************/	
	function isNumberKey(evt)
	{
	
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
	
		 return true;
	}  
/**************************************************
## Function Name - isNumericKeyWithDot
## purpose - to accept only numeric values
## Developer - Shankar Kanase
## parameters - e (event)
				txtval (current textbox value)
**************************************************/
	function isNumericKeyWithDot(e,txtval)
	{
		if (window.event) { var charCode = window.event.keyCode; }
		else if (e) { var charCode = e.which; }
		else { return true; }
		if (charCode > 31 && (charCode < 48 || charCode > 57)  && charCode!=46) { return false; }

		 var len=txtval.replace(/[^.]/g, "").length;

		if(charCode==46&&(len>0||txtval.length<=0))
		 {
		  return false;
		 }

		return true;
	}
</script>