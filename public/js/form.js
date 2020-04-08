var x = 0;
var z = 0;

var array = Array();

function add_element_to_array() {
    var object = {
        item_id: document.getElementById("item_id").innerText,
        category_id: document.getElementById("category_id").innerHTML,
        quantity: document.getElementById("quantity").value
    }
    array.push(object)
    x++;
    z++;
}


function display_array() {
    var table = document.getElementById("itemTable");
    var tableBody = document.getElementById("itemTableBody");
    tableBody.innerHTML = ""
    for (var i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }
    for (var y = 0; y < array.length; y++) {
        var row = table.insertRow(-1);
        var number = row.insertCell(0);
        var category = row.insertCell(1);
        var item = row.insertCell(2);
        var quantity = row.insertCell(3);
        var action = row.insertCell(4);
        number.innerHTML = y + 1;
        category.innerHTML = array[y].category_id;
        item.innerHTML = array[y].item_id;
        quantity.innerHTML = array[y].quantity;
        action.innerHTML = `<button onclick="remove_from__array(${y});">Remove</button>`;
    }
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

document.querySelector("#today").valueAsDate = new Date();

function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"m 
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
