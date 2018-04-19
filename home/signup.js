var pword = '';
var cPword = '';
var username = '';
var zip = '';
var state = '';
var city = '';
var street = '';
var fullName = '';


//set submit button to disabled to start
$('#login_button').prop('disabled', true);

$('input').keyup(function(){
	verifyForm();
});

$('#login_button').click(function(){
	submit();
});

$('input[type="password"]').keyup(function(){
	var passwordMatch = checkPasswords();
	if(passwordMatch){S
		var text = "Passwords match";
		updateFeedback(text, 'green');
	}else{
		var text = "Passwords don't match!";
		updateFeedback(text, 'red');
	}
});

function verifyForm(){
	pword = $('input[name="password"]').val();
	cPword = $('input[name="password_confirm"]').val();
	username = $('#login_username').val();
	zip = $('#registerZip').val();
    state = $('#registerState').val();
    city = $('#registerCity').val();
    street = $('#registerStreet').val();
    fullName = $('#registerName').val();




	if(pword && cPword && username && zip && city && state && street && fullName){
		var passwordsMatch = checkPasswords();
		if(passwordsMatch){
			$('#login_button').prop('disabled', false);
		}else{
			$('#login_button').prop('disabled', true);
		}
	}else{
		$('#login_button').prop('disabled', true);
	}
}

function updateFeedback(text,color='black'){
	$('#feedback_display').text(text);
	$('#feedback_display').css('color', color);
}

function checkPasswords(){
	pword = $('input[name="password"]').val();
	cPword = $('input[name="password_confirm"]').val();
	if(pword && cPword){
		if(pword === cPword){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}


function submit(){
	pword = $('input[name="password"]').val();
	cPword = $('input[name="password_confirm"]').val();
	username = $('#login_username').val();
    zip = $('#registerZip').val();
    state = $('#registerState').val();
    city = $('#registerCity').val();
    street = $('#registerStreet').val();
    fullName = $('#registerName').val();



    $.ajax({
		type: "POST",
		url: "regValidation.php",
		data: {
			username: username,
			password: pword,
            zip: zip,
            state: state,
            city: city,
            street: street,
            fullName: fullName,
		},
		success: function(response){
			console.log(response);
			if(response['isValid'] == false){
				updateFeedback(response['feedback'], 'red');
			}else{
				window.location = '../portal/index.php';
			}
		},
		error: function(response){
			updateFeedback('Something went wrong', 'red');
		}
	})
}
