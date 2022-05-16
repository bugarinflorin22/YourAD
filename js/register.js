function error () {
    var x = document.getElementById("input1").value;
    var y = document.getElementById("input2").value;
    var z = document.getElementById("input3").value;
    var w = document.getElementById("input4").value;
    var h = document.getElementById("input5").value;

    var lungime = x.length;
    var lungime2 = y.length;
    var lungime3 = z.length;
    var lungime4 = w.length;
    var lungime5 = h.length;


    if (lungime == 0) {
        document.getElementById("eroare").style.display = "block";
        document.getElementById("input1").style.boxShadow = "2px 2px 5px red";
    } else if (lungime != 0) {
        document.getElementById("input1").style.boxShadow = "2px 2px 5px green";
    }

    if (lungime2 == 0) {
        document.getElementById("eroare").style.display = "block";
        document.getElementById("input2").style.boxShadow = "2px 2px 5px red";
    } else if (lungime2 != 0) {
        document.getElementById("input2").style.boxShadow = "2px 2px 5px green";
    }

    if (lungime3 == 0) {
        document.getElementById("eroare").style.display = "block";
        document.getElementById("input3").style.boxShadow = "2px 2px 5px red";
    } else if (lungime3 != 0) {
        document.getElementById("input3").style.boxShadow = "2px 2px 5px green";
    }

    if (lungime4 == 0) {
        document.getElementById("eroare").style.display = "block";
        document.getElementById("input4").style.boxShadow = "2px 2px 5px red";
    } else if (lungime4 != 0) {
        document.getElementById("input4").style.boxShadow = "2px 2px 5px green";
    }
    if (lungime5 > 0){
        document.getElementById("input5").style.boxShadow = "2px 2px 5px green";
    }

    if (lungime != 0 && lungime2 != 0 && lungime3 != 0 && lungime4 != 0){
        document.getElementById("eroare").style.display = "none";
    }

    if (lungime < 3 ) {
        document.getElementById("eroare2").style.display = "block";
        document.getElementById("input1").style.boxShadow = "2px 2px 5px red";
    } else if (lungime >= 3) {
        document.getElementById("eroare2").style.display = "none";
        document.getElementById("input1").style.boxShadow = "2px 2px 5px green";
    }

    if (lungime > 15 ) {
        document.getElementById("eroare3").style.display = "block";
        document.getElementById("input1").style.boxShadow = "2px 2px 5px red";
    } else if (lungime <= 15  && lungime > 3 ) {
        document.getElementById("eroare3").style.display = "none";
        document.getElementById("input1").style.boxShadow = "2px 2px 5px green";
    }
    var pos = z.indexOf("@yahoo.com");
    var pos2 = z.indexOf("@gmail.com");

    if ((pos == -1 ) && (pos2 > 0 ) ) {
        document.getElementById("eroare4").style.display = "none";
        document.getElementById("input3").style.boxShadow = "2px 2px 5px green";
    }
    if ((pos > 0) && (pos2 == -1)){
        document.getElementById("eroare4").style.display = "none";
        document.getElementById("input3").style.boxShadow = "2px 2px 5px green";
    }
    if ((pos == -1) && (pos2 == -1)) {
        document.getElementById("eroare4").style.display = "block";
        document.getElementById("input3").style.boxShadow = "2px 2px 5px red";
    }

    var poz = w.indexOf(" #");
    var poz2 = w.indexOf("#");

    if (poz != -1 || poz2 == -1)
    {
        document.getElementById("eroare5").style.display = "block";
        document.getElementById("input4").style.boxShadow = "2px 2px 5px red";
    } else {
        document.getElementById("eroare5").style.display = "none";
        document.getElementById("input4").style.boxShadow = "2px 2px 5px green";
    }

    var pot = h.indexOf("https://www.facebook.com")
    if (lungime5 != 0 && pot == -1){
        document.getElementById("eroare6").style.display = "block";
        document.getElementById("input5").style.boxShadow = "2px 2px 5px red";
    } else {
        document.getElementById("eroare6").style.display = "none";
        document.getElementById("input5").style.boxShadow = "2px 2px 5px green";
    }
}

function ochi () {
    var inp = document.getElementById("input2").value;
    lungimev2 = inp.length;
    if (lungimev2 > 3) {
        document.getElementById("ochi1").style.display = "inline";
    }

}

function ochi2 () {
    document.getElementById("ochi1").style.display = "none";
    document.getElementById("ochi2").style.display = "inline";
    document.getElementById("input2").type = "text";
}

function ochi3 () {
    document.getElementById("ochi1").style.display = "inline";
    document.getElementById("ochi2").style.display = "none";
    document.getElementById("input2").type = "password";
}