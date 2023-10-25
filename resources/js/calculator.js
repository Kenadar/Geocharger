var chargerType;
var countryPrice;
var demo;
var selectedCalculation;
var result;
var resultContainer;
var resultInput;

function kilowattResult() {
    return parseFloat(countryPrice) + (parseFloat(countryPrice) * 0.05) + (parseFloat(countryPrice) * (parseFloat(demo.innerHTML) / 100));
}

function hourResult() {
    return parseFloat(chargerType) + (parseFloat(countryPrice) + (parseFloat(countryPrice) * 0.05)) + (parseFloat(countryPrice) * (parseFloat(demo.innerHTML) / 100));
}

document.addEventListener("DOMContentLoaded", function() {

    var selectElement1 = document.getElementById("country_dropdown");

    var uahImage = document.getElementById('uah');
    var euroImage = document.getElementById('euro');
    countryPrice = selectElement1.value;
    if (countryPrice == 26) {

        euroImage.style.display = "none";
        uahImage.style.display = "block";
    } else {
        uahImage.style.display = "none";
        euroImage.style.display = "block";
    }
    selectElement1.addEventListener("click", function() {
        countryPrice = selectElement1.value;

        if (countryPrice == 26) {

            euroImage.style.display = "none";
            uahImage.style.display = "block";
        } else {
            uahImage.style.display = "none";
            euroImage.style.display = "block";
        }

        console.log("Country Price:", countryPrice);
    });

    var selectElement = document.getElementById("charger");

    selectElement.addEventListener("change", function() {
        chargerType = selectElement.value;
        console.log("Charger Type:", chargerType);
    });

    var slider1 = document.getElementById("myRange");
    demo = document.getElementById("value");
    demo.innerHTML = slider1.value;

    slider1.oninput = function() {
        demo.innerHTML = this.value;
    }

    slider1.addEventListener("change", function() {
        console.log("Slider Value:", demo.innerHTML);
    });


    var kwTab = document.getElementById("kwTab");
    var hourTab = document.getElementById("hourTab");

    kwTab.addEventListener("click", function() {
        selectedCalculation = kilowattResult;
        console.log('you clicked on kw tab');
    });

    hourTab.addEventListener("click", function() {
        selectedCalculation = hourResult;
        console.log('you clicked on hour tab');
    });

    var resultButton = document.getElementById("calcButton");
    resultContainer = document.getElementById("resultContainer");
    resultInput = document.getElementById("resultInput");

    resultButton.addEventListener("click", function() {
        if (selectedCalculation !== undefined) {

            result = selectedCalculation();

            resultInput.value = result;

            resultContainer.style.display = "block";

            console.log("Результат обрахунку:", result);
        } else {
            console.log("Функція обчислення не обрана");
        }
    });

});