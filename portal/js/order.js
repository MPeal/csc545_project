loadCategories();

$('#category-select').on('change', function(){
   getItemsByCategory();
});

/**
 * loadCategories called on pageload
 * populates category select dropdown with different item categories
 */
function loadCategories() {
    var select = $('#category-select');

    $.ajax({
        url: "../ajax/ajaxhandler.php",
        type: "post",
        data: {
            action: "getCategories"
        },
        success: function (response) {
            response = JSON.parse(response);

            /**
             * for each category name, build an append an option element to the category select box
             */
            response.forEach(function (category) {
                var element = "<option value=" + category['id'] + ">" + category['name'] + "</option>";
                select.append(element);
            });
        }
    });
}

function getItemsByCategory(){
    var targetContainer = $('#items-info-container');
    var categoryId = $('#category-select').val();
    var params = {categoryId: categoryId};

    $.ajax({
       type: "POST",
       url: "../ajax/ajaxhandler.php",
        data: {
           action: 'getItemsByCategory',
            params: params
        },
        success: function(response){
           response = JSON.parse(response);
           var html = "";
           response.forEach(function(row){
               html += buildItemRow(row);
           });

           $('#items-info-header-row').nextAll().remove();
           targetContainer.append(html);
        }
    });
}

function buildItemRow(row){
    var html = "<div class='row'>";
    html += "<div class='col-md-3'>"+row.name+"</div>";
    html += "<div class='col-md-3'>"+row.quantity+"</div>";
    html += "<div class='col-md-3'>"+row.price+"</div>";
    html += "<div class='col-md-3'><input type='text' class='item-quantity-textbox' id='item-quantity"+row.id+"'></div>";
    html += "</div>";

    return html;
}