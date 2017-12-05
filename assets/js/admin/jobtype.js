/* 
 * Copyright (C) 2017 Kastech
 * @project : touba316
 * @author : Anil Rapani
 * @email : arapani@kastechindia.com
 * @since : Dec 5, 2017
 * @version : 
 */


/**
 * File : country.js 
 * 
 * This file contain the validation of edit country form
 * 
 * @author Anil Rapani
 */

$(document).ready(function(){
	
	var jobtypeForm = $("#addJobtype,#editJobtype");
	
	jobtypeForm.validate({
		
		rules:{
			name :{ required : true }
			
		},
		messages:{
			name :{ required : "This field is required" }
		}
	});


    
});