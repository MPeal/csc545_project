loadCategories();
bindEvents();

var orderTotal = 0;

function bindEvents(){
    $('#category-select').on('change', function(){
        getItemsByCategory();
    });
}

function bindItemQuantityKeyupEvent(){
    $('.item-quantity-textbox').on('keyup', function(e){
        updateTotal(e);
    });
}

/**
 * live-update total on quantity box entry
 */
function updateTotal(){
    orderTotal = 0;
    var quantityBoxes = $('.item-quantity-textbox');

    for(var i=0; i < quantityBoxes.length; i++){
        var item = quantityBoxes[i];
        var itemId = $(item).attr('data-itemid');
        var price = $('.item-price-hidden[data-itemid='+itemId+']').val();
        var quantity = parseInt($(item).val());
        if(isNaN(quantity) || quantity < 0){
            quantity = 0;
            $(item).val(0);
        }
        orderTotal += price * quantity;
    }
    orderTotal = Math.round((orderTotal * 100) / 100).toFixed(2);
    $('#order-total-box').val(orderTotal);
}
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
           $('#order-total-row').show();
           $('#order-bottom-btns-row').show();
           bindItemQuantityKeyupEvent();
        }
    });
}

function buildItemRow(row){
    var html = "<div class='row' data-itemid="+row.id+">";
    html += "<div class='col-md-3'>"+row.name+"</div>";
    html += "<div class='col-md-3'>"+row.quantity+"</div>";
    html += "<div class='col-md-3 item-price'>"+row.price+"</div>";
    html += "<input type='hidden' class='item-price-hidden' data-itemid="+row.id+" value="+row.price+">";
    html += "<div class='col-md-3'><input type='text' data-itemid="+row.id+" class='item-quantity-textbox' value=0 id='item-quantity-"+row.id+"'></div>";
    html += "</div>";

    return html;
}