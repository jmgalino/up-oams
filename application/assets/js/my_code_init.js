/* DATATABLE -- Show child rows for program table */
function programDetails (d) {
    // `d` is the original data object for the row
    return '<table class="padded" style="font-size: 100%; margin-left:50px;">'+
        '<tr>'+
            '<td>Department:</td>'+
            '<td>'+d.department+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Complete Name:</td>'+
            '<td>'+d.program+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Initials:</td>'+
            '<td>'+d.short+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Data Instituted:</td>'+
            '<td>'+d.date_instituted+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Vision:</td>'+
            '<td>'+d.vision+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Goals:</td>'+
            '<td>'+d.goals+'</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready(function () {

	/* ==================================== *
    *                                       *
    *               DATATABLE               *
    *           Initialize tables           *
    *                                       *
    * ===================================== *
    *                                       *
    *   1. User Table (Admin)               *
    *   2. College Table (Admin)            *
    *   3. Department Table (Admin)         *
    *   4. Program Table (Admin)            *
    *   5. Announcement Table (Admin)       *
    *   6. Message Table (Admin)            *
    *   7. Education Table                  *
    *   8. Accomplishment Table (Faculty)   *
    *   9. Accomplishment Group Table       *
    *       (Department/College)            *
    *   10. IPCR Table (Faculty)            *
    *   11. IPCR Group Table                *
    *       (Department/College)            *
    *   12. OPCR Table (Faculty-Chair)      *
    *   13. OPCR Group Table (College)      *
    *                                       *
    * * * * * * * * * * * * * * * * * * * * */
    
	/* 1. User Table */
    $('#user_table').DataTable({
        "columnDefs": [{
        	"searchable": false,
        	"orderable": false,
        	"targets": "action"
        }],
        // Order table by employee code (column 0), ascending
        "order": [[ 0, "asc" ]]
    });

    /* 2. College Table */
    $('#college_table').DataTable({
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": "action"
        }],
        // Order table by college (column 0), ascending
        "order": [[ 0, "asc" ]]
    });

    /* 3. Department Table */
    var department_table = $('#department_table').DataTable({
        "columns": [
		    // College column is searchable but hidden; used as group header
            { "visible": false },
		    null,
		    null,
		    null,
		    // Action column is neither searchable nor orderable
            { "searchable": false, "orderable": false }
		],
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last = null;
 
            // Group department table by college (column 0)
            api.column(0, {page:'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="5">'+group+'</td></tr>');
                    last = group;
                }
            });
        },
        // Order table by college (column 0), ascending
        "order": [[ 0, "asc" ]]
    });
    // Add event listener for ordering departments by college
	$('#department_table tbody').on('click', 'tr.group', function () {
		var currentOrder = department_table.order()[0];

		if (currentOrder[0] === 0 && currentOrder[1] === 'asc')
		  department_table.order([0, 'desc']).draw();
		else
		  department_table.order([0, 'asc']).draw();
    });

    /* 4. Program Table */
    var ajaxUrl = $("#program_table").attr("ajax-url");
    var program_table = $('#program_table').DataTable({
        "ajax": ajaxUrl,
        "columns": [
            {
                "class":			'details-control',
                "data":				'',
                "defaultContent":	'',
                "orderable":		false
            },
            { 
            	"data":		"college",
            	"visible": 	false
			},
            { "data": "program_short" },
            { "data": "short" },
            { "data": "type" },
            { 
            	"data": 		"update",
	        	"orderable":	false,
	        	"searchable":	false
	        },
            { 
            	"data":		"department",
            	"visible": 	false
			},
            { 
            	"data":		"program",
            	"visible": 	false
			},
            { 
            	"data":		"date_instituted",
            	"visible": 	false
			},
            { 
            	"data":		"vision",
            	"visible": 	false
			},
            { 
            	"data":		"goals",
            	"visible": 	false
			}
        ],
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last = null;
            
            // Group program table by college (column 1)
            api.column(1, {page:'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="5">'+group+'</td></tr>');
                    last = group;
                }
            });
        },
        // Order table by college (column 1), ascending
        "order": [[1, 'asc']]
    });
    // Add event listener for ordering programs by college
	$('#program_table tbody').on('click', 'tr.group', function () {
		var currentOrder = program_table.order()[0];

		if (currentOrder[0] === 1 && currentOrder[1] === 'asc')
    		program_table.order([1, 'desc']).draw();
		else
		  program_table.order([1, 'asc']).draw();
    });
    // Add event listener for details toggle
    $('#program_table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = program_table.row(tr);
 
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(programDetails(row.data())).show();
            tr.addClass('shown');
        }
    });
    // Add event listener for 'Update Program' buttons
    $('#program_table tbody').on('click', 'a#updateProgram', function () {
        var ajaxUrl = $(this).attr("ajax-url");
        var validateUrl = $(this).attr("validate-url");
    	var program_ID = $(this).attr("key");
		var url = $(this).attr("url");
        
		$.ajax({
            data: 'program_ID=' + program_ID,
            dataType: "json",
            type: "POST",
            url: ajaxUrl,
            success: function (data) {
				$("#myModalLabel").text("Update Program");
				$("#invalidMessage").parent().hide();
                $("#program-id").attr("name", "program_ID").val(data['program_ID']);
                $("#program-college").val(data['college_ID']).trigger("change");
                $("#program-program").val(data['program']);
                $("#program-program-short").val(data['program_short']);
                $("#program-short").val(data['short']);
                $("#datepicker .input-group.date").datepicker('setDate', data['date_instituted']).datepicker("fill");
                $("#program-type").val(data['type']);
                $("#program-vision").text(data['vision']);
                $("#program-goals").text(data['goals']);
		        $("input[type='submit']").val("Save");
		        $("#programForm").attr("url", url).attr("ajax-url", validateUrl);

            	if (data['department_ID'])
            	   $("#program-department").val(data['department_ID']).prop('disabled', false);
            	else
	               $("#program-department").html("<option value=\"\">Not Applicable</option>").prop("disabled", true);
            }
        });
    });

    /* 5. Announcement Table */
    $('#announcement_table').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": "subject"
        },{
            "searchable": false,
            "orderable": false,
            "targets": "action"
        }],
        // Order table by date (column 2), descending
        "order": [[ 2, "desc" ]]
    });
    // Compressed version for all
    $('#announcement_summary_table').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": "subject"
        },{
            "searchable": false,
            "orderable": false,
            "targets": "action"
        }],
        "dom": 'tr'
        // Order table by date (column 2), descending
        // "order": [[ 2, "desc" ]]
    });

	/* 6. Message Table */
	$('#message_table').DataTable({
        "columnDefs": [{
            "visible": false,
            "targets": "message"
        },{
            "searchable": false,
            "orderable": false,
            "targets": "action"
        },{
            "searchable": false,
            "orderable": false,
            "targets": "star"
        }],
        // Custom table tools: (f)ilter, (t)able, (i)nformation, (p)agination, p(r)ocessing
        // Order table by date (column 2), descending
        "order": [[ 2, "desc" ]]
    });
      /* MODAL -- Add event listener */
    // Add event listener for viewing
    $('#message_table tbody').on('click', 'td.message', function () {
        var ajaxUrl = $(this).attr("ajax-url");
        var message_ID = $(this).attr("key");
        var row = "#"+message_ID;

        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: 'message_ID=' + message_ID,
            dataType: "json",
            success:function (data){
                $("#message-read").html(data["read"]);
                $("#message-star").html(data["star"]);
                $("#message-delete").html(data["delete"]);
                $("#message-subject").text(data["subject"]);
                $("#message-sender").text(data["sender"]);
                $("#message-date").text(data["date"]);
                $("#message-message").text(data["message"]);
            }
        });
    });

    /* 7. Education Table */
    $('#education_table').DataTable({
        "paging": false,
        "ordering": false,
        "info": false,
        "dom": 'tr',
        "order": [[0, "desc"]],
    })

	/* 8. Accomplishment Table  */
	$('#accom_table').DataTable({
        "columns": [
            null,
            null,
            null,
            // Remarks column is searchable but hidden
            { "visible": false },
            // Action column is neither searchable nor orderable
            { "searchable": false, "orderable": false }
        ],
        // Order table by period (column 0), descending
        "order": [[ 0, "desc" ]]
    });
	
    /* 9. Accomplishment Group Table */
	var accom_group_table = $('#accom_group_table').DataTable({
        "columns": [
            // Period column is searchable but hidden; used as group header
            { "visible": false },
		    null,
		    null,
		    null,
		    null,
		    // Remarks column is searchable but hidden
            { "visible": false },
		    // Action column is neither searchable nor orderable
            { "searchable": false, "orderable": false }
		],
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last = null;
 
            // Group accomplishment table by period (column 0)
            api.column(0, {page:'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="6">'+group+'</td></tr>');
                    last = group;
                }
            });
        },
        // Order table by period (column 0), descending
        "order": [[ 0, "desc" ]]
    });
    // Add event listener for ordering group accomplishment table by period
	$('#accom_group_table tbody').on('click', 'tr.group', function () {
		var currentOrder = accom_group_table.order()[0];
		
        if (currentOrder[0] === 0 && currentOrder[1] === 'asc')
		  accom_group_table.order([0, 'desc']).draw();
		else
		  accom_group_table.order([0, 'asc']).draw();
    });
    // Initialize multiple accomplishment tables for viewing all accomplishments
    var all_table = $("table.display").DataTable({
        "paging": false,
        "ordering": false,
        "info": false,
        // Custom table tools: (t)able, p(r)ocessing
        "dom": 'tr',
    });
    // Add event listener for filtering multiple accomplishment tables
    $("#search").on('keyup', function () {
        all_table.search($(this).val()).draw();
    });
    
    /* 10. IPCR Table */
    $('#ipcr_table').DataTable({
        "order": [[ 1, "desc" ]],
        "columns": [
            { "searchable": false, "visible": false },
		    { "iDataSort": 0 },
		    null,
		    null,
		    { "visible": false },
		    { "searchable": false, "orderable": false }
		]
    });
    
    /* 11. IPCR Group Table */
	var ipcr_group_table = $('#ipcr_group_table').DataTable({
        "order": [[ 0, "desc" ]],
        "columns": [
            { "searchable": false, "visible": false },
		    { "visible": false, "iDataSort": 0 },
		    null,
		    null,
		    null,
		    null,
		    { "visible": false },
		    { "searchable": false, "orderable": false }
		],
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last = null;
 
            api.column(1, {page:'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="6">'+group+'</td></tr>');
                    last = group;
                }
            });
        }
    });
    // Order IPCR forms by period
    $('#ipcr_group_table tbody').on('click', 'tr.group', function () {
		var currentOrder = ipcr_group_table.order()[0];
		if (currentOrder[0] === 0 && currentOrder[1] === 'asc') {
			ipcr_group_table.order([0, 'desc']).draw();
		} else {
			ipcr_group_table.order([0, 'asc']).draw();
		}
    });

    /* 12. OPCR Table */
    $('#opcr_table').DataTable({
        "order": [[ 1, "desc" ]],
        "columns": [
		    { "searchable": false, "visible": false },
            { "iDataSort": 0 },
		    null,
		    null,
            null,
		    { "visible": false },
		    { "searchable": false, "orderable": false }
		]
    });

    /* 13. OPCR Group Table */
    var opcr_group_table = $('#opcr_group_table').DataTable({
        "order": [[ 0, "desc" ]],
        "columns": [
            { "searchable": false, "visible": false },
            { "visible": false, "iDataSort": 0 },
            null,
            null,
            null,
            null,
            { "visible": false },
            { "searchable": false, "orderable": false }
        ],
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last = null;
 
            api.column(1, {page:'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="6">'+group+'</td></tr>');
                    last = group;
                }
            });
        }
    });
    // Order OPCR Forms by period
    $('#opcr_group_table tbody').on('click', 'tr.group', function () {
        var currentOrder = opcr_group_table.order()[0];
        if (currentOrder[0] === 0 && currentOrder[1] === 'asc') {
            opcr_group_table.order([0, 'desc']).draw();
        } else {
            opcr_group_table.order([0, 'asc']).draw();
        }
    });

    /* DOCUMENT TYPE -- Show necessary fields depending on doument type */
    $("#report_type").change(function () {
        var type = $(this).val();

        if (type == "new") {
            $("#yearmonth").parent().show();
            $("#yearmonth-input").prop("required", true);
            $("#period").parent().hide();
            $("#period input").prop("required", false);
        } else if (type == "consolidated") {
            $("#period").parent().show();
            $("#period input").prop("required", true);
            $("#yearmonth").parent().hide();
            $("#yearmonth-input").prop("required", false);
        }
    });
    $("#form_type").change(function () {
        var type = $(this).val();

        if (type == "new") {
            $("#period").parent().show();
            $("#period input").prop("required", true);
            $("#opcr").parent().parent().hide();
            $("#opcr").prop("required", false);
        } else if (type == "consolidated") {
            $("#opcr").parent().parent().show();
            $("#opcr").prop("required", true);
            $("#period").parent().hide();
            $("#period input").prop("required", false);
        }
    });

    $("#new-report, #new-form").click(function () {
        $("#report_type, #form_type").val("new").trigger("change");
        $("#yearmonth .input-group.date, #period input").datepicker("setDate", null);
        $("#opcr").val("");
    });
    $("#consolidate-report").click(function () {
        $("#period input").datepicker("setDate", null);
    });

    /* RESEARCH FORM -- Reformat numbers */
    $("#fund_up, #fund_amount").focusout(function () {
        var fund = $(this).val();
        if (fund) $(this).val($.number(fund, 2));
    });

	// Tooltip for author field
	$('input#author').tooltip();
	$('.button-tip').tooltip();

    /* Date pickers */
    $("#datepicker .input-group.date").datepicker({
        // format: "MM dd, yyyy",
        todayHighlight: true,
        autoclose: true
    });
    $("#award-duration .input-daterange, #research-duration .input-daterange, #paper-dates .input-daterange, #creative-dates .input-daterange, #participation-dates .input-daterange, #other-dates .input-daterange").datepicker({
        format: "d MM yyyy",
        todayHighlight: true
    });
    $('#period .input-daterange').datepicker({
        format: "MM yyyy",
        viewMode: 1, 
        minViewMode: 1,
    });
    $("#yearmonth .input-group.date").datepicker({
        format: "MM yyyy",
        viewMode: 1, 
        minViewMode: 1,
        autoclose: true
    });
    
    /* File input */
	$("#photo").fileinput({
		previewFileType: "image",
		browseClass: "btn btn-primary",
		browseLabel: " Browse",
		browseIcon: '',//<span class="glyphicon glyphicon-picture"></span>
		showRemove: false,
		showUpload: false
	});
    $("input#accom-attachment").fileinput({
        previewFileType: "image",
        browseClass: "btn btn-primary",
        browseLabel: " Browse",
        browseIcon: '',
        removeIcon: '',
        showUpload: false,
        maxFileCount: 5
    });

    /* Rating input */
    $("input#r_quantity").rating({
		step: 1,
		size: 'xs',
	    starCaptions: {1: "Poor", 2: "Unsatisfactory", 3: "Satisfactory", 4: "Very Satisfactory", 5: "Outstanding"},
	    starCaptionClasses: {1: "text-warning", 2: "text-warning", 3: "text-warning", 4: "text-warning", 5: "text-warning"},
	});
	$("input#r_efficiency").rating({
		step: 1,
		size: 'xs',
	    starCaptions: {1: "Poor", 2: "Unsatisfactory", 3: "Satisfactory", 4: "Very Satisfactory", 5: "Outstanding"},
        starCaptionClasses: {1: "text-warning", 2: "text-warning", 3: "text-warning", 4: "text-warning", 5: "text-warning"},
	});
	$("input#r_timeliness").rating({
		step: 1,
		size: 'xs',
	    starCaptions: {1: "Poor", 2: "Unsatisfactory", 3: "Satisfactory", 4: "Very Satisfactory", 5: "Outstanding"},
        starCaptionClasses: {1: "text-warning", 2: "text-warning", 3: "text-warning", 4: "text-warning", 5: "text-warning"},
	});

    /* Confirmation message */
    $("a#deleteReport").click(function () {
        return confirm('Are you sure you want to delete this report?');
    });
    $("a#deleteAccom").click(function () {
        return confirm('Are you sure you want to remove this accomplishment?');
    });
    $("a#deleteForm").click(function () {
        return confirm('Are you sure you want to delete this form?');
    });
    $("a#deleteOutput").click(function () {
        return confirm('Are you sure you want to remove this?');
    });
    $("a#resetPassword").click(function () {
        return confirm('Are you sure you want to reset the password?');
    });
    $("a#deleteAccount").click(function () {
        return confirm('Are you sure you want to delete this account?');
    });
    $("a#deleteMessage").click(function () {
        return confirm('Are you sure you want to delete this message?');
    });
    
    /* PROFILE - Toggle views */
    $("#education_toggle_show, #education_toggle_hide").click(function()
    {
        $("#education").toggle("slow");
        $("#education_toggle_show, #education_toggle_hide").toggle();
    });
    $("#accomplishments_toggle_show, #accomplishments_toggle_hide").click(function()
    {
        $("#accomplishments").toggle("slow");
        $("#accomplishments_toggle_show, #accomplishments_toggle_hide").toggle();
    });

    $("#educationForm").submit(function (event) {
        if ($("#major, #year, #institution, #city, #country"))
            $("#educationForm").unbind("submit").submit();
        else
            event.preventDefault();
    })

    $("#announcementForm").submit(function (event) {
        if("#announcement-subject, #announcement-content")
            $("#announcementForm").unbind("submit").submit();
        else
            event.preventDefault();
    });

});
