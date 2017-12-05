/**
 * File : city.js 
 * 
 * This file contains the validation of edit city form
 * 
 * @author Anil Rapani
 */

$(document).ready(function(){
	
	var cityForm = $("#addCity,#editCity");
	
	cityForm.validate({
		
		rules:{
			name :{ required : true },
                        country_id :{ required : true, selected : true}
			
		},
		messages:{
			name :{ required : "This field is required" },
                        country_id : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});

});