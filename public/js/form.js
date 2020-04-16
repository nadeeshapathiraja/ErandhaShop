// Shopping cart create
var x = 0;
var z = 0;

var array = Array();
var dbarray = Array();

function add_element_to_array() {
    var sel = document.getElementById("category_id");
    var object = {
        item_id: document.getElementById("item_id").innerText,
        category_id: sel.options[sel.selectedIndex].text,
        quantity: document.getElementById("quantity").value,
        unit_price: document.getElementById("unit_price").value,
        price: document.getElementById("quantity").value * document.getElementById("unit_price").value,
        // total_price: document.getElementById("quantity").value * document.getElementById("unit_price").value,
    }
    var i;
    for (i = 0; i < add_element_to_array.length; i++) {
        total_price += add_element_to_array[5];
    }
    array.push(object)
    x++;
    z++;

    var dbobject = {
        item_id: document.getElementById("item_id").value,
        category_id: document.getElementById("category_id").value,
        quantity: document.getElementById("quantity").value,
        unit_price: document.getElementById("unit_price").value,
        price: document.getElementById("quantity").value * document.getElementById("unit_price").value,
        // total_price: document.getElementById("quantity").value * document.getElementById("unit_price").value,
    }
    dbarray.push(object)
}


function display_array() {
    var table = document.getElementById("itemTable");
    var tableBody = document.getElementById("itemTableBody");
    tableBody.innerHTML = ""
    for (var i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }
    var totalPrice = 0;
    for (var y = 0; y < array.length; y++) {
        var row = table.insertRow(-1);
        var number = row.insertCell(0);
        var category = row.insertCell(1);
        var item = row.insertCell(2);
        var quantity = row.insertCell(3);
        var price = row.insertCell(4);
        var action = row.insertCell(5);
        number.innerHTML = y + 1;
        category.innerHTML = array[y].category_id;
        item.innerHTML = array[y].item_id;
        quantity.innerHTML = array[y].quantity;
        price.innerHTML = array[y].price;
        action.innerHTML = `<button onclick="remove_from__array(${y});">Remove</button>`;
        totalPrice += array[y].price
    }
    document.getElementById("price").value = totalPrice;
}

function remove_from__array(index) {
    array.splice(index, 1);
    display_array()
    getMessage()
}

function getMessage() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: '/getDataAjax',
        data: {
            _token: CSRF_TOKEN,
            arraydata: array
        },
        success: function(data) {
            console.log(data.msg);
            $("#msg").html(data.msg);
        },
        error: function(xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        }
    });
}