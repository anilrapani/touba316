/**
 * File : country.js 
 * 
 * This file contain the validation of edit country form
 * 
 * @author Anil Rapani
 */

$(document).ready(function(){
	
	var countryForm = $("#addCountry,#editCountry");
	
	countryForm.validate({
		
		rules:{
			name :{ required : true }
			
		},
		messages:{
			name :{ required : "This field is required" }
		}
	});


    
});