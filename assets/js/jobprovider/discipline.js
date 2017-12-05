/**
 * File : discipline.js 
 * 
 * This file contain the validation of edit discipline form
 * 
 * @author Anil Rapani
 */

$(document).ready(function(){
	
	var disciplineForm = $("#addDiscipline,#editDiscipline");
	
	disciplineForm.validate({
		
		rules:{
			name :{ required : true }
			
		},
		messages:{
			name :{ required : "This field is required" }
		}
	});


    
    
});