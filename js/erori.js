function buton () {
    var x = document.getElementById("pret2").value;
    var x = x.length;
    if (x > 0) {
        document.getElementById("add").style.display = "initial";
    }
    if (x > 4) {
        document.getElementById("eroare").style.display = "initial";
        document.getElementById("add").style.display = "none";
    }
}