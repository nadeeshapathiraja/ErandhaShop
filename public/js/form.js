// Shopping cart create
var x = 0;
var z = 0;

var array = Array();
var dbarray = Array();

function add_element_to_array() {
    var selcategory = document.getElementById("category_id");
    var selitem = document.getElementById("item_id");
    var object = {
        item_id: selitem.options[selitem.selectedIndex].text,
        category_id: selcategory.options[selcategory.selectedIndex].text,
        quantity: document.getElementById("quantity").value,
        unit_price: document.getElementById("unit_price").value,
        price: document.getElementById("quantity").value * document.getElementById("unit_price").value,
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
    }
    dbarray.push(dbobject)
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
        totalPrice += parseInt(array[y].price)
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

function addOrder() {

    var deliveryProcess = document.getElementById("delivery_process").value;
    var zone_id = document.getElementById("zone_id").value;
    var date = document.getElementById("date").value;
    var month = document.getElementById("month").value;
    var shipment_code = document.getElementById("shipment_code").value;
    var name = document.getElementById("name").value;
    var order_source = document.getElementById("order_source").value;
    var Location_address = document.getElementById("Location_address").value;
    var telephone = document.getElementById("telephone").value;
    var notes = document.getElementById("notes").value;
    var deposit_type = document.getElementById("deposit_type").value;
    var first_payment = document.getElementById("first_payment").value;
    var deliverycompany_id = document.getElementById("deliverycompany_id").value;

    console.log(deliveryProcess)
    var _token = $('input[name="_token"]').val();
    $.ajax({
        type: 'POST',
        url: '/addOrder',
        data: {
            date: date,
            month: month,
            shipment_code: shipment_code,
            name: name,
            order_source: order_source,
            Location_address: Location_address,
            deliveryProcess: deliveryProcess,
            telephone: telephone,
            notes: notes,
            deposit_type: deposit_type,
            first_payment: first_payment,
            deliverycompany_id: deliverycompany_id,
            zone_id: zone_id,
            dataArray: dbarray,
            _token: _token
        },
        success: function(data) {
            location.href = "http://localhost:8000/orders"
        }
    })
}

//select list dynamicaly change '/fetchData',
$(document).ready(function() {
    var str = window.location.pathname;
    var editTrue = str.includes('edit');
    var orderTrue = str.includes('order');
    if (editTrue && orderTrue) {
        var _token = $('input[name="_token"]').val();
        var id = str.match(/\d+/)[0]
        $.ajax({
            type: 'POST',
            url: '/fetchCartItems',
            data: {
                id: id,
                _token: _token
            },
            success: function(result) {
                dbarray = result[1]
                array = result[0]
                display_array()
            }
        })
    }

    $('.dynamic').change(function() {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: 'POST',
                url: '/fetchData',
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function(result) {
                    $('#item_id').empty().append(result);
                }
            })
        }
    })

    //selsect unit price for selected item
    $('.abcd').change(function() {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: 'POST',
                url: '/fetchPrice',
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function(result) {
                    $('#unit_price').empty().val(result)
                }
            })
        }
    })

})