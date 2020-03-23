var x = 0;
var array = Array();

function add_element_to_array() {
    array[x] = document.getElementById("item_id").value;
    alert("Item Name: " + array[x] + " Added at index " + x);
    x++;
    document.getElementById("item_id").value = "";
}

// function remove_element_to_array() {
//     array[x] = document.getElementById("item_id").value;
//     alert("Item Name: " + array.splice(x, 1) + " Remove index " + (x + 1));
//     x++;
//     document.getElementById("item_id").value = "";
// }


function display_array() {
    var e = "<br/>";

    for (var y = 0; y < array.length; y++) {
        e += "Item Name " + y + " = " + array[y] + "<br/>";
    }
    document.getElementById("Result").innerHTML = e;
}
