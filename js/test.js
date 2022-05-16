function error () {
   var val = document.getElementById("p").value;
   document.getElementById("er").innerHTML = val;
   lungime = val.length;
   alert(lungime);
   if (lungime == 0) {
    document.getElementById("er").innerHTML = "Sugsdasi";
} 
}