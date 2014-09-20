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

	/* DATATABLE -- Initialize college table */
	$('#college_table').DataTable({
        "order": [[ 0, "asc" ]],
        "columnDefs": [{
        	"searchable": false,
        	"orderable": false,
        	"targets": "action"
        }]
    });

	/* DATATABLE -- Initialize department table */
	var department_table = $('#department_table').DataTable({
        "order": [[ 0, "asc" ]],
        "columns": [
		    { "visible": false },
		    null,
		    null,
		    null,
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
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
                    last = group;
                }
            });
        }
    });
    // Order by college
	$('#department_table tbody').on('click', 'tr.group', function(){
		var currentOrder = department_table.order()[0];
		if (currentOrder[0] === 0 && currentOrder[1] === 'asc')
		{
			department_table.order([0, 'desc']).draw();
		}
		else
		{
			department_table.order([0, 'asc']).draw();
		}
    });

    var program_table = $('#program_table').DataTable( {
        "ajax": "/oamsystem/index.php/ajax/get_programs",
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
        "order": [[1, 'asc']],
        // WALA KO KASABOT ANI
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({page:'current'}).nodes();
            var last=null;
 
            api.column(1, {page:'current'}).data().each(function (group, i) {
                if (last !== group)
                {
                    $(rows).eq(i).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
                    last = group;
                }
            });
        }
    });
    // Order by college
	$('#program_table tbody').on('click', 'tr.group', function(){
		var currentOrder = program_table.order()[0];
		if (currentOrder[0] === 1 && currentOrder[1] === 'asc')
		{
			program_table.order([1, 'desc']).draw();
		}
		else
		{
			program_table.order([1, 'asc']).draw();
		}
    });
    // Add event listener for opening and closing details
    $('#program_table tbody').on('click', 'td.details-control', function(){
        var tr = $(this).closest('tr');
        var row = program_table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child(programDetails(row.data())).show();
            tr.addClass('shown');
        }
    });
    $('#program_table tbody').on('click', 'a#updateProgram', function(){
    	var url = $(this).attr("url");
		var program_ID = $(this).attr("key");
		
		$.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/program_details",
            data: 'program_ID=' + program_ID,
		    dataType: "json",
            success:function(data){
				$("#myModalLabel").text("Update Program");
				$("#invalidMessage").parent().hide();
                $("#program-id").val(data['program_ID']);
                $("#program-college").val(data['college_ID']).trigger("change");
                $("#program-program").val(data['program']);
                $("#program-program-short").val(data['program_short']);
                $("#program-short").val(data['short']);
                $("#datepicker .input-group.date").datepicker('setDate', data['date_instituted']).datepicker('fill');
                $("#program-type").val(data['type']);
                $("#program-vision").text(data['vision']);
                $("#program-goals").text(data['goals']);
		        $("input[type='submit']").val("Save");
		        $("#programForm").attr("url", url);

            	if (data['department_ID'])
            	{
            		$("#program-department").val(data['department_ID']).prop('disabled', false);
            	}
	            else
	            {
	            	$("#program-department").html("<option value=\"\">Not Applicable</option>").prop("disabled", true);
	            }
            }
        });
    });

	/* DATATABLE -- Initialize message table */
	$('#message_table').DataTable({
        "order": [[ 2, "desc" ]],
        "dom": 'ftipr',
        "columns": [
		    null,
		    null,
		    null,
		    { "searchable": false, "orderable": false }
		]
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
 
    $("#search").keyup(function (){
      // Filter on the column (the index) of this element
      table.fnFilterAll(this.value);
    });
	
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

	// date
	$("#datepicker .input-group.date").datepicker({
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

	$("#r_quantity").rating({
		step: 1,
		size: 'xs',
	    starCaptions: {1: "1", 2: "2", 3: "3", 4: "4", 5: "5"},
	    starCaptionClasses: {1: "text-warning", 2: "text-warning", 3: "text-warning", 4: "text-warning", 5: "text-warning"},
	});
	$("#r_efficiency").rating({
		step: 1,
		size: 'xs',
	    starCaptions: {1: "1", 2: "2", 3: "3", 4: "4", 5: "5"},
	    starCaptionClasses: {1: "text-warning", 2: "text-warning", 3: "text-warning", 4: "text-warning", 5: "text-warning"},
	});
	$("#r_timeliness").rating({
		step: 1,
		size: 'xs',
	    starCaptions: {1: "1", 2: "2", 3: "3", 4: "4", 5: "5"},
	    starCaptionClasses: {1: "text-warning", 2: "text-warning", 3: "text-warning", 4: "text-warning", 5: "text-warning"},
	});

	$("#fund_amount").number( true, 2 );
	$("#fund_up").number( true, 2 );

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
