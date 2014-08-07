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
        	"targets": 3
        }]
    });
	$('#accom_table').DataTable({
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
        "order": [[ 3, "asc" ]],
        "columnDefs": [{
        	"searchable": false,
        	"orderable": false,
        	"targets": 6
        }]
    });
    $('#opcr_table').DataTable({
        "order": [[ 0, "asc" ]],
        "columnDefs": [{
        	"searchable": false,
        	"orderable": false,
        	"targets": 5
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
		format: "MM dd, yyyy",
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
	$("a#deleteOutput").click(function()
	{
		return confirm('Are you sure you want to remove this?');
	});

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
	// });

	var birthdate = document.getElementById("birthday");
	if (birthdate)
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
