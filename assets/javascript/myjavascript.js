window.onload = function () {
    //var right_div = document.getElementById("left");
    var productRequest = new XMLHttpRequest();
    var cartRequest = new XMLHttpRequest();
    productRequest.open('POST', "http://kohana.group1/products/list");
    productRequest.onload = function () {
        var productData = productRequest.responseText;
        var left_div = document.getElementById("left");
        left_div.innerHTML = productData;
    }
    productRequest.send();
    cartRequest.open('POST', "http://kohana.group1/cart/cart");
    cartRequest.onload = function () {
        var cartData = cartRequest.responseText;
        var left_div = document.getElementById("right");
        left_div.innerHTML = cartData;
    }
    cartRequest.send();
}

function addToCart(element) {
    event.preventDefault();
    var id = element.getAttribute("data-id");
    var quantity = element.getAttribute("data-quantity");
    var addToCartRequest = new XMLHttpRequest();
    var link = "http://kohana.group1/products/add_cart?id=" + id + "&quantity=" + quantity;
    addToCartRequest.open("GET", link)
    addToCartRequest.onreadystatechange = function () {
        if (addToCartRequest.readyState == 4 && addToCartRequest.status == 200) {
        }
    }
    addToCartRequest.send();
}