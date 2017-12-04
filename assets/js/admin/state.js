/**
 * File : state.js 
 * 
 * This file contain the validation of edit state form
 * 
 * @author Anil Rapani
 */

$(document).ready(function(){
	
	var addStateForm = $("#addState");
	
	addStateForm.validate({
		
		rules:{
			name :{ required : true },
                        discipline_id :{ required : true, selected : true}
			
		},
		messages:{
			name :{ required : "This field is required" },
                        discipline_id : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});


    
    
    
	var editStateForm = $("#editState");
	
	editStateForm.validate({
		
		rules:{
			name :{ required : true },
                        discipline_id :{ required : true, selected : true}
		},
		messages:{
			name :{ required : "This field is required" },
                        discipline_id : { required : "This field is required", selected : "Please select atleast one option" }
		}
	});
});