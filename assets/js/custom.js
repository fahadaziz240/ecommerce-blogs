$(document).ready(function () { });

// Quantity Plus minus js

function increment_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-" + cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
    save_to_db(cart_id, newQuantity);
}

function decrement_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-" + cart_id);
    if ($(inputQuantityElement).val() > 1) {
        var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
        save_to_db(cart_id, newQuantity);
    }
}


