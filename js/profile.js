function error () {
    var x = document.getElementById("input1").value;
    var y = document.getElementById("input2").value;
    var z = document.getElementById("input3").value;

    var lungime = x.length;
    var lungime2 = y.length;
    var lungime3 = z.length;

    if (lungime == 0 && lungime2 == 0 && lungime3 == 0 ){
        document.getElementById("eroare").style.display = "block";
        document.getElementById("input1").style.boxShadow = "0px 0px 3px 0px blueviolet";
        document.getElementById("input2").style.boxShadow = "0px 0px 3px 0px blueviolet";
        document.getElementById("input3").style.boxShadow = "0px 0px 3px 0px blueviolet";
    } else if (lungime != 0 || lungime2 != 0 || lungime3 != 0 ) {
        document.getElementById("eroare").style.display = "none";
        document.getElementById("input1").style.boxShadow = "0px 0px 3px 0px green";
        document.getElementById("input2").style.boxShadow = "0px 0px 3px 0px green";
        document.getElementById("input3").style.boxShadow = "0px 0px 3px 0px green";

    }

    var poz = x.indexOf(" #");
    var poz2 = x.indexOf("#");

    if (poz != -1 && lungime != 0 || poz2 == -1 && lungime != 0)
    {
        document.getElementById("eroare2").style.display = "block";
        document.getElementById("input1").style.boxShadow = "0px 0px 3px 0px blueviolet";
    } else {
        document.getElementById("eroare2").style.display = "none";
        document.getElementById("input1").style.boxShadow = "0px 0px 3px 0px green";
    }

    var pot = y.indexOf("https://www.facebook.com")

    if (lungime2 != 0 && pot == -1){
        document.getElementById("eroare3").style.display = "block";
        document.getElementById("input2").style.boxShadow = "0px 0px 3px 0px blueviolet";
    } else {
        document.getElementById("eroare3").style.display = "none";
        document.getElementById("input2").style.boxShadow = "0px 0px 3px 0px green";
    }
    
}
