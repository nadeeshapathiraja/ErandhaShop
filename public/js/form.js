var x = 0;
var z = 0;

var array = Array();

function add_element_to_array() {
    array[x] = document.getElementById("item_id").value;
    //array[z] = document.getElementById("quantity").value;
    alert("Item Name: " + array[x] + " Added at index " + x);
    x++;
    z++;
    document.getElementById("item_id").value = "";
    document.getElementById("quantity").value = "";
}


function display_array() {
    var e = "<hr/>";

    for (var y = 0; y < array.length; y++) {
        e += "Item Name " + y + " = " + array[y] + "<br/>";
    }
    document.getElementById("Result").innerHTML = e;
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

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}