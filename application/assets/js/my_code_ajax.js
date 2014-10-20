$(document).ready(function () {
	/* PROFILE FORM (NEW) -- Reset form */
	$("#newProfile").click(function () {
		var url = $(this).attr("url");

		$("#modalProfileLabel").text("New Profile");
		$("#invalidMessage").parent().hide();
		$("#adminType, #facultyType").prop("checked", false);
		$("#user-id, #empcode, #fname, #mname, #lname, #datepicker .input-group.date, #fcode, #rank, #program-id, #position").val("");
		$("input[type=submit]").val("Add");
        $("#profileForm").attr("url", url);
	});

	/* PROFILE FORM (UPDATE) -- Set form for editing */
	$("#updateProfile").click(function () {
		var url = $(this).attr("url");
		var user_ID = $(this).attr("key");

		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/user_details",
			data: "user_ID=" + user_ID,
			dataType: "json",
			success:function (data) {
				$("#modalProfileLabel").text("Update Profile");
				$("#invalidMessage").parent().hide();
				$("#user-id").val(data["user_ID"]);
				$("#empcode").val(data["empcode"]);
				$("#fname").val(data["fname"]);
				$("#mname").val(data["mname"]);
				$("#lname").val(data["lname"]);
				$("#datepicker .input-group.date").datepicker("setDate", data["birthday"]).datepicker("fill");
				$("input[type=submit]").val("Save");
				$("#profileForm").attr("url", url);

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
	$("#profileForm").on("submit", function (event) {
		event.preventDefault();

		if ($("input[type=submit]").val() == "Add")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/new_user";
		else if ($("input[type=submit]").val() == "Save")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/edit_user";

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

	/* COLLEGE FORM (NEW) -- Reset form */
	$("#newCollege").click(function () {
		var url = $(this).attr("url");

		$("#myModalLabel").text("New College");
		$("#invalidMessage").parent().hide();
		// change to $("#collegeForm input").val("");
		$("#college-id, #college-college, #college-short, #college-dean").val("");
        $("input[type=submit]").val("Add");
        $("#collegeForm").attr("url", url);
	});

	/* COLLEGE FORM (UPDATE) -- Set form for editing */
	$("a#updateCollege").click(function () {
		var url = $(this).attr("url");
		var college_ID = $(this).attr("key");

		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/college_details",
			data: "college_ID=" + college_ID,
			dataType: "json",
			success:function (data) {
				$("#myModalLabel").text("Update College");
				$("#invalidMessage").parent().hide();
				$("#college-id").val(data["college_ID"]);
				$("#college-college").val(data["college"]);
				$("#college-short").val(data["short"]);
				$("#college-dean").val(data["user_ID"]);
				$("input[type=submit]").val("Save");
				$("#collegeForm").attr("url", url);
			}
		});
    });

	/* COLLEGE FORM (VALIDATE) -- Check if everything is unique */
	$("#collegeForm").on("submit", function (event) {
		event.preventDefault();

		if ($("input[type=submit]").val() == "Add")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/new_college";
		else if ($("input[type=submit]").val() == "Save")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/edit_college";

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
		$("#invalidMessage").parent().hide();
		// change to $("#departmentForm input").val("");
		$("#department-college, #department-chair, #department-id, #department-department, #department-short").val("");
        $("input[type=submit]").val("Add");
        $("#departmentForm").attr("url", url);
	});

	/* DEPARTMENT FORM (UPDATE) -- Set form for editing */
	$("a#updateDepartment").click(function () {
		var url = $(this).attr("url");
		var department_ID = $(this).attr("key");

        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/department_details",
            data: "department_ID=" + department_ID,
		    dataType: "json",
            success:function (data) {
				$("#myModalLabel").text("Update Department");
				$("#invalidMessage").parent().hide();
                $("#department-id").val(data["department_ID"]);
                $("#department-college").val(data["college_ID"]);
                $("#department-department").val(data["department"]);
                $("#department-short").val(data["short"]);
                $("#department-chair").val(data["user_ID"]);
		        $("input[type=submit]").val("Save");
		        $("#departmentForm").attr("url", url);
            }
        });
    });

	/* DEPARTMENT FORM (VALIDATE) -- Check if everything but college_ID is unique */
	$("#departmentForm").on("submit", function (event) {
		event.preventDefault();

		if ($("input[type=submit]").val() == "Add")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/new_department";
		else if ($("input[type=submit]").val() == "Save")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/edit_department";

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
        $("input[type=submit]").val("Add");
        $("#programForm").attr("url", url);
	});

	/* PROGRAM FORM (VALIDATE) -- Check if program names (complete, short, initials) are unique */
	$("#programForm").on("submit", function (event) {
		event.preventDefault();

		if ($("input[type=submit]").val() == "Add")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/new_program";
		else if ($("input[type=submit]").val() == "Save")
			var ajaxUrl = "/oamsystem/index.php/ajax/unique/edit_program";

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
		var college_ID = $(this).val();
        
        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/college_departments",
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

	/* MESSAGE -- Show message */
	$("a#showMessage").click(function () {
        var message_ID = $(this).attr("key");
        var row = "#"+message_ID;

        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/message_details",
            data: 'message_ID=' + message_ID,
		    dataType: "json",
            success:function (data){
				$("#myModalLabel").text(data["subject"]);
                $("#message-sender").text(data["sender"]);
                $("#message-date").text(data["date"]);
                $("#message-message").text(data["message"]);

                $(row).removeClass("warning");
            }
        });
	});

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
				$("#publicationForm").attr("action", url); //change to "url" if needs ajax validation
				$("input[name=type]").prop("checked", false);
				$("#publicationDetails input").val("");
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
				$("#fund_amount, #fund_up").number();
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
				$("#materialForm").attr("action", url); //change to "url" if needs ajax validation
				$("#materialForm input").val("");
				break;
			
			case "other":
				$("h4#accom-label").text("");
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
		var url = $(this).attr("url");
		var publication_ID = $(this).attr("publication-id");
		var accom_ID = $(this).attr("accom-id");
		
		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/accom_details/pub",
			data: "accom_ID=" + accom_ID + "&accom_specID=" + publication_ID,
			dataType: "json",
			success:function (details) {
				$("#publicationForm").attr("action", url); //change to "url" if needs ajax validation
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

	/* AWARD FORM (UPDATE) -- Set form for editing */
	$("a#updateAward").click(function () {
		var url = $(this).attr("url");
		var award_ID = $(this).attr("award-id");
		var accom_ID = $(this).attr("accom-id");
		
		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/accom_details/awd",
			data: "accom_ID=" + accom_ID + "&accom_specID=" + award_ID,
			dataType: "json",
			success:function (details) {
				$("#awardForm").attr("url", url);
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
	$("#awardForm").on("submit", function (event) {
		event.preventDefault();
		
		$.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/check_date",
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
		var url = $(this).attr("url");
		var research_ID = $(this).attr("research-id");
		var accom_ID = $(this).attr("accom-id");
		
		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/accom_details/rch",
			data: "accom_ID=" + accom_ID + "&accom_specID=" + research_ID,
			dataType: "json",
			success:function (details) {
				$("#researchForm").attr("url", url);
				$("h4#accom-label").text("Edit Accomplishment");
				$("p#accom-alert").parent().hide();
				$("button#back-button").hide();
				$("input#accom-submit").val("Save");

				$("#research-id").val(details["research_ID"]);
				$("#research-title").val(details["title"]);
				$("#research-nature").val(details["nature"]);
				$("#fund_external").val(details["fund_external"]).trigger("keyup");
				$("#research-start").datepicker("setDate", details["start"]).datepicker("fill");
				$("#research-end").datepicker("setDate", details["end"]).datepicker("fill");
				
				if (details["fund_amount"])
					$("#fund_amount").val(details["fund_amount"]).trigger("keyup");
				if (details["fund_up"])
					$("#fund_up").val(details["fund_up"]).trigger("keyup");
				if (!details["fund_amount"] && !details["fund_up"])
					$("#fund_amount, #fund_up").number();

				$("input#accom-attachment").removeAttr("name");
				$("div#add-attachment").hide();
				$("div#view-attachment").html("<p class=\"form-control-static\">Attachments cannot be modified</p>" + details["attachment"]).show();
			}
		});
	});
	
	/* RESEARCH FORM (VALIDATE) -- Check if date range is correct */
    /* ========== CAN BE IMPROVED ========== */
	$("#researchForm").on("submit", function (event) {
		event.preventDefault();
		
		$.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/check_date",
            data: $("#researchForm").serialize(),
            success: function (valid) {
            	if (valid == 1) {
            		$.ajax({
			            type: "POST",
			            url: "/oamsystem/index.php/ajax/check_amount",
			            data: $("#researchForm").serialize(),
			            dataType: "json",
			            success: function (amountCheck) {
			            	if (amountCheck["invalid"]) {
								$("p#accom-alert").text("Amount is invalid.").parent().show();
			            		$(amountCheck["invalid"].key).focus();
			            	} else {
			            		$("#researchForm").attr("action", $("#researchForm").attr("url")).unbind("submit").trigger("submit");
			            	}
			            }
		           });
	            } else {
            		$("p#accom-alert").text(valid).parent().show();
            		$("#research-start").focus();
            	}
            }
        });
	});

	/* PAPER FORM (UPDATE) -- Set form for editing */
	$("a#updatePaper").click(function () {
		var url = $(this).attr("url");
		var paper_ID = $(this).attr("paper-id");
		var accom_ID = $(this).attr("accom-id");
		
		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/accom_details/ppr",
			data: "accom_ID=" + accom_ID + "&accom_specID=" + paper_ID,
			dataType: "json",
			success:function (details) {
				$("#paperForm").attr("url", url);
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
	$("#paperForm").on("submit", function (event) {
		event.preventDefault();
		
		$.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/check_date",
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
		var url = $(this).attr("url");
		var creative_ID = $(this).attr("creative-id");
		var accom_ID = $(this).attr("accom-id");
		
		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/accom_details/ctv",
			data: "accom_ID=" + accom_ID + "&accom_specID=" + creative_ID,
			dataType: "json",
			success:function (details) {
				$("#creativeForm").attr("url", url);
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
	$("#creativeForm").on("submit", function (event) {
		event.preventDefault();
		
		$.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/check_date",
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
		var url = $(this).attr("url");
		var participation_ID = $(this).attr("participation-id");
		var accom_ID = $(this).attr("accom-id");
		
		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/accom_details/par",
			data: "accom_ID=" + accom_ID + "&accom_specID=" + participation_ID,
			dataType: "json",
			success:function (details) {
				$("#participationForm").attr("url", url);
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
	$("#participationForm").on("submit", function (event) {
		event.preventDefault();
		
		$.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/check_date",
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
		var url = $(this).attr("url");
		var material_ID = $(this).attr("material-id");
		var accom_ID = $(this).attr("accom-id");
		
		$.ajax({
			type: "POST",
			url: "/oamsystem/index.php/ajax/accom_details/mat",
			data: 'accom_ID=' + accom_ID + '&accom_specID=' + material_ID,
			dataType: "json",
			success:function (details) {
				$("#materialForm").attr("action", url); //change to "url" if needs ajax validation
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
	})

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

	// Success indicator style
	$("#style a").click(function ()
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
		cssclass	: 'edit_output',
		tooltip		: 'Double click to edit',
     });

	$('td.editOutputIndicator').editable('/oamsystem/index.php/faculty/opcr/edit/indicator',
	{
		name		: 'indicators',
		id			: 'output_ID',
		type		: 'textarea',
		submit		: 'Save',
		event		: 'dblclick',
		onblur		: 'ignore',
		cssclass	: 'edit_output',
		tooltip		: 'Double click to edit',
     });

	$('td.editTarget').editable('/oamsystem/index.php/faculty/ipcr/edit/target',
	{
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

	$('td.editTargetIndicator').editable('/oamsystem/index.php/faculty/ipcr/edit/indicator',
	{
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

	$('#category').change(function ()
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

	$("#category_ID").change(function () {
		var ipcr_ID = $(this).attr("ipcr-id");
        var category_ID = $(this).val();
        // alert(ipcr_ID+' '+category_ID);
        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/category_targets",
            data: 'category_ID=' + category_ID + '&ipcr_ID=' + ipcr_ID,
		    dataType: "json",
            success:function (options){
                var newOptions = '';
				for (var i = 0; i < options.length; i++)
				{
					newOptions += '<option value="' + options[i].optionValue + '">' + options[i].optionText + '</option>';
				}
				$("#target_ID").html(newOptions);
            }
        });
    });

	$("#target_ID").change(function () {
        var target_ID = $(this).val();
        $.ajax({
            type: "POST",
            url: "/oamsystem/index.php/ajax/target_details",
            data: 'target_ID=' + target_ID,
		    dataType: "json",
            success:function (data){
            	$("#indicators").text(data['indicators']);
            	$("#actual_accom").text(data['actual_accom']);
            	$("#r_quantity").rating('update', data['r_quantity']);
            	$("#r_efficiency").rating('update', data['r_efficiency']);
            	$("#r_timeliness").rating('update', data['r_timeliness']);
            	$("#remarks").val(data['remarks']);
            }
        });
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
            url: "/oamsystem/index.php/ajax/abc",
            data: 'password=' + password,
            success:function (correct){
                if(correct)
                {
			    	// $("div.current_password").removeClass("has-error has-feedback");
			    	// $(this).setCustomValidity("");
			    	$("#checkIcon").removeClass("glyphicon glyphicon-remove form-control-feedback");
			    	$("#passwordCheck").html("");
			    }
			    else
			    {
			    	// $("div.current_password")addClass("has-error has-feedback");
			    	// $(this).setCustomValidity("Invalid field.")
			    	$("#checkIcon").addClass("glyphicon glyphicon-remove form-control-feedback");
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
	// // Refine - filter, sort
	// $("#refine_list").click(function ()
	// {
	// 	$("#refine_form").toggle();
	// 	$("#display_table").toggleClass("col-md-9");		
	// });

	// // No auto close
	// $('#user_filter').collapse({
	//   toggle: false
	// })
