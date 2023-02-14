// var kredit = document.querySelector('input[name = "kredit"]:checked').value;
// var x = document.getElementById("kartu");

// setInterval(displayHello, 1000);

// function displayHello() {
//     document.getElementById("demo").innerHTML += "Hello";
// }

// console.log(kredit);

// if ((kredit.value == "yes") == checked) {
//     if (x.style.display === "none") {
//         x.style.display = "block";
//     }
// } else {
//     x.style.display = "none";
// }

// function myFunction() {
//     var x = document.getElementById("kartu");
//     if (x.style.display === "none") {
//         x.style.display = "block";
//     } else {
//         x.style.display = "none";
//     }
// }

const kartu = document.getElementById("kartu");

function handleRadioClick() {
    if (document.getElementById("yes").checked) {
        kartu.style.display = "block";
    } else {
        kartu.style.display = "none";
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
