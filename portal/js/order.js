loadCategories();


function loadCategories(){
    console.log('loading categories');
    var select = $('#category-select');

    $.ajax({
        url: "../ajax/ajaxhandler.php",
        type: "post",
        data: {
          action: "getCategories"
        },
        success: function(response){
           console.log(response);
        }
    });
}