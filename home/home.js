

$('#login_button').click(function(){
    submit();
});

function updateFeedback(text,color='black'){
    $('#feedback_display').text(text);
    $('#feedback_display').css('color', color);
}



function submit(){
    pword = $('input[name="password"]').val();
    username = $('input[name="username"]').val();

    $.ajax({
        type: "POST",
        url: "loginValidation.php",
        data: {
            username: username,
            password: pword
        },
        success: function(response){
            response = JSON.parse(response);
            if(response['isValid'] == false){
                updateFeedback(response['feedback'], 'red');
            }else{
                window.location = '../portal/order.php';
            }
        },
        error: function(response){
            updateFeedback('Something went wrong', 'black');
        }
    });
}


