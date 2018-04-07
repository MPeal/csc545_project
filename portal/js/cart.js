if(window.localStorage['cart']){
    buildCartDisplay()
        .done(function(){
            setInterval(bindItemQuantityKeyupEvent, 100);
        });
}else{
    $('#cart-items-container').html('You do not have any items in your cart!<br><br>Hit "Back to Order" to get started!');
}

function bindItemQuantityKeyupEvent(){
    $('.item-quantity-textbox').off().on('keyup', function(){
        rebuildCart();
        rebuildCartDisplay();
    });
}

function isInCart(itemId){
    if(window.localStorage['cart']){
        var cart = JSON.parse(window.localStorage['cart']);

        for(var i =0; i < cart.items.length; i++){
            var item = cart.items[i];
            if(item.itemId === itemId){
                return true;
            }
        }
        return false;
    }else{
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
    cart.total = newTotal;
    window.localStorage['cart'] = JSON.stringify(cart);
}

function rebuildCart(){
    var cart = JSON.parse(window.localStorage['cart']);
    var itemBoxes = $('.item-quantity-textbox');
    for(var i=0; i<itemBoxes.length; i++){
        var item = itemBoxes[i];
        var category = $(item).attr('data-category');
        var itemId = $(item).attr('data-itemid');
        var name = $(item).attr('data-itemname');
        var price = $('.item-price-hidden[data-itemid='+itemId+']').val();
        var itemTotal = price * $(item).val();
        var obj = {
            itemId: itemId,
            name: name,
            category: category,
            price: price,
            quantity: $(item).val()
        };

        var added = false;
        if(obj.quantity > 0 || isInCart(itemId)){
            //replace instances of items we may be just updating instead of adding to cart
            for(var j =0; j < cart.items.length; j++){
                var it = cart.items[j];
                if(it.itemId === itemId){
                    cart.items[j] = obj;
                    added = true;
                }
            }
            if(!added){
                cart.items.push(obj);
            }
        }
    }
    window.localStorage['cart'] = JSON.stringify(cart);
    updateCartTotal();
}

function buildCartDisplay(){
    var dfd = new $.Deferred();
    var cart = JSON.parse(window.localStorage['cart']);
    var items = cart.items;
    var html = "";
    var total = 0;
    for(var i = 0; i < items.length; i++){
        var item = items[i];
        html += buildItemRow(item);
    }
    $('#cart-items-container').html(html);
    $('#order-total-box').val(Math.round((cart.total * 100) / 100).toFixed(2));
    dfd.resolve();
    return dfd;
}

function rebuildCartDisplay(){
    var dfd = new $.Deferred();
    var cart = JSON.parse(window.localStorage['cart']);
    var items = cart.items;
    var html = "";
    var total = 0;
    for(var i = 0; i < items.length; i++){
        var item = items[i];
        html += buildItemRow(item);
    }
    $('#cart-items-container').html(html);
    $('#order-total-box').val(Math.round((cart.total * 100) / 100).toFixed(2));
    dfd.resolve();
    return dfd;
}

function buildItemRow(row){
    var html = "<div class='row' data-itemid="+row.itemId+">";
    html += "<div class='col-md-3'>"+row.name+"</div>";
    html += "<div class='col-md-3 item-price'>"+row.price+"</div>";
    html += "<input type='hidden' class='item-price-hidden' data-itemid="+row.itemId+" value="+row.price+">";
    html += "<div class='col-md-3'><input type='text' data-category="+row.category+" data-itemname='"+row.name+"' data-itemid="+row.itemId+" class='item-quantity-textbox' value="+row.quantity+" id='item-quantity-"+row.itemId+"'></div>";
    html += "</div>";

    return html;
}