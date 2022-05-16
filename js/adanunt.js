var sw=0;
var sww=0;

function c () {
    sw=1;
}

function v () {
    sw=2;
}

function prim () {
    document.getElementById('btnprim').style.display = "none";
    document.getElementById('btndoi').style.display = "none";
    document.getElementById('btn2prim').style.display = "initial";
    document.getElementById('btn2doi').style.display = "initial";
    document.getElementById('btn2trei').style.display = "none";
}

function co () {
    sww=1;
}

function av () {
    sww=2;
}

function bu () {
    sww=3;
}
function cont (){
// Cumpar avere
if (sw==1 && sww==1) {
    document.getElementById('btn2prim').style.display = "none";
    document.getElementById('btn2doi').style.display = "none";
    document.getElementById('btn2trei').style.display = "none";
    document.getElementById('select').style.display = "initial";
    document.getElementById('title').style.display = "initial";
    document.getElementById('pret').style.display = "initial";
    document.getElementById('schimb').style.display = "initial";
    document.getElementById('boxx').style.display = "block";
}
// Vand avere
if (sw==2 && sww==1) {
    document.getElementById('btn2prim').style.display = "none";
    document.getElementById('btn2doi').style.display = "none";
    document.getElementById('btn2trei').style.display = "none";
    document.getElementById('select').style.display = "initial";
    document.getElementById('title').style.display = "initial";
    document.getElementById('pret').style.display = "initial";
    document.getElementById('schimb').style.display = "initial";
    document.getElementById('boxx').style.display = "block";
    document.getElementById('type').value = "1";
    document.getElementById('esc').innerHTML = "Ce vrei la schimb: ";
    document.getElementById('esc2').innerHTML = "vinzi";
}
// Cumpar cont
if (sw==1 && sww==2) {
    document.getElementById('boxx2').style.display = "block";
    document.getElementById('btn2prim').style.display = "none";
    document.getElementById('btn2doi').style.display = "none";
    document.getElementById('btn2trei').style.display = "none";
}
// Vand cont
if (sw==2 && sww==2) {
    document.getElementById('btn2prim').style.display = "none";
    document.getElementById('btn2doi').style.display = "none";
    document.getElementById('btn2trei').style.display = "none";
    document.getElementById('boxx3').style.display = "block";
}
}

function plataa () {
    var da = document.getElementById("selectt").value;
    var dax2 = document.getElementById("selecttx2").value;
    if (da == 'altas'){
        document.getElementById("altasumaa").style.display = "initial";
        document.getElementById("plata").style.display = "initial";
        document.getElementById("altcvv").style.display = "none";
        document.getElementById("mesaj").style.display = "none";
    }else if (da == 'altcv') {
        document.getElementById("plata").style.display = "none";
        document.getElementById("altasumaa").style.display = "none";
        document.getElementById("altcvv").style.display = "initial";
        document.getElementById("mesaj").style.display = "initial";
    }else if (dax2 == 'altas') {
        document.getElementById("altasumaax2").style.display = "initial";
        document.getElementById("platax2").style.display = "initial";
        document.getElementById("altcvvx2").style.display = "none";
        document.getElementById("mesajx2").style.display = "none";
    } else if (dax2 == 'altcv') {
        document.getElementById("platax2").style.display = "none";
        document.getElementById("altasumaax2").style.display = "none";
        document.getElementById("altcvvx2").style.display = "initial";
        document.getElementById("mesajx2").style.display = "initial";
    }else {
        document.getElementById("plata").style.display = "initial";
        document.getElementById("altasumaa").style.display = "none";
        document.getElementById("altcvv").style.display = "none";
        document.getElementById("mesaj").style.display = "none";
        document.getElementById("platax2").style.display = "initial";
        document.getElementById("altasumaax2").style.display = "none";
        document.getElementById("altcvvx2").style.display = "none";
        document.getElementById("mesajx2").style.display = "none";
    }
}

function butonul () {
    var da = document.getElementById("selectt").value;
    var x = document.getElementById("pret2").value;
    var y = x.length;
    var a = document.getElementById("altasumaa").value;
    var b = a.length;
    var c = document.getElementById("altcvv").value;
    var d = c.length;
    var e = document.getElementById("mesajul").value;
    var f = e.length;
    if (y > 0) {
        document.getElementById("add").style.display = "initial";
        document.getElementById("eroare").style.display = "none";
    }
    if (y > 4) {
        document.getElementById("eroare").style.display = "initial";
        document.getElementById("add").style.display = "none";
    }
    if (x < 0 || x == 0) {
        document.getElementById("add").style.display = "none";
    }
    if (da == 'altas'){ 
        if (b <= 0) {
            document.getElementById("add").style.display = "none";
        }
    }
    if (da == 'altcv'){ 
        if (d <= 0) {
            document.getElementById("add").style.display = "none";
            document.getElementById("eroare2").style.display = "none";
        }
        if (d > 30) {
            document.getElementById("eroare2").style.display = "initial";
            document.getElementById("add").style.display = "none";
        }
        if (d >= 0 && d < 30) {
            document.getElementById("eroare2").style.display = "none";
        }
        if (f > 250) {
            document.getElementById("eroare3").style.display = "initial";
            document.getElementById("add").style.display = "none";
        }
        if (f < 250) {
            document.getElementById("eroare3").style.display = "none";
            document.getElementById("add").style.display = "initial";
        }
    }  
}

function mafie () {
    var x = document.getElementById("mafiecheck");
    if (x.checked == true) {
    document.getElementById("mafie").style.display = "none";
    document.getElementById("wf").style.display = "none";
    } else {
        document.getElementById("mafie").style.display = "initial";
        document.getElementById("wf").style.display = "initial";
    }
}

