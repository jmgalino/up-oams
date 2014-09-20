$(document).ready(function()
{
	// type of user
	$("input[name=user_type]").click(function()
	{
		var type = $('input[name=user_type]:checked').val(); // try $
		if (type == "Admin")
			$(".faculty-info").hide();
		else
			$(".faculty-info").show();
	});

	// type of report
	$('#document_type').change(function(){
		var type = $(this).val();
		if (type == "new")
		{
			$(".new-document").show();
			$(".consolidated-document").hide();

			$(".n-document").attr("required", "");
			$(".c-document").removeAttr("required");
		}
		else if (type == "consolidated")
		{
			$(".new-document").hide();
			$(".consolidated-document").show();

			$(".n-document").removeAttr("required");
			$(".c-document").attr("required", "");
		}
    });
	
	// type of accom
	$("input[name=accom_type]").click(function()
	{
		var type = $('input[name=accom_type]:checked').val();
		$('.next_choice').attr('data-target','#modal_'+type);
	});

	//type of pub
	$("input[name=type]").click(function()
	{
		// try to get value from label
		var pub = $('input[name=type]:checked').val();
		if (pub == "Journal")
		{
			$(".pub_book").hide();
			$(".pub_bookk").hide();
			$(".pub_chapter").hide();
			$(".pub_journal").show();

			$(".pub_b").removeAttr("required");
			$(".pub_j").attr("required", "");
		}
		else
		{
			$(".pub_journal").hide();
			$(".pub_book").show();

			if (pub == "Book")
			{
				$(".pub_bookk").show();
				$(".pub_chapter").hide();
			}
			else
			{
				$(".pub_bookk").hide();
				$(".pub_chapter").show();
			}
			
			$(".pub_j").removeAttr("required");
			$("input[name=page]").removeAttr("placeholder");
			$(".pub_b").attr("required", "");
		}
	});

	$("a#deleteReport").click(function()
	{
		return confirm('Are you sure you want to delete this report?');
	});
	$("a#deleteAccom").click(function()
	{
		return confirm('Are you sure you want to remove this accomplishment?');
	});
	$("a#deleteForm").click(function()
	{
		return confirm('Are you sure you want to delete this form?');
	});
	$("a#deleteOutput").click(function()
	{
		return confirm('Are you sure you want to remove this?');
	});
	$("a#resetPassword").click(function()
	{
		return confirm('Are you sure you want to reset the password?');
	});
	$("a#deleteAccount").click(function()
	{
		return confirm('Are you sure you want to delete this account?');
	});

	// Success indicator style
	$("#style a").click(function()
	{
		var style = $(this).attr("href");
		if (style == "#style2")
		{
			$(".style_2").attr("required", "");
			$(".style_1").removeAttr("required");
			$(".style_1").val("");
		}
		else
		{
			$(".style_1").attr("required", "");
			$(".style_2").removeAttr("required");
			$(".style_2").val("");
		}
	});

	// not working properly
	$('td.editOutput').editable('/oamsystem/index.php/faculty/opcr/edit/output',
	{
		name		: 'output',
		id			: 'output_ID',
		type		: 'textarea',
		submit		: 'Save',
		event		: 'dblclick',
		onblur		: 'ignore',
		// style   	: 'width: '+($(this).width()-40),
		cssclass	: 'edit_output',
		tooltip		: 'Double click to edit',
     });

	// not working properly
	$('td.editOutputIndicator').editable('/oamsystem/index.php/faculty/opcr/edit/indicator',
	{
		name		: 'indicators',
		id			: 'output_ID',
		type		: 'textarea',
		submit		: 'Save',
		event		: 'dblclick',
		onblur		: 'ignore',
		// style   	: 'width: '+($(this).width()-40),
		cssclass	: 'edit_output',
		tooltip		: 'Double click to edit',
     });

	$('td.editTarget').editable('/oamsystem/index.php/faculty/ipcr/edit/target',
	{
		name		: 'target',
		id			: 'target_ID',
		type		: 'textarea',
		submit		: 'Save',
		event		: 'dblclick',
		onblur		: 'ignore',
		// style   	: 'width: '+($(this).width()-40),
		cssclass	: 'edit_output',
		tooltip		: 'Double click to edit',
     });

	$('td.editTargetIndicator').editable('/oamsystem/index.php/faculty/ipcr/edit/indicator',
	{
		name		: 'indicators',
		id			: 'target_ID',
		type		: 'textarea',
		submit		: 'Save',
		event		: 'dblclick',
		onblur		: 'ignore',
		// style   	: 'width: '+($(this).width()-40),
		cssclass	: 'edit_output',
		tooltip		: 'Double click to edit',
     });

	$('#category').change(function()
	{
		var categoryId = $(this).val();
		var len = document.getElementById("category").length;

		for (i = 1; i <= len; i++) { 
			if (i == categoryId)
				$('.change-output').find('[category="' + i + '"]').prop('disabled', false);
			else
				$('.change-output').find('[category="' + i + '"]').prop('disabled', true);
		}
    });

	$("#category_ID").change(function(){
		var ipcr_ID = $(this).attr("ipcr-id");
        var category_ID = $(this).val();
        // alert(ipcr_ID+' '+category_ID);
        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/category_targets",
            data: 'category_ID=' + category_ID + '&ipcr_ID=' + ipcr_ID,
		    dataType: "json",
            success:function(options){
                var newOptions = '';
				for (var i = 0; i < options.length; i++)
				{
					newOptions += '<option value="' + options[i].optionValue + '">' + options[i].optionText + '</option>';
				}
				$("#target_ID").html(newOptions);
            }
        });
    });

	$("#target_ID").change(function(){
        var target_ID = $(this).val();
        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/target_details",
            data: 'target_ID=' + target_ID,
		    dataType: "json",
            success:function(data){
            	$("#indicators").text(data['indicators']);
            	$("#actual_accom").text(data['actual_accom']);
            	$("#r_quantity").rating('update', data['r_quantity']);
            	$("#r_efficiency").rating('update', data['r_efficiency']);
            	$("#r_timeliness").rating('update', data['r_timeliness']);
            	$("#remarks").val(data['remarks']);
            }
        });
	});

	$("#newProfile").on("submit", function(event){
		//check employee code
	});

	$("#updateProfile").click(function(){
		var url = $(this).attr("url");
		var user_ID = $(this).attr("key");

		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/user_details",
			data: 'user_ID=' + user_ID,
			dataType: "json",
			success:function(data){
				$("#modalProfileLabel").text("Update Profile");
				$("#invalidMessage").parent().hide();
				$("#user-id").val(data['user_ID']);
				$("#empcode").val(data['empcode']);
				$("#fname").val(data['fname']);
				$("#mname").val(data['mname']);
				$("#lname").val(data['lname']);
				$("#datepicker .input-group.date").datepicker('setDate', data['birthday']).datepicker('fill');
				$("input[type='submit']").val("Save");
				$("#updateForm").attr("url", url);

				if (data['fcode'])
				{
					$("#facultyType").prop("checked", true);
					$(".faculty-info").show();
					$("#fcode").val(data['fcode']);
					$("#rank").val(data['rank']);
					$("#program-id").val(data['program_ID']);
					$("#position").val(data['position']);
				}
				else
				{
					$("#adminType").prop("checked", true);
					// $("#user_type").val("Admin");
				}
			}
		});
	});

	$("#collegeForm").on("submit", function(event){
		event.preventDefault();

		if ($("input[type='submit']").val() == "Add")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/new_college";
		else if ($("input[type='submit']").val() == "Save")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/edit_college";


		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#collegeForm").serialize(),
            success: function(unique){
            	if (unique)
            	{
            		$("#collegeForm").attr("action", $("#collegeForm").attr("url")).unbind("submit").trigger("submit");
            	}
            	else
            	{
					$("#invalidMessage").text("This is not a unique college.").parent().show();
				}
            }
        });
	});

	$("#newCollege").click(function(){
		var url = $(this).attr("url");

		$("#myModalLabel").text("New College");
		$("#invalidMessage").parent().hide();
		$("#college-id, #college-college, #college-short, #college-dean").val("");
        $("input[type='submit']").val("Add");
        $("#collegeForm").attr("url", url);
	});

	$("a#updateCollege").click(function(){
		var url = $(this).attr("url");
		var college_ID = $(this).attr("key");

		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/college_details",
			data: 'college_ID=' + college_ID,
			dataType: "json",
			success:function(data){
				$("#myModalLabel").text("Update College");
				$("#invalidMessage").parent().hide();
				$("#college-id").val(data['college_ID']);
				$("#college-college").val(data['college']);
				$("#college-short").val(data['short']);
				$("#college-dean").val(data['user_ID']);
				$("input[type='submit']").val("Save");
				$("#collegeForm").attr("url", url);
			}
		});
    });

	$("#departmentForm").on("submit", function(event){
		event.preventDefault();

		if ($("input[type='submit']").val() == "Add")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/new_department";
		else if ($("input[type='submit']").val() == "Save")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/edit_department";

		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#departmentForm").serialize(),
            success: function(unique){
            	if (unique)
            	{
            		$("#departmentForm").attr("action", $("#departmentForm").attr("url")).unbind("submit").trigger("submit");
            	}
            	else
            	{
					$("#invalidMessage").text("This is not a unique department.").parent().show();
				}
            }
        });
	});

	$("#newDepartment").click(function(){
		var url = $(this).attr("url");

		$("#myModalLabel").text("New Department");
		$("#invalidMessage").parent().hide();
		$("#department-college, #department-chair, #department-id, #department-department, #department-short").val("");
        $("input[type='submit']").val("Add");
        $("#departmentForm").attr("url", url);
	});

	$("a#updateDepartment").click(function(){
		var url = $(this).attr("url");
		var department_ID = $(this).attr("key");

        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/department_details",
            data: 'department_ID=' + department_ID,
		    dataType: "json",
            success:function(data){
				$("#myModalLabel").text("Update Department");
				$("#invalidMessage").parent().hide();
                $("#department-id").val(data['department_ID']);
                $("#department-college").val(data['college_ID']);
                $("#department-department").val(data['department']);
                $("#department-short").val(data['short']);
                $("#department-chair").val(data['user_ID']);
		        $("input[type='submit']").val("Save");
		        $("#departmentForm").attr("url", url);
            }
        });
    });

	$("#programForm").on("submit", function(event){
		event.preventDefault();

		if ($("input[type='submit']").val() == "Add")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/new_program";
		else if ($("input[type='submit']").val() == "Save")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/edit_program";


		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#programForm").serialize(),
            success: function(unique){
            	if (unique)
            	{
            		$("#programForm").attr("action", $("#programForm").attr("url")).unbind("submit").trigger("submit");
            	}
            	else
            	{
					$("#invalidMessage").text("This is not a unique program.").parent().show();
				}
            }
        });
	});

	$("#newProgram").click(function(){
		var url = $(this).attr("url");

		$("#myModalLabel").text("New Degree Program");
		$("#invalidMessage").parent().hide();
		$("#program-college, #program-id, #program-program, #program-program-short, #program-short, #datepicker .input-group.date, #program-type").val("");
		$("#program-department").html("<option value=\"\">Select</option>").prop("disabled", true);
		$("#program-vision, #program-goals").text("");
        $("input[type='submit']").val("Add");
        $("#programForm").attr("url", url);
	});

	$("#program-college").change(function(){
		var college_ID = $(this).val();
        
        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/college_departments",
            data: 'college_ID=' + college_ID,
		    dataType: "json",
            success:function(options){
            	var newOptions = '';
				for (var i = 0; i < options.length; i++)
				{
					newOptions += '<option value="' + options[i].optionValue + '">' + options[i].optionText + '</option>';
				}
				$("#program-department").html(newOptions).prop('disabled', false);
            }
        });
	});

    $('#fund_external').keyup(function()
    {
    	var external = $(this).val();
    	
    	if (external)
    	{
    		$("#fund_amount").attr("required", "");
    		$("#fund_amount").removeAttr("placeholder");
    		$("#fund_up").removeAttr("required");
    		$("#fund_up").attr("placeholder", "(Optional)")
    	}
    	else
    	{
    		$("#fund_amount").attr("placeholder", "(Optional)");
    		$("#fund_amount").removeAttr("required");
    		$("#fund_up").attr("required", "");
    		$("#fund_up").removeAttr("placeholder");
    	}
    });
    $('#fund_amount').keyup(function()
    {
    	var external = $(this).val();
    	
    	if (external)
    	{
    		$("#fund_external").attr("required", "");
    		$("#fund_external").removeAttr("placeholder");
    		$("#fund_up").removeAttr("required");
    		$("#fund_up").attr("placeholder", "(Optional)")
    	}
    	else
    	{
    		$("#fund_external").attr("placeholder", "(Optional)");
    		$("#fund_external").removeAttr("required");
    		$("#fund_up").attr("required", "");
    		$("#fund_up").removeAttr("placeholder");
    	}
    });

	// Character counter for message
	$('#message').keyup(function () {
		var max = 255;
		var len = $(this).val().length;
		var remaining = max - len;

		if (len == max)
		{
			$('#charRemaining').html('You have reached the limit.');
			$('input[type="submit"]').prop('disabled', false);
		}
		else if (len > max)
		{
			$('#charRemaining').html('You have reached the limit (<strong>' + remaining + '</strong>).');
			$('input[type="submit"]').prop('disabled', true);
		}
		else
		{
			$('#charRemaining').html('You have <strong>' + remaining + '</strong> characters left');
			$('button[type="submit"]').prop('disabled', false);
		}

		if(remaining <= 10)
			$("#charRemaining").css("color","red");
		else
			$("#charRemaining").css("color","black");
    });

	$("#current_password").keyup(function(){
		var password = $(this).val();
        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/abc",
            data: 'password=' + password,
            success:function(correct){
                if(correct)
                {
			    	// $("div.current_password").removeClass("has-error has-feedback");
			    	// $(this).setCustomValidity("");
			    	$("#checkIcon").removeClass("glyphicon glyphicon-remove form-control-feedback");
			    	$("#passwordCheck").html("");
			    }
			    else
			    {
			    	// $("div.current_password")addClass("has-error has-feedback");
			    	// $(this).setCustomValidity("Invalid field.")
			    	$("#checkIcon").addClass("glyphicon glyphicon-remove form-control-feedback");
			    	$("#passwordCheck").html("Wrong password.");
			    }
            }
        });
	});

	$("#new_password").keyup(function()
	{
		var passwordLen = $("#new_password").val().length;

		if (passwordLen < 5)
	    {
	    	$("div.new_password").removeClass("has-success has-feedback").addClass("has-warning has-feedback");
	    	$("#newCheckIcon").removeClass("glyphicon glyphicon-ok form-control-feedback").addClass("glyphicon glyphicon-warning-sign form-control-feedback");
	    	$("#newPasswordCheck").html("Minimum of 5 characters.");
	    }
	    else
	    {
	    	$("div.new_password").removeClass("has-warning has-feedback").addClass("has-success has-feedback");
	    	$("#newCheckIcon").removeClass("glyphicon glyphicon-warning-sign form-control-feedback").addClass("glyphicon glyphicon-ok form-control-feedback");
	    	$("#newPasswordCheck").html("");	
	    }
	});

    $("#confirm_password").keyup(function()
    {
	    var password = $("#new_password").val();
	    var confirmPassword = $("#confirm_password").val();

	    if (password != confirmPassword)
	    {
	    	$("div.confirm_password").removeClass("has-success has-feedback").addClass("has-error has-feedback");
	    	$("#matchIcon").removeClass("glyphicon glyphicon-ok form-control-feedback").addClass("glyphicon glyphicon-remove form-control-feedback");
	    	$("#passwordMatch").html("Passwords do not match!");
	    }
	    else
	    {
	    	$("div.confirm_password").removeClass("has-error has-feedback").addClass("has-success has-feedback");
	    	$("#matchIcon").removeClass("glyphicon glyphicon-remove form-control-feedback").addClass("glyphicon glyphicon-ok form-control-feedback");
	    	$("#passwordMatch").html("Passwords match.");	
	    }
    });

    var categoryCount = 1;

	$('#addCategory').click(function()  //on add input button click
	{
		categoryCount++;
		$('#inputWrapper').append(
			'<div class="form-group">'+
				'<div class="col-md-10 col-md-offset-1">'+
					'<nobr>'+
						'<input type="text" class="form-control" name="new_' + categoryCount + '"style="display:inline" required>'+
						'<a href="#" class="btn removeCategory" role="button"><span class="glyphicon glyphicon-remove "></span></a>'+
					'</nobr>'+
				'</div>'+
			'</div>');

		return false;
	});

	$("body").on("click", ".removeCategory", function() //user click on remove text
	{
		$(this).parent().parent().parent().remove(); //remove input field
	});
	
	var maxMatAttachments = 5;
    var matAttachmentWrapper = $("#matAttachmentWrapper"); //Input boxes wrapper ID
    var matAttachments = matAttachmentWrapper.length;
	var matAttachmentCount = 1; //to keep track of text box added
	
	$('#addMatAttachment').click(function(e)  //on add input button click
	{
		if (matAttachments <= maxMatAttachments)
		{
			matAttachmentCount++; //text box added increment
			$('#matAttachmentWrapper').append(
				'<div>' +
				'<input type="file" class="multi" name="attachment[]" accept="image/*" style="display:inline" required>' +
				'<a href="#" class="btn removeMatAttachment" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>' +
				'</div>');
			matAttachments++;
		}
		return false;
	});
	$("body").on("click", ".removeMatAttachment", function() //user click on remove text
	{
		$(this).parent().remove(); //remove input field
		matAttachments--;
		return false;
	});

	var maxAwdAttachments = 5;
    var awdAttachmentWrapper = $("#awdAttachmentWrapper"); //Input boxes wrapper ID
    var awdAttachments = awdAttachmentWrapper.length;
	var awdAttachmentCount = 1; //to keep track of text box added
	
	$('#addAwdAttachment').click(function(e)  //on add input button click
	{
		if (awdAttachments <= maxAwdAttachments)
		{
			awdAttachmentCount++; //text box added increment
			$('#awdAttachmentWrapper').append(
				'<div>' +
				'<input type="file" class="multi" name="attachment[]" accept="image/*" style="display:inline" required>' +
				'<a href="#" class="btn removeAwdAttachment" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>' +
				'</div>');
			awdAttachments++;
		}
		return false;
	});
	$("body").on("click", ".removeAwdAttachment", function() //user click on remove text
	{
		$(this).parent().remove(); //remove input field
		awdAttachments--;
		return false;
	});
	
	var maxCtvAttachments = 5;
    var ctvAttachmentWrapper = $("#ctvAttachmentWrapper"); //Input boxes wrapper ID
    var ctvAttachments = ctvAttachmentWrapper.length;
	var ctvAttachmentCount = 1; //to keep track of text box added
	
	$('#addCtvAttachment').click(function(e)  //on add input button click
	{
		if (ctvAttachments <= maxCtvAttachments)
		{
			ctvAttachmentCount++; //text box added increment
			$('#ctvAttachmentWrapper').append(
				'<div>' +
				'<input type="file" class="multi" name="attachment[]" accept="image/*" style="display:inline" required>' +
				'<a href="#" class="btn removeCtvAttachment" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>' +
				'</div>');
			ctvAttachments++;
		}
		return false;
	});
	$("body").on("click", ".removeCtvAttachment", function() //user click on remove text
	{
		$(this).parent().remove(); //remove input field
		ctvAttachments--;
		return false;
	});
	
	var maxOthAttachments = 5;
    var othAttachmentWrapper = $("#othAttachmentWrapper"); //Input boxes wrapper ID
    var othAttachments = othAttachmentWrapper.length;
	var othAttachmentCount = 1; //to keep track of text box added
	
	$('#addOthAttachment').click(function(e)  //on add input button click
	{
		if (othAttachments <= maxOthAttachments)
		{
			othAttachmentCount++; //text box added increment
			$('#othAttachmentWrapper').append(
				'<div>' +
				'<input type="file" class="multi" name="attachment[]" accept="image/*" style="display:inline" required>' +
				'<a href="#" class="btn removeOthAttachment" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>' +
				'</div>');
			othAttachments++;
		}
		return false;
	});
	$("body").on("click", ".removeOthAttachment", function() //user click on remove text
	{
		$(this).parent().remove(); //remove input field
		othAttachments--;
		return false;
	});
	
	var maxPprAttachments = 5;
    var pprAttachmentWrapper = $("#pprAttachmentWrapper"); //Input boxes wrapper ID
    var pprAttachments = pprAttachmentWrapper.length;
	var pprAttachmentCount = 1; //to keep track of text box added
	
	$('#addPprAttachment').click(function(e)  //on add input button click
	{
		if (pprAttachments <= maxPprAttachments)
		{
			pprAttachmentCount++; //text box added increment
			$('#pprAttachmentWrapper').append(
				'<div>' +
				'<input type="file" class="multi" name="attachment[]" accept="image/*" style="display:inline" required>' +
				'<a href="#" class="btn removePprAttachment" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>' +
				'</div>');
			pprAttachments++;
		}
		return false;
	});
	$("body").on("click", ".removePprAttachment", function() //user click on remove text
	{
		$(this).parent().remove(); //remove input field
		pprAttachments--;
		return false;
	});
	
	var maxParAttachments = 5;
    var parAttachmentWrapper = $("#parAttachmentWrapper"); //Input boxes wrapper ID
    var parAttachments = parAttachmentWrapper.length;
	var parAttachmentCount = 1; //to keep track of text box added
	
	$('#addParAttachment').click(function(e)  //on add input button click
	{
		if (parAttachments <= maxParAttachments)
		{
			parAttachmentCount++; //text box added increment
			$('#parAttachmentWrapper').append(
				'<div>' +
				'<input type="file" class="multi" name="attachment[]" accept="image/*" style="display:inline" required>' +
				'<a href="#" class="btn removeParAttachment" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>' +
				'</div>');
			parAttachments++;
		}
		return false;
	});
	$("body").on("click", ".removeParAttachment", function() //user click on remove text
	{
		$(this).parent().remove(); //remove input field
		parAttachments--;
		return false;
	});
	
	var maxRchAttachments = 5;
    var rchAttachmentWrapper = $("#rchAttachmentWrapper"); //Input boxes wrapper ID
    var rchAttachments = rchAttachmentWrapper.length;
	var rchAttachmentCount = 1; //to keep track of text box added
	
	$('#addRchAttachment').click(function(e)  //on add input button click
	{
		if (rchAttachments <= maxRchAttachments)
		{
			rchAttachmentCount++; //text box added increment
			$('#rchAttachmentWrapper').append(
				'<div>' +
				'<input type="file" class="multi" name="attachment[]" accept="image/*" style="display:inline" required>' +
				'<a href="#" class="btn removeRchAttachment" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>' +
				'</div>');
			rchAttachments++;
		}
		return false;
	});
	$("body").on("click", ".removeRchAttachment", function() //user click on remove text
	{
		$(this).parent().remove(); //remove input field
		rchAttachments--;
		return false;
	});

});
	// // Refine - filter, sort
	// $("#refine_list").click(function()
	// {
	// 	$("#refine_form").toggle();
	// 	$("#display_table").toggleClass("col-md-9");		
	// });

	// // No auto close
	// $('#user_filter').collapse({
	//   toggle: false
	// })
