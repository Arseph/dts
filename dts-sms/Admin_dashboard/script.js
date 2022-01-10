
$(document).ready(function() {

		// form autocomplete off		
		$(":input").attr('autocomplete', 'off');

		// remove box shadow from all text input
		$(":input").css('box-shadow', 'none');



		// save button click function
		$("#updatebtn").click(function() {

			// calling validate function
			var response =  validateForm();

			// if form validation fails			
			if(response == 0) {
				return;
			}


			// getting all form data
			var firstname     =   $("#firstname").val();
			var lastname      =   $("#lastname").val();
			var username  =   $("#username").val();


			// sending ajax request
			$.ajax({

				url: './addUserFunction.php',
				type: 'post',
				data: {
						 'firstname' : firstname, 
					     'lastname': lastname,
					     'username' : username,
					     'save' : 1
					},

				// before ajax request
				beforeSend: function() {
					$("#result").html("<p class='text-success'> Please wait.. </p>");
				},	

				// on success response
				success:function(response) {
					$("#result").html(response);

					// reset form fields
					$("#regForm")[0].reset();
				},

				// error response
				error:function(e) {
					$("#result").html("Some error encountered.");
				}

			});
		});




	// ------------- form validation -----------------

		function validateForm() {

			// removing span text before message
			$("#error").remove();


			// validating input if empty
			if($("#firstname").val() == "") {
				$("#firstname").after("<span id='error' class='text-danger'> Enter your firstname </span>");
				return 0;
			}

			if($("#lastname").val() == "") {
				$("#lastname").after("<span id='error' class='text-danger'> Enter your lastname </span>");
				return 0;
			}

			if($("#username").val() == "") {
				$("#username").after("<span id='error' class='text-danger'> Enter your username </span>");
				return 0;
			}

			return 1;

		}


	// ------------------- [ Email blur function ] -----------------

		$("#username").blur(function() {

			var username  		= 		$('#username').val();

			// if email is empty then return
			if(username == "") {
				return;
			}


			// send ajax request if email is not empty
			$.ajax({
					url: 'process.php',
					type: 'post',
					data: {
						'username':username,
						'email_check':1,
				},

				success:function(response) {	

					// clear span before error message
					$("#email_error").remove();

					// adding span after email textbox with error message
					$("#username").after("<span id='email_error' class='text-danger'>"+response+"</span>");
				},

				error:function(e) {
					$("#result").html("Something went wrong");
				}

			});
		});


	// -----------[ Clear span after clicking on inputs] -----------

	$("#firstname").keyup(function() {
		$("#error").remove();
	});


	$("#lastname").keyup(function() {
		$("#error").remove();
	});
	

	$("#username").keyup(function() {
		$("#error").remove();
		$("span").remove();
	});

});