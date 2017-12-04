/**
 * File : country.js 
 * 
 * This file contain the validation of edit country form
 * 
 * @author Anil Rapani
 */

$(document).ready(function(){
	
	var addCountryForm = $("#addCountry");
	
	addCountryForm.validate({
		
		rules:{
			name :{ required : true }
			
		},
		messages:{
			name :{ required : "This field is required" }
		}
	});


    
    
    
	var editCountryForm = $("#editCountry");
	
	editCountryForm.validate({
		
		rules:{
			name :{ required : true },
			
		},
		messages:{
			name :{ required : "This field is required" },
			
		}
	});
});