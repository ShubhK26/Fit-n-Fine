var bmi=0

function myFunction() {
    var height = parseInt(document.querySelector('#height').value);
    var weight = parseFloat(document.querySelector('#weight').value);
    if (height === "" || isNaN(height))
        alert('Invalid height');

    else if (weight === "" || isNaN(weight))
        alert('Invalid weight');
    else {
        window.bmi = (weight / ((height / 100) * (height / 100))).toFixed(2);
        if (bmi < 18.5) {
            alert('You are under Weight. BMI:' + window.bmi)
        }
        else if (bmi >= 18.5 && bmi < 24.9) {
            alert('Your weight is ideal. BMI:' + window.bmi)
        }
        else if (bmi > 25 && bmi < 29.9) {
            alert('You are over-weight. BMI:' + window.bmi)
        }
        else if (bmi > 30) {
            alert('Obese Weight. BMI:' + window.bmi);
        }
    }
}

function func() {
    alert("BMI is:" + window.bmi);
}