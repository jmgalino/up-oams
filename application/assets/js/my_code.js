$(document).ready(function()
{
	/* DATATABLE -- Initialize user table */
	$('#user_table').DataTable({
        "order": [[ 0, "asc" ]],
        "columnDefs": [{
        	"searchable": false,
        	"orderable": false,
        	"targets": "action"
        }]
    });
	/* DATATABLE -- Initialize message table */
	$('#message_table').DataTable({
        "order": [[ 2, "asc" ]],
        "dom": 'ftipr',
        "columnDefs": [{
        	"visible": false,
        	"targets": 2
        }]
    });

	/* DATATABLE -- Initialize faculty accom table */
	$('#accom_table').DataTable({
        "order": [[ 0, "desc" ]],
         "columns": [
		    null,
		    null,
		    null,
		    { "visible": false },
		    { "searchable": false, "orderable": false }
		]
    });
    
    var table = $("table.display").dataTable({
    	"paging":   false,
        "ordering": false,
        "info":     false,
    	"dom": '<"toolbar">rt',
    });
 
    $("#search").keyup( function () {
      // Filter on the column (the index) of this element
      table.fnFilterAll(this.value);
    } );
	
    /* DATATABLE -- Initialize group accom table */
	var accom_group_table = $('#accom_group_table').DataTable({
        "order": [[ 0, "desc" ]],
        "columns": [
		    { "visible": false },
		    null,
		    null,
		    null,
		    null,
		    { "visible": false },
		    { "searchable": false, "orderable": false }
		],
        // WALA KO KASABOT ANI
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last=null;
 
            api.column(0, {page:'current'}).data().each(function (group, i) {
                if (last !== group)
                {
                    $(rows).eq(i).before(
                        '<tr class="group"><td colspan="6">'+group+'</td></tr>'
                    );
                    last = group;
                }
            });
        }
    });
    // Order by the period
	$('#accom_group_table tbody').on('click', 'tr.group', function(){
		var currentOrder = accom_group_table.order()[0];
		if (currentOrder[0] === 0 && currentOrder[1] === 'asc')
		{
			accom_group_table.order([0, 'desc']).draw();
		}
		else
		{
			accom_group_table.order([0, 'asc']).draw();
		}
    });

    /* DATATABLE -- Initialize faculty ipcr table */
    $('#ipcr_table').DataTable({
        "order": [[ 0, "desc" ]],
        "columns": [
		    null,
		    null,
		    null,
		    { "visible": false },
		    { "searchable": false, "orderable": false }
		]
    });
    
    /* DATATABLE -- Initialize group ipcr table */
	var ipcr_group_table = $('#ipcr_group_table').DataTable({
        "order": [[ 0, "desc" ]],
        "columns": [
		    { "visible": false },
		    null,
		    null,
		    null,
		    null,
		    { "visible": false },
		    { "searchable": false, "orderable": false }
		],
        // WALA KO KASABOT ANI
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last=null;
 
            api.column(0, {page:'current'}).data().each(function (group, i) {
                if (last !== group)
                {
                    $(rows).eq(i).before(
                        '<tr class="group"><td colspan="6">'+group+'</td></tr>'
                    );
                    last = group;
                }
            });
        }
    });
 
    // Order by the period
    $('#ipcr_group_table tbody').on('click', 'tr.group', function(){
		var currentOrder = ipcr_group_table.order()[0];
		if (currentOrder[0] === 0 && currentOrder[1] === 'asc')
		{
			ipcr_group_table.order([0, 'desc']).draw();
		}
		else
		{
			ipcr_group_table.order([0, 'asc']).draw();
		}
    });

    /* DATATABLE -- Initialize faculty opcr table */
    $('#opcr_table').DataTable({
        "order": [[ 0, "desc" ]],
        "columns": [
		    null,
		    null,
		    null,
		    null,
		    { "visible": false },
		    { "searchable": false, "orderable": false }
		]
    });

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

	// date
	$('#birthdaypicker input').datepicker({
		format: "mm/dd/yyyy",
		// format: "MM dd, yyyy",
		todayHighlight: true,
		autoclose: true
	});
	$('#datepicker .input-daterange').datepicker({
		format: "d MM yyyy",
		todayHighlight: true
	});
	$('#monthpicker .input-daterange').datepicker({
		format: "MM yyyy",
	    viewMode: 1, 
	    minViewMode: 1,
	});
	$('#monthpicker input').datepicker({
		format: "MM yyyy",
	    viewMode: 1, 
	    minViewMode: 1,
		autoclose: true
	});
	
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

	// Tooltip for author field
	$('input#author').tooltip();
	$('.button-tip').tooltip();
	$("#photo").fileinput({
		previewFileType: "image",
		browseClass: "btn btn-primary",
		browseLabel: " Browse",
		browseIcon: '',//<i class="glyphicon glyphicon-picture"></i>
		showRemove: false,
		showUpload: false,
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

	$('td.editIndicator').editable('/oamsystem/index.php/faculty/opcr/edit/indicator',
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

	$("#fund_amount").number( true, 2 );
	$("#fund_up").number( true, 2 )
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

	$("#new_password").keyup(function()
	{
		var passwordLen = $("#new_password").val().length;

		if (passwordLen < 5)
	    {
	    	$("div.new_password").removeClass("has-success has-feedback").addClass("has-warning has-feedback");
	    	$("#checkIcon").removeClass("glyphicon glyphicon-ok form-control-feedback").addClass("glyphicon glyphicon-warning-sign form-control-feedback");
	    	$("#passwordCheck").html("Minimum of 5 characters.");
	    }
	    else
	    {
	    	$("div.new_password").removeClass("has-warning has-feedback").addClass("has-success has-feedback");
	    	$("#checkIcon").removeClass("glyphicon glyphicon-warning-sign form-control-feedback").addClass("glyphicon glyphicon-ok form-control-feedback");
	    	$("#passwordCheck").html("");	
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

	var birthdate = document.getElementById("birthday");
	if (!birthdate)
	{
		$('#birthdaypicker input').datepicker(
			'update',
			new Date(birthdate.getAttribute("value"))
		);
	}

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
