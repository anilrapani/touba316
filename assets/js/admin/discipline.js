/**
 * File : discipline.js 
 * 
 * This file contain the validation of edit discipline form
 * 
 * @author Anil Rapani
 */

$(document).ready(function(){
	
	var addDisciplineForm = $("#addDiscipline");
	
	addDisciplineForm.validate({
		
		rules:{
			name :{ required : true }
			
		},
		messages:{
			name :{ required : "This field is required" }
		}
	});


    
    
    
	var editDisciplineForm = $("#editDiscipline");
	
	editDisciplineForm.validate({
		
		rules:{
			name :{ required : true },
			
		},
		messages:{
			name :{ required : "This field is required" },
			
		}
	});
});