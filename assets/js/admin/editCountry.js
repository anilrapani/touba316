/**
 * File : editUser.js 
 * 
 * This file contain the validation of edit user form
 * 
 * @author Anil Rapani
 */
$(document).ready(function(){
	
	var editCountryForm = $("#editCountry");
	
	var validator = editCountryForm.validate({
		
		rules:{
			name :{ required : true },
			
		},
		messages:{
			name :{ required : "This field is required" },
			
		}
	});
});