const kartu = document.getElementById("kartu");
const mandiri = document.getElementById("mandiri");
const btnSyariah = document.getElementById("btnSyariah");

function handleRadioClick() {
    if (document.getElementById("yes").checked) {
        kartu.style.display = "block";
        mandiri.style.display = "block";

    } else {
        kartu.style.display = "none";
        mandiri.style.display = "none";
        btnSyariah.style.display = "none";

    }
}

const radioButtons = document.querySelectorAll('input[name="kredit"]');
radioButtons.forEach((radio) => {
    radio.addEventListener("click", handleRadioClick);
});

function Div() {
    var jasa = document.getElementById("jasa_id").value;
    if (jasa == 1) {
        window.location.href = "/product/create/";
    } else {
        window.location.href = "/pemesananjasakonstruksi/create";
    }
}


function Div2() {
    var product = document.getElementById("product_id").value;
    console.log(product);
    if (product == 1) {
        window.location.href = "/pemesananbarang/create";
    } else {
        window.location.href = "/pemesananbarang2/create";
    }
}
