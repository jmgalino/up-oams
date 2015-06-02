function blockPreview() {
	$(".form pre").block({
		message: "<h4>Please wait</h4>",
		css: { 
		border: 'none', 
		padding: '5px', 
		backgroundColor: '#000', 
		'-webkit-border-radius': '10px', 
		'-moz-border-radius': '10px', 
		opacity: .5, 
		color: '#fff' 
		}
	});
}

function showPrev(next) {
	var ajaxUrl = $("#inputData").attr("ajax-url");
	var cumaId = $("#inputData").attr("cuma-id");
	var percent = ((next - 1) / 8) * 100;

	$.ajax({
		type: "POST",
		url: ajaxUrl,
		data: "cuma_ID=" + cumaId + "&current=" + next,
		dataType: "text",
		success:function (data) {
			$(".progress-bar").attr("aria-valuenow", percent).attr("style", "width:" + percent + "%").text(percent + "%");
			$("#inputData").attr("current", next);
			$("pre.form").load(data);
			$(".form pre").unblock();
		}
	});
}

function showNext(next) {
	var ajaxUrl = $("#inputData").attr("ajax-url");
	var cumaId = $("#inputData").attr("cuma-id");
	var percent = ((next - 1) / 8) * 100;

	$.ajax({
		type: "POST",
		url: ajaxUrl,
		data: "cuma_ID=" + cumaId + "&current=" + next,
		dataType: "text",
		success:function (data) {
			if (next <= 8)
				$("pre.form").load(data);
			else
			{
				$(".form").hide();
				$(".submit").show();

				var pdf = $("#nextPage").attr("final") + data;
				$("div.submit").html("<embed src=" + pdf + " style=\"width:100%; height:500px\">");
			}

			$(".progress-bar").attr("aria-valuenow", percent).attr("style", "width:" + percent + "%").text(percent + "%");
			$("#inputData").attr("current", next);
			$(".form pre").unblock();
		}
	});
}

$(document).ready(function () {

	/* ==================================== *
    *                                       *
    *                  ADMIN                *
    *                                       *
    * ===================================== */

	/* PROFILE FORM (NEW) -- Reset form */
	$("#newProfile").click(function () {
		var url = $(this).attr("url");

		$("#modalProfileLabel").text("New Profile");
		$("#invalidMessage").parent().hide();
		$("#adminType, #facultyType").prop("checked", false);
		$("#user-id, #empcode, #title, #fname, #mname, #lname, #suffix, #datepicker .input-group.date, #fcode, #rank, #program-id, #position").val("");
		$("#user-id").removeAttr("name");
		$("input[type=submit]").val("Add");
        $("#profileForm").attr("url", url);
	});

	/* PROFILE FORM (UPDATE) -- Set form for editing */
	$("#updateProfile").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var validateUrl = $(this).attr("validate-url");
		var url = $(this).attr("url");
		var user_ID = $(this).attr("key");

		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "user_ID=" + user_ID,
			dataType: "json",
			success:function (data) {
				$("#modalProfileLabel").text("Update Profile");
				$("#invalidMessage").parent().hide();
				$("#user-id").attr("name", "user_ID").val(data["user_ID"]);
				$("#empcode").val(data["empcode"]);
				$("#title").val(data["title"]);
				$("#fname").val(data["fname"]);
				$("#mname").val(data["mname"]);
				$("#lname").val(data["lname"]);
				$("#datepicker .input-group.date").datepicker("setDate", data["birthday"]).datepicker("fill");
				$("#suffix").val(data["suffix"]);
				$("input[type=submit]").val("Save");
				$("#profileForm").attr("url", url).attr("ajax-url", validateUrl);

				if (data['fcode']) {
					$("#facultyType").prop("checked", true).trigger("click");
					$(".faculty-info").show();
					$("#fcode").val(data["fcode"]);
					$("#rank").val(data["rank"]);
					$("#program-id").val(data["program_ID"]);
					$("#position").val(data["position"]);
				} else {
					$("#adminType").prop("checked", true).trigger("click");
				}
			}
		});
	});

	/* PROFILE FORM (VALIDATE) -- Check if employee code is unique: if unique, submit; else, show error message */
	$("#profileForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");

		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#profileForm").serialize(),
            success: function (unique) {
            	if (unique)
            		$("#profileForm").attr("action", $("#profileForm").attr("url")).unbind("submit").trigger("submit");
            	else
            		$("#invalidMessage").text("This is not a unique employee code.").parent().show();
            }
        });
	});

	/* PROFILE FORM -- Show necessary fields depending on user type */
	$("input[name=user_type]").click(function () {
		if ($(this).val() == "Admin") {
			$(".faculty_info").parent().parent().hide();
			$(".faculty_info").prop("required", false);
		} else {
			$(".faculty_info").parent().parent().show();
			$(".faculty_info").prop("required", true);
		}
	});

	/* EDUCATION FORM (NEW) -- Reset form */
	$("#newEducation").click(function () {
		var url = $(this).attr("url");

		$("#myEducLabel").text("New Educational Attainment");
        $("#educationForm").attr("action", url);
		$("#educationForm input").val("");
		$("#education-id").removeAttr("name");
        $("input[type=submit]").val("Add");
	});

	/* EDUCATION FORM (UPDATE) -- Set form for editing */
	$("a#updateEducation").click(function () {
		var education_ID = $(this).attr("key");
		var ajaxUrl = $(this).attr("ajax-url");
		var url = $(this).attr("url");

		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "education_ID=" + education_ID,
			dataType: "json",
			success:function (data) {
				$("#myEducLabel").text("Update Educational Attainment");
				$("#education-id").attr("name", "education_ID").val(data["education_ID"]);
				$("#major").val(data["major"]);
				$("#minor").val(data["minor"]);
				$("#qualification").val(data["qualification"]);
				$("#year").val(data["year"]);
				$("#institution").val(data["institution"]);
				$("#thesis").val(data["thesis"]);
				$("#city").val(data["city"]);
				$("#country").val(data["country"]);
				$("#notes").val(data["notes"]);
				$("input[type=submit]").val("Save");
				$("#educationForm").attr("action", url);
			}
		});
	});

	/* COLLEGE FORM (NEW) -- Reset form */
	$("#newCollege").click(function () {
		var url = $(this).attr("url");

		$("#myModalLabel").text("New College");
        $("#collegeForm").attr("url", url);
		$("#invalidMessage").parent().hide();
		$("#collegeForm input").val("");
		$("#college-id").removeAttr("name");
        $("#college-dean").parent().parent().hide();
        $("input[type=submit]").val("Add");
	});

	/* COLLEGE FORM (UPDATE) -- Set form for editing */
	$("a#updateCollege").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var validateUrl = $(this).attr("validate-url");
		var url = $(this).attr("url");
		var college_ID = $(this).attr("key");

		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "college_ID=" + college_ID,
			dataType: "json",
			success:function (data) {
				$("#myModalLabel").text("Update College");
				$("#invalidMessage").parent().hide();
				$("#college-id").attr("name", "college_ID").val(data["college_ID"]).trigger("change");
				$("#college-college").val(data["college"]);
				$("#college-short").val(data["short"]);
				$("#college-dean").val(data["user_ID"]).parent().parent().show();
				$("input[type=submit]").val("Save");
				$("#collegeForm").attr("url", url).attr("ajax-url", validateUrl);
			}
		});
    });

    /* COLLEGE FORM -- List of users depends on selected college */
    $("#college-id").change(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var college_ID = $(this).val();
        
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: "college_ID=" + college_ID,
		    dataType: "json",
            success:function (options) {
            	var selected = "";
            	var newOptions = "<option value=\"\">None</option>";

				for (var i = 0; i < options.length; i++) {
					if (options[i].optionSelect)
						selected = options[i].optionValue;

					newOptions += "<option value=\"" + options[i].optionValue + "\">" + options[i].optionText + "</option>";
				}

				$("#college-dean").html(newOptions).val(selected);
            }
        });
	});

	/* COLLEGE FORM (VALIDATE) -- Check if everything is unique */
	$("#collegeForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");

		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#collegeForm").serialize(),
            success: function (unique) {
            	if (unique)
            		$("#collegeForm").attr("action", $("#collegeForm").attr("url")).unbind("submit").trigger("submit");
            	else
	            	$("#invalidMessage").text("This is not a unique college.").parent().show();
            }
        });
	});

	/* DEPARTMENT FORM (NEW) -- Reset form */
	$("#newDepartment").click(function () {
		var url = $(this).attr("url");

		$("#myModalLabel").text("New Department");
        $("#departmentForm").attr("url", url);
		$("#invalidMessage").parent().hide();
		$("#departmentForm input").val("");
		$("#department-id").removeAttr("name");
        $("#department-chair").parent().parent().hide();
		$("input[type=submit]").val("Add");
	});

	/* DEPARTMENT FORM (UPDATE) -- Set form for editing */
	$("a#updateDepartment").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var validateUrl = $(this).attr("validate-url");
		var url = $(this).attr("url");
		var department_ID = $(this).attr("key");

        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: "department_ID=" + department_ID,
		    dataType: "json",
            success:function (data) {
				$("#myModalLabel").text("Update Department");
				$("#invalidMessage").parent().hide();
                $("#department-id").attr("name", "department_ID").val(data["department_ID"]).trigger("change");
                $("#department-college").val(data["college_ID"]);
                $("#department-department").val(data["department"]);
                $("#department-short").val(data["short"]);
                $("#department-chair").val(data["user_ID"]).parent().parent().show();
		        $("input[type=submit]").val("Save");
		        $("#departmentForm").attr("url", url).attr("ajax-url", validateUrl);
            }
        });
    });

    /* DEPARTMENT FORM -- List of users depends on selected department */
    $("#department-id").change(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var department_ID = $(this).val();
        
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: "department_ID=" + department_ID,
		    dataType: "json",
            success:function (options) {
            	var selected = "";
        		var newOptions = "<option value=\"\">None</option>";

				for (var i = 0; i < options.length; i++) {
					if (options[i].optionSelect)
						selected = options[i].optionValue;
					
					newOptions += "<option value=\"" + options[i].optionValue + "\">" + options[i].optionText + "</option>";
				}

				$("#department-chair").html(newOptions).prop("disabled", false).val(selected);
            },
            error: function () {
            	$("#department-chair").html("<option value=\"\">Not Applicable</option>").prop("disabled", true);
            }
        });
	});

	/* DEPARTMENT FORM (VALIDATE) -- Check if everything but college_ID is unique */
	$("#departmentForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");

		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#departmentForm").serialize(),
            success: function (unique) {
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

	/* PROGRAM FORM (NEW) -- Reset form */
	$("#newProgram").click(function () {
		var url = $(this).attr("url");

		$("#myModalLabel").text("New Degree Program");
		$("#invalidMessage").parent().hide();
		// change to $("#programForm input").val("");
		$("#program-college, #program-id, #program-program, #program-program-short, #program-short, #datepicker .input-group.date, #program-type").val("");
		$("#program-department").html("<option value=\"\">Select</option>").prop("disabled", true);
		$("#program-vision, #program-goals").text("");
		$("#program-id").removeAttr("name");
        $("input[type=submit]").val("Add");
        $("#programForm").attr("url", url);
	});

	/* PROGRAM FORM (VALIDATE) -- Check if program names (complete, short, initials) are unique */
	$("#programForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");

		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#programForm").serialize(),
            success: function (unique){
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

	/* PROGRAM FORM -- List of departments depends on selected college */
	$("#program-college").change(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var college_ID = $(this).val();
        
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: "college_ID=" + college_ID,
		    dataType: "json",
            success:function (options) {
            	var newOptions = "";

				for (var i = 0; i < options.length; i++) {
					newOptions += "<option value=\"" + options[i].optionValue + "\">" + options[i].optionText + "</option>";
				}

				$("#program-department").html(newOptions).prop("disabled", false);
            }
        });
	});

	/* ANNOUNCEMENT FORM (NEW) -- Reset form */
	$("#newAnnouncement").click(function () {
		var actionUrl = $(this).attr("action-url");

		$("#myModalLabel").text("New Announcement");
		$("#announcementForm").attr("action", actionUrl);
		$("#announcementForm input, #announcement-content").val("");
		$("#announcement-id").removeAttr("name");
		$("#archiveAnnouncement").hide();
        $("input[type=submit]").val("Post");
	});

	/* ANNOUNCEMENT FORM (UPDATE) -- Set form for editing */
	$("a#updateAnnouncement").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var actionUrl = $(this).attr("action-url");
		var archiveUrl = $(this).attr("archive-url");
		var announcementId = $(this).attr("key");

		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "announcement_ID=" + announcementId,
			dataType: "json",
			success:function (data) {
				$("#myModalLabel").text("Update Announcement");
				$("#announcementForm").attr("action", actionUrl);
				$("#announcement-id").attr("name", "announcement_ID").val(data["announcement_ID"]);
				$("#announcement-subject").val(data["subject"]);
				$("#announcement-content").val(data["content"]);
				$("#archiveAnnouncement").attr("href", archiveUrl).show();
		        $("input[type=submit]").val("Save");
			}
		});
	});

	/* ANNOUNCEMENT FORM (VIEW) -- */
	$("a#openAnnouncement").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var restoreUrl = $(this).attr("restore-url");
		var deleteUrl = $(this).attr("delete-url");
		var announcementId = $(this).attr("key");

		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "announcement_ID=" + announcementId,
			dataType: "json",
			success:function (data) {
				$("#announcement-subject").text(data["subject"]);
				$("#announcement-content").text(data["content"]);
	        	$("#deleteAnnouncement").attr("href", deleteUrl);
				$("#restoreAnnouncement").attr("href", restoreUrl);
			}
		});
	});

	/* ==================================== *
    *                                       *
    *         ACCOMPLISHMENT REPORTS        *
    *                                       *
    * ===================================== */

	/* ACOMM REPORT FORM (VALIDATE) -- Check if date range is correct */
	$("#newReport").submit(function (event) {
		event.preventDefault();
		var actionUrl = $(this).attr("action-url");
		var ajaxUrl = $(this).attr("ajax-url");
		
		if ($("#report_type").val() == "consolidated")
		{
			
			$.ajax({
	            type: "POST",
	            url: ajaxUrl,
	            data: $("#newReport").serialize(),
	            success: function (valid) {
	            	if (valid == 1)
	            		$("#newReport").attr("action", actionUrl).unbind("submit").trigger("submit");
	            	else
	            		$("#invalidMessage").text(valid).parent().show();
	            }
	        });
		}
		else
			$("#newReport").attr("action", actionUrl).unbind("submit").trigger("submit");
	})
	$("#consolidateReport").submit(function (event) {
		event.preventDefault();
		var actionUrl = $(this).attr("action-url");
		var ajaxUrl = $(this).attr("ajax-url");
		
		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#consolidateReport").serialize(),
            success: function (valid) {
            	if (valid == 1)
            		$("#consolidateReport").attr("action", actionUrl).unbind("submit").trigger("submit");
            	else
            		$("#invalidMessage").text(valid).parent().show();
            }
        });
	})

	/* ACCOMPLISHMENT FORM -- Reset form */
	$("#addAccomplishment").click(function () {
		$("input[name=accom_type]").prop("checked", false);
		$("#next-button").removeAttr("data-dismiss").removeAttr("data-target");
	});
	
	/* ACCOMPLISHMENT FORM -- Set next modal depending on accomplishment */
	$("input[name=accom_type]").click(function () {
		var url = $(this).attr("url");
		var type = $(this).val();

		// Dismiss curent modal and set next modal
		$("#next-button").attr("data-dismiss", "modal").attr("data-target", "#modal_" + type);

		// Reset label, input fields and url 
		switch (type) {
			case "publication":
				$("h4#accom-label").text("Journal Publication/Book/Chapter in a Book");
				// $("#publicationForm").attr("action", url);
				$("#publicationForm").attr("url", url);
				$("#publicationForm input[name=type]").prop("checked", false);
				$("#publicationDetails input").val("");
				$("#publication-isi").prop("checked", false);
				$("#publication-peer").prop("checked", false);
				$("#publication-refereed").prop("checked", false);
				$("#publication-popular").prop("checked", false);
				break;
			
			case "award":
				$("h4#accom-label").text("Award/Grant Received");
				$("#awardForm").attr("url", url);
				$("#awardForm input").val("");
				break;
			
			case "research":
				$("h4#accom-label").text("Research Grant/Fellowship Received");
				$("#researchForm").attr("url", url);
				$("#researchForm input").val("");
				break;
			
			case "paper":
				$("h4#accom-label").text("Oral Paper/Poster Presentation");
				$("#paperForm").attr("url", url);
				$("#paperForm input").val("");
				break;
			
			case "creative":
				$("h4#accom-label").text("Presentation of Creative Work Output");
				$("#creativeForm").attr("url", url);
				$("#creativeForm input").val("");
				break;
			
			case "participation":
				$("h4#accom-label").text("Participation in Seminars/Conferences/Workshops/Training Courses/Fora");
				$("#participationForm").attr("url", url);
				$("#participationForm input").val("");
				break;
			
			case "material":
				$("h4#accom-label").text("Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals");
				// $("#materialForm").attr("action", url);
				$("#materialForm").attr("url", url);
				$("#materialForm input").val("");
				break;
			
			case "other":
				$("h4#accom-label").text("Other Accomplishments");
				$("#otherForm").attr("url", url);
				$("#otherForm input").val("");
				break;
		}

		// Reset alert, attachment, back and submit button
		$("p#accom-alert").parent().hide();
		$("input#accom-attachment").attr("name", "attachment[]");
		$("div#add-attachment").show();
		$("div#view-attachment").hide();
		$("button#back-button").show();
		$("input#accom-submit").val("Add");
	});

	/* PUBLICATION FORM (UPDATE) -- Set form for editing */
	$("a#updatePublication").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var actionUrl = $(this).attr("action-url");
		var accomID = $(this).attr("accom-id");
		var publicationID = $(this).attr("publication-id");
		
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "accom_ID=" + accomID + "&accom_specID=" + publicationID,
			dataType: "json",
			success:function (details) {
				$("#publicationForm").attr("action", actionUrl); //change to "url" if needs ajax validation
				$("h4#accom-label").text("Edit Accomplishment");
				$("p#accom-alert").parent().hide();
				$("button#back-button").hide();
				$("input#accom-submit").val("Save");

				$("#publication-id").val(details["publication_ID"]);
				$("#publication-author").val(details["author"]);
				$("#publication-year").val(details["year"]);
				$("#publication-title").val(details["title"]);
				$("#publication-page").val(details["page"])

				if (details["type"] == "Journal") {
					$("#journal_volume").val(details["journal_volume"]);
					$("#journal_issue").val(details["journal_issue"]);
					$("#journalType").prop("checked", true).trigger("click");
				} else {
					$("#book_publisher").val(details["book_publisher"]);
					$("#book_place").val(details["book_place"]);

					if (details["type"] == "Book")
						$("#bookType").prop("checked", true).trigger("click");
					else
						$("#chapterType").prop("checked", true).trigger("click");
				}

				if (details["isi"] == "Yes")
					$("#publication-isi").prop('checked', true);

				if (details["peer_reviewed"] == "Yes")
					$("#publication-peer").prop('checked', true);
				
				if (details["refereed"] == "Yes")
					$("#publication-refereed").prop('checked', true);
				
				if (details["popular"] == "Yes")
					$("#publication-popular").prop('checked', true);

				$("input#accom-attachment").removeAttr("name");
				$("div#add-attachment").hide();
				$("div#view-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details["attachment"]).show();
			}
		});
	});

	/* PUBLICATION FORM -- Show necessary fields depending on publication type */
	$("input[name=type]").click(function () {
		var pub = $(this).val();

		if (pub == "Journal") {
			$(".journal-details").parent().parent().show();
			$(".journal-details").prop("required", true);
			$(".book-details").parent().parent().hide();
			$(".book-details").prop("required", false);
			$("#pages-label").text("Inclusive Pages");
		} else {
			$(".book-details").parent().parent().show();
			$(".book-details").prop("required", true);
			$(".journal-details").parent().parent().hide();
			$(".journal-details").prop("required", false);

			if (pub == "Book")
				$("#pages-label").text("Total Number of Pages");
			else
				$("#pages-label").text("Inclusive Pages");
		}
	});

	/* PUBLICATION/MATERIAL FORM (SUBMIT) */
	$("#publicationForm, #materialForm").submit(function (event) {
		event.preventDefault();
		$(this).attr("action", $(this).attr("url")).unbind("submit").trigger("submit");
	});

	/* AWARD FORM (UPDATE) -- Set form for editing */
	$("a#updateAward").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var actionUrl = $(this).attr("action-url");
		var accomID = $(this).attr("accom-id");
		var awardID = $(this).attr("award-id");
		
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "accom_ID=" + accomID + "&accom_specID=" + awardID,
			dataType: "json",
			success:function (details) {
				$("#awardForm").attr("url", actionUrl);
				$("h4#accom-label").text("Edit Accomplishment");
				$("p#accom-alert").parent().hide();
				$("button#back-button").hide();
				$("input#accom-submit").val("Save");

				$("#award-id").val(details["award_ID"]);
				$("#award-award").val(details["award"]);
				$("#award-start").datepicker("setDate", details["start"]).datepicker("fill");
				$("#award-end").datepicker("setDate", details["end"]).datepicker("fill");
				$("#award-source").val(details["source"]);
				$("#award-type").val(details["type"]);

				$("input#accom-attachment").removeAttr("name");
				$("div#add-attachment").hide();
				$("div#view-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details["attachment"]).show();
			}
		});
	});
	
	/* AWARD FORM (VALIDATE) -- Check if date range is correct */
	$("#awardForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");
		
		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#awardForm").serialize(),
            success: function (valid) {
            	if (valid == 1)
            		$("#awardForm").attr("action", $("#awardForm").attr("url")).unbind("submit").trigger("submit");
            	else
            		$("p#accom-alert").text(valid).parent().show();
            }
        });
	});

	/* RESEARCH FORM (UPDATE) -- Set form for editing */
	$("a#updateResearch").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var actionUrl = $(this).attr("action-url");
		var accomID = $(this).attr("accom-id");
		var researchID = $(this).attr("research-id");
		
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "accom_ID=" + accomID + "&accom_specID=" + researchID,
			dataType: "json",
			success:function (details) {
				$("#researchForm").attr("url", actionUrl);
				$("h4#accom-label").text("Edit Accomplishment");
				$("p#accom-alert").parent().hide();
				$("button#back-button").hide();
				$("input#accom-submit").val("Save");

				$("#research-id").val(details["research_ID"]);
				$("#research-title").val(details["title"]);
				$("#research-nature").val(details["nature"]);
				$("#research-start").datepicker("setDate", details["start"]).datepicker("fill");
				$("#research-end").datepicker("setDate", details["end"]).datepicker("fill");
				
				if (details["fund_up"])
				{
					$("#fund_source_up").prop('checked', true).trigger("change");
					$("#fund_up").val(details["fund_up"]).attr("required", "");
				}
				if (details["fund_amount"])
				{
					$("#fund_source_external").prop('checked', true).trigger("change");
		            $("#fund_external, #fund_amount").attr("required", "");
					$("#fund_external").val(details["fund_external"]);
					$("#fund_amount").val(details["fund_amount"]);
				}
				
				$("input#accom-attachment").removeAttr("name");
				$("div#add-attachment").hide();
				$("div#view-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details["attachment"]).show();
			}
		});
	});
	
	/* RESEARCH FORM (VALIDATE) -- Check if fund source is entered and date range is correct */
	$("#researchForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");
		var selected = $("input:checkbox:checked").length;

		if(selected > 0) {
			var flag = false;

			if ($("#fund_source_up").is(":checked")) {
				if (parseFloat($("#fund_up").val()) <= 0) {
					flag = $("#fund_up");
				}
			}
			if ($("#fund_source_external").is(":checked")) {
				if (parseFloat($("#fund_amount").val()) <= 0) {
					if (!flag)
						flag = $("#fund_amount");
				}
			}

			if (flag) {
				$("p#accom-alert").text("Amount is invalid.").parent().show();
				flag.focus();
			} else {
				$.ajax({
		            type: "POST",
		            url: ajaxUrl,
		            data: $("#researchForm").serialize(),
		            success: function (valid) {
		            	if (valid == 1) {
		            		$("#researchForm").attr("action", $("#researchForm").attr("url")).unbind("submit").trigger("submit");
			            } else {
		            		$("p#accom-alert").text(valid).parent().show();
		            		$("#research-start").focus();
		            	}
		            }
		        });
			}
		}
		else {
			$("p#accom-alert").text("Choose at least one fund source").parent().show();
			$("#fund_source_up").focus();
		}
	});

	/* PAPER FORM (UPDATE) -- Set form for editing */
	$("a#updatePaper").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var actionUrl = $(this).attr("action-url");
		var accomID = $(this).attr("accom-id");
		var paperID = $(this).attr("paper-id");
		
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "accom_ID=" + accomID + "&accom_specID=" + paperID,
			dataType: "json",
			success:function (details) {
				$("#paperForm").attr("url", actionUrl);
				$("h4#accom-label").text("Edit Accomplishment");
				$("p#accom-alert").parent().hide();
				$("button#back-button").hide();
				$("input#accom-submit").val("Save");

				$("#paper-id").val(details["paper_ID"]);
				$("#paper-author").val(details["author"]);
				$("#paper-title").val(details["title"]);
				$("#paper-activity").val(details["activity"]);
				$("#paper-venue").val(details["venue"]);
				$("#paper-start").datepicker("setDate", details["start"]).datepicker("fill");
				$("#paper-end").datepicker("setDate", details["end"]).datepicker("fill");

				$("input#accom-attachment").removeAttr("name");
				$("div#add-attachment").hide();
				$("div#view-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details["attachment"]).show();
			}
		});
	});
	
	/* PAPER FORM (VALIDATE) -- Check if date range is correct */
	$("#paperForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");
		
		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#paperForm").serialize(),
            success: function (valid) {
            	if (valid == 1)
            		$("#paperForm").attr("action", $("#paperForm").attr("url")).unbind("submit").trigger("submit");
            	else
            		$("p#accom-alert").text(valid).parent().show();
            }
        });
	});

	/* CREATIVE FORM (UPDATE) -- Set form for editing */
	$("a#updateCreative").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var actionUrl = $(this).attr("action-url");
		var accomID = $(this).attr("accom-id");
		var creativeID = $(this).attr("creative-id");
		
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "accom_ID=" + accomID + "&accom_specID=" + creativeID,
			dataType: "json",
			success:function (details) {
				$("#creativeForm").attr("url", actionUrl);
				$("h4#accom-label").text("Edit Accomplishment");
				$("p#accom-alert").parent().hide();
				$("button#back-button").hide();
				$("input#accom-submit").val("Save");

				$("#creative-id").val(details["creative_ID"]);
				$("#creative-author").val(details["author"]);
				$("#creative-title").val(details["title"]);
				$("#creative-venue").val(details["venue"]);
				$("#creative-start").datepicker("setDate", details["start"]).datepicker("fill");
				$("#creative-end").datepicker("setDate", details["end"]).datepicker("fill");

				$("input#accom-attachment").removeAttr("name");
				$("div#add-attachment").hide();
				$("div#view-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details["attachment"]).show();
			}
		});
	});
	
	/* CREATIVE FORM (VALIDATE) -- Check if date range is correct */
	$("#creativeForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");
		
		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#creativeForm").serialize(),
            success: function (valid) {
            	if (valid == 1)
            		$("#creativeForm").attr("action", $("#creativeForm").attr("url")).unbind("submit").trigger("submit");
            	else
            		$("p#accom-alert").text(valid).parent().show();
            }
        });
	});

	/* PARTICIPATION FORM (UPDATE) -- Set form for editing */
	$("a#updateParticipation").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var actionUrl = $(this).attr("action-url");
		var accomID = $(this).attr("accom-id");
		var participationID = $(this).attr("participation-id");
		
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "accom_ID=" + accomID + "&accom_specID=" + participationID,
			dataType: "json",
			success:function (details) {
				$("#participationForm").attr("url", actionUrl);
				$("h4#accom-label").text("Edit Accomplishment");
				$("p#accom-alert").parent().hide();
				$("button#back-button").hide();
				$("input#accom-submit").val("Save");

				$("#participation-id").val(details["participation_ID"]);
				$("#participation-participation").val(details["participation"]);
				$("#participation-title").val(details["title"]);
				$("#participation-venue").val(details["venue"]);
				$("#participation-start").datepicker("setDate", details["start"]).datepicker("fill");
				$("#participation-end").datepicker("setDate", details["end"]).datepicker("fill");

				$("input#accom-attachment").removeAttr("name");
				$("div#add-attachment").hide();
				$("div#view-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details["attachment"]).show();
			}
		});
	});
	
	/* PARTICIPATION FORM (VALIDATE) -- Check if date range is correct */
	$("#participationForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");
		
		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#participationForm").serialize(),
            success: function (valid) {
            	if (valid == 1)
            		$("#participationForm").attr("action", $("#participationForm").attr("url")).unbind("submit").trigger("submit");
            	else
            		$("p#accom-alert").text(valid).parent().show();
            }
        });
	});

	/* MATERIAL FORM (UPDATE) -- Load data into input fields, show attachments, and set button text */
	$("a#updateMaterial").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var actionUrl = $(this).attr("action-url");
		var accomID = $(this).attr("accom-id");
		var materialID = $(this).attr("material-id");
		
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: 'accom_ID=' + accomID + '&accom_specID=' + materialID,
			dataType: "json",
			success:function (details) {
				$("#materialForm").attr("action", actionUrl); //change to "url" if needs ajax validation
				$("h4#accom-label").text("Edit Accomplishment");
				$("p#accom-alert").parent().hide();
				$("button#back-button").hide();
				$("input#accom-submit").val("Save");

				$("#material-id").val(details['material_ID']);
				$("#material-author").val(details['author']);
				$("#material-year").val(details['year']);
				$("#material-title").val(details['title']);

				$("input#accom-attachment").removeAttr("name");
				$("div#add-attachment").hide();
				$("div#view-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details['attachment']).show();

				/* ================================= *
				*   Attempts on editable attachments *
				*  ================================= */

				// if (details['attachment'])
				// {
				// 	$("#material-attachment").hide();
				// 	$("#accom-help-block").hide();
				// 	$("#show-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details['attachment']);
				// 	$("#material-attachment").fileinput('reset').fileinput({
				// 		previewFileType: "image",
				// 		browseClass: "btn btn-primary",
				// 		browseLabel: " Browse",
				// 		browseIcon: '',
				// 		removeIcon: '',
				// 		showUpload: false,
				// 		maxFileCount: 5,
				// 		initialPreview: details['attachment'],
				// 		overwriteInitial: true,
				// 		initialCaption: details['attachmentCount']
				// 	});
				// }
				// else
				// {
				// 	$("#show-attachment").hide();
				// 	$("#material-attachment").show();
				// 	$("#accom-help-block").show();
				// 	$("#material-attachment").fileinput('clear').show();
				// }
			}
		});
	});

	/* OTHER FORM (UPDATE) -- Set form for editing */
	$("a#updateOther").click(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var actionUrl = $(this).attr("url");
		var accomID = $(this).attr("accom-id");
		var otherID = $(this).attr("other-id");
		
		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "accom_ID=" + accomID + "&accom_specID=" + otherID,
			dataType: "json",
			success:function (details) {
				$("#otherForm").attr("url", actionUrl);
				$("h4#accom-label").text("Edit Accomplishment");
				$("p#accom-alert").parent().hide();
				$("button#back-button").hide();
				$("input#accom-submit").val("Save");

				$("#other-id").val(details["other_ID"]);
				$("#other-participation").val(details["participation"]);
				$("#other-activity").val(details["activity"]);
				$("#other-venue").val(details["venue"]);
				$("#other-start").datepicker("setDate", details["start"]).datepicker("fill");
				$("#other-end").datepicker("setDate", details["end"]).datepicker("fill");

				$("input#accom-attachment").removeAttr("name");
				$("div#add-attachment").hide();
				$("div#view-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details["attachment"]).show();
			}
		});
	});
	
	/* OTHER FORM (VALIDATE) -- Check if date range is correct */
	$("#otherForm").submit(function (event) {
		event.preventDefault();
		var ajaxUrl = $(this).attr("ajax-url");
		
		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#otherForm").serialize(),
            success: function (valid) {
            	if (valid == 1)
            		$("#otherForm").attr("action", $("#otherForm").attr("url")).unbind("submit").trigger("submit");
            	else
            		$("p#accom-alert").text(valid).parent().show();
            }
        });
	});

	/* ==================================== *
    *                                       *
    *               IPCR-OPCR               *
    *                                       *
    * ===================================== */

    /* OPCR FORM (NEW) -- Reset form */
    $("#new-form").click(function () {
    	$("#invalidMessage").text("").parent().hide();
    	$("#form_type").val("new").trigger("change");
    	$("input[name='start'], input[name='end'], #opcr").val("");
    });

	/* OPCR FORM (VALIDATE) -- Check if date range is correct */
	$("#newForm").submit(function (event) {
		event.preventDefault();
		var actionUrl = $(this).attr("action-url");
		var ajaxUrl = $(this).attr("ajax-url");
		
		if ($("#form_type").val() == "new")
		{
			
			$.ajax({
	            type: "POST",
	            url: ajaxUrl,
	            data: $("#newForm").serialize(),
	            success: function (valid) {
	            	if (valid == 1)
	            		$("#newForm").attr("action", actionUrl).unbind("submit").trigger("submit");
	            	else
	            		$("#invalidMessage").text(valid).parent().show();
	            }
	        });
		}
		else
			$("#newForm").attr("action", actionUrl).unbind("submit").trigger("submit");
	})

	/* OUTPUT FORM (NEW) -- Reset form */
	$("#addOutput").click(function () {
		var actionUrl = $(this).attr("action-url");
		var validateUrl = $(this).attr("validate-url");

		$("#outputModalLabel").text("New Output");
		$("#outputForm").attr("action-url", actionUrl).attr("ajax-url", validateUrl);
    	$("#invalidMessage").text("").parent().hide();
    	$("#output-id").removeAttr("name");
		$("#category, #output, .style_1, .style_2").val("");
		$("#deleteOutput").hide();
		$("input[type=submit]").val("Add");

		$("a[href='#style1']").parent().addClass("active");
		$("#style1").addClass("active");
		$(".style_1").attr("required", "");
		$("a[href='#style2']").parent().removeClass("active");
		$("#style2").removeClass("active");
		$(".style_2").val("").removeAttr("required");
	});

	/* OUTPUT FORM  (UPDATE) -- Set form for editing */
	$("a#updateOutput").click(function () {
		var actionUrl = $(this).attr("action-url");
		var ajaxUrl = $(this).attr("ajax-url");
		var validateUrl = $(this).attr("validate-url");
		var outputId = $(this).attr("output-id");

		$.ajax({
			type: "POST",
			url: ajaxUrl,
			data: "output_ID=" + outputId,
			dataType: "json",
			success:function (data) {
				$("#outputModalLabel").text("Edit Output");
				$("#outputForm").attr("action-url", actionUrl).attr("ajax-url", validateUrl);
				$("#invalidMessage").parent().hide();
				$("#output-id").attr("name", "output_ID").val(data["output_ID"]);
				$("#category").val(data["category_ID"]);
				$("#output").val(data["output"]);
				$("#deleteOutput").attr("output-id", data["output_ID"]).show();
				$("input[type=submit]").val("Save");

				if (data["indicators"])
				{
					$("a[href='#style2']").parent().addClass("active");
					$("#style2").addClass("active");
					$(".style_2").val(data["indicators"]).attr("required", "");

					$("a[href='#style1']").parent().removeClass("active");
					$("#style1").removeClass("active");
					$(".style_1").val("").removeAttr("required");
				}
				else
				{
					$("a[href='#style1']").parent().addClass("active");
					$("#style1").addClass("active");
					$("textarea[name='targets']").val(data['targets']);
					$("textarea[name='measures']").val(data['measures']);
					$(".style_1").attr("required", "");

					$("a[href='#style2']").parent().removeClass("active");
					$("#style2").removeClass("active");
					$(".style_2").val("").removeAttr("required");
				}
			}
		});
	});

	/* OUTPUT FORM -- Success indicator style selector */
	$("#style a").click(function ()
	{
		var style = $(this).attr("href");
		if (style == "#style1")
		{
			$(".style_1").attr("required", "");
			$(".style_2").val("").removeAttr("required");
		}
		else
		{
			$(".style_2").attr("required", "");
			$(".style_1").val("").removeAttr("required");
		}
	});

	/* OUTPUT FORM (VALIDATE) -- Check if unique */
	$("#outputForm").submit(function (event) {
		event.preventDefault();
		var actionUrl = $(this).attr("action-url");
		var ajaxUrl = $(this).attr("ajax-url");

		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#outputForm").serialize(),
            success: function (valid) {
				if (valid == 1)
            		$("#outputForm").attr("action", actionUrl).unbind("submit").trigger("submit");
            	else
            		$("#invalidMessage").text("This output seems to be a duplicate.").parent().show();
            }
        });
	})

	/* INDICATOR FORM (UPDATE) -- Set form for editing */
	$("td.editOutputIndicator").editable("",
	{
        onsubmit: function (settings) {
            settings.target = $("td.editOutputIndicator").attr("ajax-url");
        },
		name		: 'indicators',
		id			: 'output_ID',
		type		: 'textarea',
		submit		: 'Save',
		event		: 'dblclick',
		onblur		: 'ignore',
		cssclass	: 'edit_output',
		tooltip		: 'Double click to edit',
    });

	/* OUTPUT FORM (IPCR/OPCR) -- List of output depends on selected category */
	$("#categoryOutputId").change(function () {
		var ajaxUrl = $(this).attr("ajax-url");
		var categoryId = $(this).val();
        var opcrId = $(this).attr("opcr-id");

        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: "category_ID=" + categoryId + "&opcr_ID=" + opcrId,
			dataType: "json",
            success:function (options) {
            	if (options.length == 0) {
            		$("select#outputId").html("").trigger("change").prop("disabled", true);
            		$("input#outputSubmit").prop("disabled", true);
            	}
            	else {
	        		var newOptions = "";

					for (var i = 0; i < options.length; i++) {
						newOptions += "<option value=\"" + options[i].output_ID + "\">" + options[i].output + "</option>";
					}

					$("select#outputId").html(newOptions).trigger("change").prop("disabled", false);
					$("input#outputSubmit").prop("disabled", false);
            	}
            }
        });
	});
	
	/* OPCR-RATE FORM -- Reset form */
    $("#rateOutput").click(function () {
    	$("#categoryOutputId").val("");
    	$("#outputId").html("<option>Select</option>").prop("disabled", true);
    	$("#indicators, #accountable, #actual_accom").text("").prop("disabled", true);
    	$("input#r_quantity, input#r_efficiency, input#r_timeliness").rating('update', 0).rating("refresh", {disabled: true});
    	$("#remarks").val("").prop("disabled", true);
    });

	/* OPCR-RATE FORM -- Set form for rating/editing */
	$(".rateOutputId").change(function () {
		var ajaxUrl = $(this).attr("ajax-url");
        var outputId = $(this).val();

        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: 'output_ID=' + outputId,
		    dataType: "json",
            success:function (data) {
            	$("#indicators").text(data['indicators']).prop("disabled", false);
            	$("#accountable").text(data['accountable']).prop("disabled", false);
            	$("#actual_accom").text(data['actual_accom']).prop("disabled", false);
            	$("input#r_quantity").rating('update', data['r_quantity']).rating("refresh", {disabled: false});
            	$("input#r_efficiency").rating('update', data['r_efficiency']).rating("refresh", {disabled: false});
            	$("input#r_timeliness").rating('update', data['r_timeliness']).rating("refresh", {disabled: false});
            	$("#remarks").val(data['remarks']).prop("disabled", false);
            },
            error: function () {
            	$("#outputId").html("<option>Select</option>").prop("disabled", true);
		    	$("#indicators, #accountable, #actual_accom").text("").prop("disabled", true);
		    	$("input#r_quantity, input#r_efficiency, input#r_timeliness").rating('update', 0).rating("refresh", {disabled: true});
		    	$("#remarks").val("").prop("disabled", true);
		    	// $("#ipcrAttachment").fileinput('clear').fileinput("disable");
            }
        });
	});

	/* OPCR-RATE FORM -- Check if form is complete */
	$("#rateOpcrForm").submit(function (event) {
		event.preventDefault();
		var actionUrl = $(this).attr("action-url");
		var ajaxUrl = $(this).attr("ajax-url");
		
		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#rateOpcrForm").serialize(),
            success: function (valid) {
            	if (valid == 1)
            		$("#rateOpcrForm").attr("action", actionUrl).unbind("submit").trigger("submit");
            	else
            		$("#invalidMessage").html(valid).parent().show();
            }
        });
	});

	/* TARGET FORM (UPDATE) -- Set form for editing */
	$("td.editTarget").editable("",
	{
        onsubmit: function (settings) {
            settings.target = $("td.editTarget").attr("ajax-url");
        },
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

	/* INDICATOR FORM (UPDATE) -- Set form for editing */
	$("td.editTargetIndicator").editable("",
	{
        onsubmit: function (settings) {
            settings.target = $("td.editTarget").attr("ajax-url");
        }, 
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

	/* IPCR-RATE FORM -- List of targets depends on selected category */
	$("#categoryTargetId").change(function () {
		var ajaxUrl = $(this).attr("ajax-url");
        var categoryId = $(this).val();
		var ipcrId = $(this).attr("ipcr-id");
        
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: 'category_ID=' + categoryId + '&ipcr_ID=' + ipcrId,
		    dataType: "json",
            success:function (options) {
            	if (options.length == 0) {
            		$("#targetId").html("").trigger("change").prop("disabled", true);
            		$("#targetSubmit").prop("disabled", true);
            	}
            	else {
	        		var newOptions = "";

					for (var i = 0; i < options.length; i++) {
						newOptions += "<option value=\"" + options[i].target_ID + "\">" + options[i].target_details + "</option>";
					}

					$("#targetId").html(newOptions).trigger("change").prop("disabled", false);
					$("#targetSubmit").prop("disabled", false);
            	}
            }
        });
    });
	
	/* IPCR-RATE FORM -- Reset form */
    $("#rateTarget").click(function () {
    	$("#categoryTargetId").val("");
    	$("#targetId").html("<option>Select</option>").prop("disabled", true);
    	$("#indicators, #actual_accom").text("").prop("disabled", true);
    	$("input#r_quantity, input#r_efficiency, input#r_timeliness").rating('update', 0).rating("refresh", {disabled: true});
    	$("#remarks").val("").prop("disabled", true);
    	$("#ipcrAttachment").fileinput("refresh", {
		    overwriteInitial: true,
		});
    	$("#ipcrAttachment").fileinput("clear");
    	$("#ipcrAttachment").fileinput("disable");
    });

	/* IPCR-RATE FORM -- Set form for rating/editing */
	$("#targetId").change(function () {
		var ajaxUrl = $(this).attr("ajax-url");
        var targetId = $(this).val();

        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: 'target_ID=' + targetId,
		    dataType: "json",
            success:function (data) {
            	$("#indicators").text(data['indicators']);
            	$("#actual_accom").text(data['actual_accom']).prop("disabled", false);
            	$("input#r_quantity").rating('update', data['r_quantity']).rating("refresh", {disabled: false});
            	$("input#r_efficiency").rating('update', data['r_efficiency']).rating("refresh", {disabled: false});
            	$("input#r_timeliness").rating('update', data['r_timeliness']).rating("refresh", {disabled: false});
            	$("#remarks").val(data['remarks']).prop("disabled", false);
		    	$("#ipcrAttachment").fileinput("enable");

				if (data['attachment']) {
	        		var display = new Array();

					for (var i = 0; i < data['attachment'].length; i++) {
						display.push("<img src=\"" + data['attachment'][i]['directory'] + "\" class=\"file-preview-image\" title=\"" + data['attachment'][i]['file'] + "\">");
					}

	            	$("#ipcrAttachment").fileinput('refresh', {
						initialPreview: display,
					    overwriteInitial: false,
					});
					$("#ipcrAttachment").prop("required", false).attr("readonly", "true");
					$("#ipcrAttachmentNote").text("Previous attachment(s) can't be removed.");
				}      	
            },
            error: function () {
            	$("#targetId").html("<option>Select</option>").prop("disabled", true);
		    	$("#indicators, #actual_accom").text("").prop("disabled", true);
		    	$("input#r_quantity, input#r_efficiency, input#r_timeliness").rating('update', 0).rating("refresh", {disabled: true});
		    	$("#remarks").val("").prop("disabled", true);
		    	$("#ipcrAttachment").fileinput('clear').fileinput("disable");
            }
        });
	});

	/* IPCR-RATE FORM -- Check if form is complete */
	$("#rateIpcrForm").submit(function (event) {
		event.preventDefault();
		var actionUrl = $(this).attr("action-url");
		var ajaxUrl = $(this).attr("ajax-url");
		
		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#rateIpcrForm").serialize(),
            success: function (valid) {
            	// alert(valid);
            	if (valid == 1)
            		$("#rateIpcrForm").attr("action", actionUrl).unbind("submit").trigger("submit");
            	else
            		$("#invalidMessage").html(valid).parent().show();
            }
        });
	});

	/* ==================================== *
    *                                       *
    *                  CUMA                 *
    *                                       *
    * ===================================== */

	/* CUMA FORM (NEW) -- Reset form */
    $("#new-cuma").click(function () {
    	$("#invalidMessage").text("").parent().hide();
    	$("input[name='start'], input[name='end']").val("");
    });

	/* CUMA FORM (VALIDATE) -- Check if date range is correct */
	$("#newCumaForm").submit(function (event) {
		event.preventDefault();
		var actionUrl = $(this).attr("action-url");
		var ajaxUrl = $(this).attr("ajax-url");
		
		$.ajax({
            type: "POST",
            url: ajaxUrl,
            data: $("#newCumaForm").serialize(),
            success: function (valid) {
            	if (valid == 1)
            		$("#newCumaForm").attr("action", actionUrl).unbind("submit").trigger("submit");
            	else
            		$("#invalidMessage").text(valid).parent().show();
            }
        });
	})

	/* CUMA FORM (DRAFT) -- Show previous page */
	$("#prevPage").click(function () {
		var element = $("#inputData").attr("current");
		var current = parseInt(element, 10);
		var next = current - 1;

		if (current > 1) {
			blockPreview();
			showPrev(next);
		}

		if (current == 2)
			$("#prevPage").parent().addClass("disabled");
		else if (current == 9)
		{
			$(".submit").hide();
			$(".form").show();
			$("#nextPage").parent().removeClass("disabled");
		}
	});

	/* CUMA FORM (DRAFT) -- Show next page */
	$("#nextPage").click(function () {
		var element = $("#inputData").attr("current");
		var current = parseInt(element, 10);
		var next = current + 1;
		
		if (current <= 8) {
			blockPreview();
			showNext(next);
		}
			
		if (current == 1)
			$("#prevPage").parent().removeClass("disabled");
		else if (current == 8)
			$("#nextPage").parent().addClass("disabled");
	});

	$(".editSet").editable("",
	{
        name		: 'average_set',
		type		: 'text',
		submit		: 'Save',
		event		: 'dblclick',
		onblur		: 'cancel',
		cssclass	: 'edit_number',
		placeholder : $(".editSet").attr("value"),
		onsubmit	: function (settings) {
			settings.target = $(".editSet").attr("ajax-url");
		},
		callback	: function (value) {
			$(this).attr("value", value);
			$(this).next().show();
		}
	});

	$(".editStudents").editable("",
	{
		name		: 'students_mentored',
		type		: 'text',
		submit		: 'Save',
		event		: 'dblclick',
		onblur		: 'cancel',
		cssclass	: 'edit_number',
		placeholder : $(".editStudents").attr("value"),
		onsubmit	: function (settings) {
			$(".editStudents").find("input").number(true);
			settings.target = $(".editStudents").attr("ajax-url");
		},
		callback	: function (value) {
			$(this).attr("value", value);
			$(this).next().show();
		}
	});

	$("span#editButton").click(function (event) {
		var target = $(this).prev();
		var value = target.attr("value");

		if (value == 'Not Available')
			value = 0;

		target.trigger("dblclick");
		
		if (target.attr("class") == "editSet")
			target.find("input").number(true, 2).val(value).prop("required", true);
		else
			target.find("input").number(true).val(value).prop("required", true);

		$(this).hide();
	});

	// Character counter for message
	$('#message').keyup(function () {
		var max = 255;
		var len = $(this).val().length;
		var remaining = max - len;

		if (len < max)
			$('#charRemaining').html('You have <strong>' + remaining + '</strong> characters left.');
		else
			$('#charRemaining').html('You have reached the limit.');

		if(remaining <= 10)
			$("#charRemaining").css("color","red");
		else
			$("#charRemaining").css("color","black");
    });

	$("#current_password").keyup(function () {
		var password = $(this).val();

        $.ajax({
            type: "POST",
            url: "/up-oams/index.php/ajax/check_password",
            data: 'password=' + password,
            success:function (correct){
                if(correct)
                {
			    	$("div.current_password").removeClass("has-error has-feedback").addClass("has-success has-feedback");
			    	$("#checkIcon").removeClass("glyphicon glyphicon-remove form-control-feedback").addClass("glyphicon glyphicon-ok form-control-feedback");
			    	$("#passwordCheck").html("");
			    }
			    else
			    {
			    	$("div.current_password").removeClass("has-success has-feedback").addClass("has-error has-feedback");
			    	$("#checkIcon").removeClass("glyphicon glyphicon-ok form-control-feedback").addClass("glyphicon glyphicon-remove form-control-feedback");
			    	$("#passwordCheck").html("Wrong password.");
			    }
            }
        });
	});

	$("#new_password").keyup(function ()
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

    $("#confirm_password").keyup(function ()
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
	$('#addCategory').click(function ()  //on add input button click
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
	$("body").on("click", ".removeCategory", function () //user click on remove text
	{
		$(this).parent().parent().parent().remove(); //remove input field
	});

});