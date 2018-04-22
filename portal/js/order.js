loadCategories();
bindEvents();

var orderTotal = 0;
var currentCatTotal = 0;

function bindEvents() {
    $('#category-select').on('change', function () {
        getItemsByCategory()
            .done(function () {
                setInterval(function () {
                    bindItemQuantityKeyupEvent();
                    updateTotal();
                }, 100);
            });
    });

    $('#add-items-btn').on('click', function () {
        if (window.localStorage['cart']) {
            updateCart();
        } else {
            createCart();
        }
    });
}

function bindItemQuantityKeyupEvent() {
    $('.item-quantity-textbox').on('keyup', function (e) {
        updateTotal();
    });
}

function updateCart() {
    var cart = JSON.parse(window.localStorage['cart']);
    var itemBoxes = $('.item-quantity-textbox');
    for (var i = 0; i < itemBoxes.length; i++) {
        var item = itemBoxes[i];
        var category = $('#category-select').val();
        var itemId = $(item).attr('data-itemid');
        var name = $(item).attr('data-itemname');
        var price = $('.item-price-hidden[data-itemid=' + itemId + ']').val();
        var itemTotal = price * $(item).val();
        var obj = {
            itemId: itemId,
            name: name,
            category: category,
            price: price,
            quantity: $(item).val()
        };

        var added = false;
        if (obj.quantity > 0 || isInCart(itemId)) {
            //replace instances of items we may be just updating instead of adding to cart
            for (var j = 0; j < cart.items.length; j++) {
                var it = cart.items[j];
                if (it.itemId === itemId) {
                    cart.items[j] = obj;
                    added = true;
                }
            }
            if (!added) {
                cart.items.push(obj);
            }
        }
    }
    window.localStorage['cart'] = JSON.stringify(cart);
    updateCartTotal();
}

function isInCart(itemId) {
    if (window.localStorage['cart']) {
        var cart = JSON.parse(window.localStorage['cart']);

        for (var i = 0; i < cart.items.length; i++) {
            var item = cart.items[i];
            if (item.itemId === itemId) {
                return true;
            }
        }
        return false;
    } else {
        return false;
    }
}

function updateCartTotal() {
    var cart = JSON.parse(window.localStorage['cart']);
    var newTotal = 0;
    var items = cart.items;
    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        var cost = item.price * item.quantity;
        newTotal += cost;
    }
    cart.total = parseFloat(newTotal).toFixed(2);
    window.localStorage['cart'] = JSON.stringify(cart);
}

function createCart() {
    var itemBoxes = $('.item-quantity-textbox');
    var cart = {};
    var items = [];
    var cartTotal = 0;
    for (var i = 0; i < itemBoxes.length; i++) {
        var item = itemBoxes[i];
        var category = $('#category-select').val();
        var itemId = $(item).attr('data-itemid');
        var name = $(item).attr('data-itemname');
        var price = $('.item-price-hidden[data-itemid=' + itemId + ']').val();
        var itemTotal = price * $(item).val();
        var obj = {
            itemId: itemId,
            name: name,
            category: category,
            price: price,
            quantity: $(item).val()
        };
        if (obj.quantity > 0) {
            items.push(obj);
        }
        cartTotal += itemTotal;
    }
    cart.items = items;
    cart.total = parseFloat(cartTotal).toFixed(2);
    window.localStorage['cart'] = JSON.stringify(cart);
}

/**
 * live-update total on quantity box entry
 */
function updateTotal() {
    currentCatTotal = 0;
    var quantityBoxes = $('.item-quantity-textbox');

    for (var i = 0; i < quantityBoxes.length; i++) {
        var item = quantityBoxes[i];
        var itemId = $(item).attr('data-itemid');
        var price = $('.item-price-hidden[data-itemid=' + itemId + ']').val();
        var quantity = parseInt($(item).val());
        if (isNaN(quantity) || quantity < 0) {
            quantity = 0;
            $(item).val(0);
        }
        currentCatTotal += price * quantity;
    }
    currentCatTotal = parseFloat((currentCatTotal * 100) / 100).toFixed(2);
    $('#order-total-box').val(currentCatTotal);
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

function getItemsByCategory() {
    var dfd = new $.Deferred();
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
        success: function (response) {
            response = JSON.parse(response);
            var html = "";
            response.forEach(function (row) {
                if (isInCart(row.id)) {
                    var quantity = getQuantityInCartByItemId(row.id);
                    html += buildItemRow(row, quantity);
                } else {
                    html += buildItemRow(row);
                }
            });

            $('#items-info-header-row').nextAll().remove();
            targetContainer.append(html);
            $('#order-total-row').show();
            $('#order-bottom-btns-row').show();
        }
    });
    dfd.resolve(true);
    return dfd;
}

function getQuantityInCartByItemId(itemId) {
    var cart = JSON.parse(window.localStorage['cart']);

    var items = cart.items;
    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        if (item.itemId === itemId) {
            return item.quantity;
        }
    }
}

function buildItemRow(row, quantity) {
    quantity = quantity || 0;
    var html = "<div class='row' data-itemid=" + row.id + ">";
    html += "<div class='col-md-3'>" + row.name + "</div>";
    html += "<div class='col-md-3'>" + row.quantity + "</div>";
    html += "<div class='col-md-3 item-price'>" + row.price + "</div>";
    html += "<input type='hidden' class='item-price-hidden' data-itemid=" + row.id + " value=" + row.price + ">";
    html += "<div class='col-md-3'><input type='text' data-itemname='" + row.name + "' data-itemid=" + row.id + " class='item-quantity-textbox' value=" + quantity + " id='item-quantity-" + row.id + "'></div>";
    html += "</div>";

    return html;
}