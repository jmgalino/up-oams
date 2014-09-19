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
