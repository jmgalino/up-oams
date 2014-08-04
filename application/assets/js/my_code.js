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
        }]
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
	var birthdate = document.getElementById("birthday");
	if (!birthdate)
	{
		$('#datepickerer input').datepicker(
			'update',
			new Date(birthdate.getAttribute("value"))
		);
	}
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
		todayHighlight: true
	});
	
	$("input[name=accom_type]").click(function()
	{alert('hey');
		// var type = jQuery('input[name=accom_type]:checked').val();
		// $('.next_choice').attr('data-target','#modal_'+type);
	});

	//type of pub
	function myFunc()
	{alert('hey');
		// var pub = jQuery('input[name=pub]:checked').val();
		// if (pub == "book")
		// {
		// 	$(".pub_book").show();
		// 	$(".pub_chapter").hide();
		// 	$(".pub_journal").hide();

		// 	$(".pub_b").attr("required", "");
		// 	$(".pub_c").removeAttr("required");
		// 	$(".pub_j").removeAttr("required");
		// }
		// else if (pub == "chapter")
		// {
		// 	$(".pub_chapter").show();
		// 	$(".pub_journal").hide();

		// 	$(".pub_b").removeAttr("required");
		// 	$(".pub_c").attr("required", "");
		// 	$(".pub_j").removeAttr("required");
		// }
		// else
		// {
		// 	$(".pub_book").hide();
		// 	$(".pub_chapter").hide();
		// 	$(".pub_journal").show();

		// 	$(".pub_b").removeAttr("required");
		// 	$(".pub_c").removeAttr("required");
		// 	$(".pub_j").attr("required", "");
		// }
	}

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

	// type of user
	$("input[name=user_type]").click(function()
	{
		var type = jQuery('input[name=user_type]:checked').val();
		if (type == "Admin")
			$(".faculty-info").hide();
		else
			$(".faculty-info").show();
	});
});

	// Rest Password Button
	// $( "#reset_password" ).click(function() {
	// 	location.reload();
	// });

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
	// $('#user_sort').collapse({
	//   toggle: false
	// })

	// type of user
	// $("input[name=user_type]").click(function()
	// {
	// 	var type = jQuery('input[name=user_type]:checked').val();
	// 	if (type == "Admin")
	// 		$(".faculty-info").hide();
	// 	else
	// 		$(".faculty-info").show();
	// });
