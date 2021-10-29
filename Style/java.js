
function myFunction() {
    var height = parseFloat(document.querySelector('#height').value);
    var weight = parseFloat(document.querySelector('#weight').value);
    if (height === "" || isNaN(height))
        alert('Invalid height');

    else if (weight === "" || isNaN(weight))
        alert('Invalid weight');
    else {
        let bmi = (weight / ((height / 100) * (height / 100))).toFixed(2);
        localStorage.setItem("key", bmi);
    }
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }