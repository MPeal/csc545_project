loadCategories();

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
                var element = "<option value=" + category + ">" + category + "</option>";
                select.append(element);
            });
        }
    });
}