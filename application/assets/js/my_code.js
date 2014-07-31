$(document).ready(function()
{

	// Filter users
	$("#filter").click(function()
	{
		$("#filter_form").toggle();
		$("#display_table").toggleClass("col-md-9");		
	});

	// type of user
	$("input[name=user_type]").click(function()
	{
		var type = jQuery('input[name=user_type]:checked').val();
		if (type == "Admin")
		{
			$(".faculty-info").hide();
		}
		else
		{
			$(".faculty-info").show();
		}
	});

	// type of report
	$('#report_type').change(function()
	{
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
	
	// date
	$('#monthpicker input').datepicker({
		format: "MM yyyy",
	    viewMode: "months", 
	    minViewMode: "months",
		autoclose: true
	});
	$('.input-daterange').datepicker({
		todayHighlight: true
	});


	//type of accomplishment
	$("input[name=choice]").click(function()
	{
		$(".next_choice").attr("data-target","#modal_"+jQuery('input[name=choice]:checked').val());
		$(".next_choice").attr("data-dismiss", "modal");
	});

	//type of pub
	$("input[name=pub]").click(function()
	{
		var pub = jQuery('input[name=pub]:checked').val();
		if (pub == "book")
		{
			$(".pub_book").show();
			$(".pub_chapter").hide();
			$(".pub_journal").hide();

			$(".pub_b").attr("required", "");
			$(".pub_c").removeAttr("required");
			$(".pub_j").removeAttr("required");
		}
		else if (pub == "chapter")
		{
			$(".pub_book").hide();
			$(".pub_chapter").show();
			$(".pub_journal").hide();

			$(".pub_b").removeAttr("required");
			$(".pub_c").attr("required", "");
			$(".pub_j").removeAttr("required");
		}
		else
		{
			$(".pub_book").hide();
			$(".pub_chapter").hide();
			$(".pub_journal").show();

			$(".pub_b").removeAttr("required");
			$(".pub_c").removeAttr("required");
			$(".pub_j").attr("required", "");
		}
	});

	// type of form
	$("input[name=form]").click(function()
	{
		var form = jQuery('input[name=form]:checked').val();
		if (form == "new")
		{
			$(".new-form").show();
			$(".consolidated-form").hide();

			$(".n-form").attr("required", "");
			$(".c-form").removeAttr("required");
		}
		else if (form == "consolidated")
		{
			$(".new-form").hide();
			$(".consolidated-form").show();

			$(".n-form").removeAttr("required");
			$(".c-form").attr("required", "");
		}
	});

	//reject reason
	$("input[name=status]").click(function()
	{
		var status = jQuery('input[name=status]:checked').val();
		if (status == "Approved")
		{
			$(".reject-remarks").hide();
			$(".reject-comment").hide();
		}
		else
		{
			$(".reject-remarks").show();
			$(".reject-comment").show();
		}
	});

	// change category+outputs
	$('#category').ready(function()
	{});

	// Modify Categories
	$("input[name=category]").click(function ()
	{
		$(this).hide();
		var change = $(this).val();
		if ($(this).prop('checked') === true)
		{}
		else
		{
		    $('#mytextfield').hide();
		    $('#mynumberfield').hide();
		    $('input[name="mytextfield"]').prop('required',false);
		    $('input[name="mynumberfield"]').prop('required',false);        
		}
	});

});
