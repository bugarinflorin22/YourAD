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