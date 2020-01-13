window.onload = function () {

    // console.log(products[0]);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var respone = JSON.parse(this.responseText);
            console.log(respone);
            showProducts(respone);
            //  console.log(respone);

        }
    };
    xhr.open("GET", "http://kohana.group3/welcome/prod", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send();


};

function showProducts(response) {
    var productsHtml = new XMLHttpRequest();
    productsHtml.onreadystatechange = function () {
        if (productsHtml.readyState === 4 && productsHtml.status === 200) {
            var template = this.responseText;
            processTemplate(response, template);
        }
    };
    productsHtml.open("GET", "http://kohana.group3/welcome/products", true);
    productsHtml.setRequestHeader("Content-Type", "text/html");
    productsHtml.send();
}


function processTemplate(response, template) {
    var products = document.getElementsByClassName("products-left");
    var length = Object.values(response).length;
    // console.log(length);
    for (i = 0; i < length; i++) {
        var output = insertTemplate(template, response, i);
        products[0].insertAdjacentHTML("afterend", output);
    }
}

//xhr request template view
function insertTemplate(template, response, i) {
    // console.log(template.indexOf("title\">"));
    var indexTitle = template.indexOf("{title}");
    if (indexTitle > -1) {
        var output = template.replace("{title}", response[i]["title"]);
    }
    var indexTitle = output.indexOf("{description}");
    if (indexTitle > -1) {
        var output = output.replace("{description}", response[i]["description"]);
    }
    var indexTitle = output.indexOf("{price}");
    if (indexTitle > -1) {
        var output = output.replace("{price}", response[i]["price"]);
    }
    var indexTitle = output.indexOf("{id}");
    if (indexTitle > -1) {
        var output = output.replace("{id}", response[i]["id"]);
    }
    var indexTitle = output.indexOf("{currency}");

    if (indexTitle > -1) {
        var output = output.replace("{currency}", response[i]["currency"]);
    }

    return output;
}

document.addEventListener("click", function () {
    var e = window.event,
        btn = e.target || e.srcElement;
    if (btn.id !== "" && btn.id !== "cart")
        alert(btn.id);
});



