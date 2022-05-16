function error () {
        var x = document.getElementById("input1").value;
        var y = document.getElementById("input2").value;
        var lungime = x.length;
        var lungime2 = y.length;

        if (lungime == 0 && lungime2 == 0){
            document.getElementById("eroare").style.display = "block";
            document.getElementById("input1").style.boxShadow = "2px 2px 5px red";
            document.getElementById("input2").style.boxShadow = "2px 2px 5px red";
        }
        if (lungime == 0 && lungime2 > 0)
        {
            document.getElementById("eroare").style.display = "block";
            document.getElementById("input1").style.boxShadow = "2px 2px 5px red";
            document.getElementById("input2").style.boxShadow = "2px 2px 5px green";
        }
        if (lungime == 0 ) {
            document.getElementById("eroare").style.display = "block";
            document.getElementById("input1").style.boxShadow = "2px 2px 5px red";
        } else if (lungime != 0) {
            document.getElementById("eroare").style.display = "none";
            document.getElementById("input1").style.boxShadow = "2px 2px 5px green";
        }
        if (lungime != 0 && lungime2 == 0) {
            document.getElementById("eroare").style.display = "block";
            document.getElementById("input2").style.boxShadow = "2px 2px 5px red";
        } else if (lungime != 0 && lungime2 !=0) {
            document.getElementById("eroare").style.display = "none";
            document.getElementById("input1").style.boxShadow = "2px 2px 5px green";
            document.getElementById("input2").style.boxShadow = "2px 2px 5px green";
        }
        
}
