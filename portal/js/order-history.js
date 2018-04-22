getOrders();

function getOrders(){
    $.ajax({
        url: '../ajax/ajaxhandler.php',
        type: 'POST',
        data: {
            isMongo: true,
            action: 'getOrders'
        },
        success: function(response){
            response = JSON.parse(response);
            var orders = response.docs;
            var html = "";

            if(orders.length > 0){
                for(var i = 0; i < orders.length; i++){
                    var order = orders[i];
                    var date = order.date;
                    date = new Date(date);
                    var total = order.total;
                    var id = order._id['$id'];

                    html += "<div class='row'>";

                    html += "<div class='col-md-4'>";
                    html += "<a href='vieworder.php?id="+id+"'>Order "+id+"</a>";
                    html += "</div>";

                    html += "<div class='col-md-4'>";
                    html += date.toDateString();
                    html += "</div>";

                    html += "<div class='col-md-4'>";
                    html += "$"+total;
                    html += "</div>";

                    html += "</div>";
                }

                $('#orders-container').html(html);
            }
            $('#orders-container').show();
        }
    })
}