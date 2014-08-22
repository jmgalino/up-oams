$(document).ready(function()
{
	// Initialise DataTable
	// var table = $('#user_table').DataTable();
	// new $.fn.dataTable.FixedHeader(table);
	$('#user_table').DataTable({
        "order": [[ 0, "asc" ]],
        "columnDefs": [{
        	"searchable": false,
        	"orderable": false,
        	"targets": "action"
        }]
    });
	$('#message_table').DataTable({
        "order": [[ 2, "asc" ]],
        "dom": 'ftipr',
        "columnDefs": [{
        	"visible": false,
        	"targets": 2
        }]
    });

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

    $('#opcr_table').DataTable({
        "order": [[ 0, "asc" ]],
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
		var type = jQuery('input[name=user_type]:checked').val();
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

	$("input[name=year]").keyup(function(){
	    $(this).val(this.value.match(/[0-9]*/));
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
		var type = jQuery('input[name=accom_type]:checked').val();
		$('.next_choice').attr('data-target','#modal_'+type);
	});

	//type of pub
	$("input[name=type]").click(function()
	{
		var pub = jQuery('input[name=type]:checked').val();
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
	$('#author').tooltip();
	$('.button-tip').tooltip();
	$("#photo").fileinput({
		previewFileType: "image",
		browseClass: "btn btn-primary",
		browseLabel: " Browse",
		browseIcon: '',//<i class="glyphicon glyphicon-picture"></i>
		showRemove: false,
		showUpload: false,
	});
	// $('a#editAccom').popover();
	// $('body').on('click', function (e) {
	//     //only buttons
	//     if ($(e.target).data('toggle') !== 'popover'
	//         && $(e.target).parents('.popover.in').length === 0) { 
	//         $('[data-toggle="popover"]').popover('hide');
	//     }
	// });

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
			$('input[type="submit"]').prop('disabled', false);
		}

		if(remaining <= 10)
			$("#charRemaining").css("color","red");
		else
			$("#charRemaining").css("color","black");
    });

	// var last_ID = $("#category").val();//attr('name')
	$('#addCategory').click(function(e)  //on add input button click
	{
		var last_ID = $("input[id='category']:last-child").val();//attr('name')
		alert('Coming soon!');
		// $('#inputWrapper').append(
		// 	'<div class="form-group">'+
		// 		'<div class="col-md-10 col-md-offset-1">'+
		// 			'<nobr>'+
		// 				'<input type="text" class="form-control" style="display:inline" required>'+
		// 				'<a href="#" class="btn removeCategory" role="button"><span class="glyphicon glyphicon-remove "></span></a>'+
		// 			'</nobr>'+
		// 		'</div>'+
		// 	'</div>');
	});

	$("body").on("click", ".removeCategory", function(e) //user click on remove text
	{
		$(this).parent().parent().parent().remove(); //remove input field
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
