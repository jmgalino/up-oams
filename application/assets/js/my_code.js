$(document).ready(function()
{
	// Initialise DataTable
	// var table = $('#user_table').DataTable();
	// new $.fn.dataTable.FixedHeader(table);
	$('#user_table').DataTable({
		scrollY: 500,
		scrollCollapse: false,
		"pageLength": 25,
        "order": [[ 0, "asc" ]],
        "columnDefs": [{
        	"searchable": false,
        	"orderable": false,
        	"targets": 3
        }]
    });
	$('#accom_table').DataTable({
		scrollY: 500,
		scrollCollapse: false,
		"pageLength": 25,
        "order": [[ 0, "asc" ]],
        "columnDefs": [{
        	"searchable": false,
        	"orderable": false,
        	"targets": 3
        }],
        // "dom": '<"toolbar">frtip'
   //      "sDom": 'T<"clear">lfrtip',
   //      "oTableTools": {
   //          "aButtons": [{
   //              "sExtends":    "text",
   //              "sButtonText": "Hello world"
			// }]
   //      }
    });
    // $("div.toolbar").html('<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_accom">New Report</button>');
	$('#accom_group_table').DataTable({
		// scrollY: 500,
		// scrollCollapse: false,
		"pageLength": 10,
        "order": [[ 3, "asc" ]],
        "columnDefs": [{
        	"searchable": false,
        	"orderable": false,
        	"targets": 6
        }]
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
	$('#report_type').change(function(){
		var type = $(this).val();
		if (type == "new")
		{
			$(".new-report").show();
			$(".consolidated-report").hide();

			$(".n-report").attr("required", "");
			$(".c-report").removeAttr("required");
		}
		else if (type == "consolidated")
		{
			$(".new-report").hide();
			$(".consolidated-report").show();

			$(".n-report").removeAttr("required");
			$(".c-report").attr("required", "");
		}
    });

	$("input[name=year]").keyup(function(){
	    $(this).val(this.value.match(/[0-9]*/));
	});

	// date
	$('#datepickerer input').datepicker({
		format: "MM dd, yyyy",
		todayHighlight: true,
		autoclose: true
	});
	$('#monthpicker input').datepicker({
		format: "MM yyyy",
	    viewMode: "months", 
	    minViewMode: "months",
		autoclose: true
	});
	$('.input-daterange').datepicker({
		format: "d MM yyyy",
		todayHighlight: true
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
	$('a#editAccom').popover();
	$('body').on('click', function (e) {
	    //only buttons
	    if ($(e.target).data('toggle') !== 'popover'
	        && $(e.target).parents('.popover.in').length === 0) { 
	        $('[data-toggle="popover"]').popover('hide');
	    }
	});
	$("a#deleteAccom").click(function()
	{
		return confirm('Are you sure you want to remove this accomplishment?');
	});

	//reject reason
	$("input[name=status]").click(function()
	{
	// 	var status = jQuery('input[name=status]:checked').val();
	// 	if (status == "Approved")
	// 	{
	// 		$(".reject-remarks").hide();
	// 		$(".reject-comment").hide();
	// 	}
	// 	else
	// 	{
	// 		$(".reject-remarks").show();
	// 		$(".reject-comment").show();
	// 	}
	// });

	// change category+outputs
	// $('#category').ready(function()
	// {});

	// Modify Categories
	// $("input[name=category]").click(function ()
	// {
	// 	$(this).hide();
	// 	var change = $(this).val();
	// 	if ($(this).prop('checked') === true)
	// 	{}
	// 	else
	// 	{
	// 	    $('#mytextfield').hide();
	// 	    $('#mynumberfield').hide();
	// 	    $('input[name="mytextfield"]').prop('required',false);
	// 	    $('input[name="mynumberfield"]').prop('required',false);        
	// 	}
	});

	var birthdate = document.getElementById("birthday");
	if (!birthdate)
	{
		$('#datepickerer input').datepicker(
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
