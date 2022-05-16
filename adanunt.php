<?php
session_start();
if (isset($_SESSION['nume'])){
if ($_SESSION['ban']==1)
{
    header("Location: ailuatban.php");
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Your Ad </title>
        <link id="navul" rel="stylesheet" type="text/css" href="css/nav.css">
        <link rel="stylesheet" type="text/css" href="css/adanunt.css">
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">
        <link rel="icon" type="images/png" href="images/icon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
        <script src="js/adanunt.js" > </script>
        
    </head>
    <body>
        <div class="nav-bar" id="nav">
        <nav>
            <ul>
                <li> <a href="index.php"> Home </a> </li>
                <?php if(!isset($_SESSION['nume'])) {
                    echo '
                    <li> <a href="login.php"> Login </a> </li>
                    <li> <a href="register.php"> Register </a> </li>
                    ';
                } 
                if (isset($_SESSION['nume'])){
                    if ($_SESSION['level'] == 1){
                        echo '
                        <li> <a href="admin.php"> Admin </a> </li>
                        ';
                    }
                    echo '
                    <li> <a href="anunturi.php"> Anunturi </a> </li>
                    <li> <a href="adanunt.php"> Adauga anunt </a> </li>
                    <li> <a href="profile.php">'; echo $_SESSION['nume']; echo ' </a> </li>';
                    echo '<li> <a href="logout.php"> Logout </a> </li>
                    ';
                }
                ?>
            </ul>
        </nav>
    </div>
    <div class="dep"></div>
    <div class="box2">
            <button class="buton" id="btnprim" onclick="prim(); c();"> Cumpar </button>
            <button class="buton2" id="btndoi" onclick="prim(); v();"> Vand </button>
        </div>
        <div class="box2">
            <button class="buton" id="btn2prim" style="display:none;" onclick="co(); cont();"> Avere </button>
            <button class="buton2" id="btn2doi" style="display:none;" onclick="av(); cont();"> Cont </button>
            <button class="buton2" id="btn2trei" style="display:none;" onclick="bu(); cont();"> Bunuri </button>
            </div>
                <div class="dep"></div>
    <div class="box" id="boxx" style="display:none">
            <form method="POST" action="magie/adanuntavere.php">
            <p id="title" style="display:none"> Alege server: </p>
            <select name="select1" id="select" style="display:none;">  
            <option value="Earth"> Earth.Og-times </option>
            <option value="Ruby"> Ruby.nephrie </option>
            <option value="Jade"> Jade.nephrie </option>
            <option value="Blue"> Blue.bugged </option>
            <option value="B-hood"> Rpg.B-hood </option>
            </select>
            <br><br>
            <p class="avere" id="pret" style="display:none"> Cata avere vrei sa <span id="esc2"> cumperi </span>: <input name="pret" id="pret2" onchange="butonul();" type="number">
            <select name="select2">
                <option value="k"> k </option>
                <option value="kk"> kk </option>
                <option value="kkk"> kkk </option>
            </select>
            </p>
            <br><br>
            <p class="avere" id="schimb" style="display:none"> <span id="esc"> Ce oferi la schimb: </span>  
            <select id="selectt" name="select3" onchange="plataa(); butonul()">
                <option value="25"> 25 lei </option>
                <option value="50"> 50 lei </option>
                <option value="75"> 75 lei </option>
                <option value="100"> 100 lei </option>
                <option value="125"> 125 lei </option>
                <option value="150"> 150 lei </option>
                <option value="175"> 175 lei </option>
                <option value="200"> 200 lei </option>
                <option value="altas"> alta suma </option>
                <option value="altcv"> altceva </option>
            </select>
            <input name="avere2" id="altasumaa" onchange="butonul();" type="number" style="display:none">
            <input name="altceva" id="altcvv" onchange="butonul();"  style="display:none" placeholder="Ex: cont blue">
            <input name="type" id="type" style="display:none" value="0">
            <select id="plata" name="select4">
                <option> Paysafecard </option>
                <option> Paypal </option>
            </select>
            <br><br>
            <p id="mesaj" style="display:none"> Detalii: <br> <textarea <textarea placeholder="Trebuie sa fie intr-o factiune, sa aiba peste 500kk, etc..." rows="4" cols="50" maxlength="250" name="mesajulnume" id="mesajul" onchange="butonul();"></textarea></p>
            <br><br>
            <button class="add" id="add" style="display:none"> Adauga anunt </button>
            <p style="display:none;" id="eroare"> Pretul maxim trebuie format din cel mult 4 cifre <br></p>
            <p style="display:none;" id="eroare2"> Cel mult 30 de caractere ! </p>
            <p style="display:none;" id="eroare3"> Cel mult 250 de caractere la detalii ! </p>
            </div>
        </form> 


            
            <form method="POST" action="magie/adanuntavere3">
            <div class="box" id="boxx3" style="display:none">
            <p id="title"> Alege server:
            <select name="select1" id="selectx2">  
            <option value="Earth"> Earth.Og-times </option>
            <option value="Ruby"> Ruby.nephrie </option>
            <option value="Jade"> Jade.nephrie </option>
            <option value="Blue"> Blue.bugged </option>
            <option value="B-hood"> Rpg.B-hood </option>
            </select>
            </p><br>
            <p> Contul este strict pentru mafie <input type="checkbox" id="mafiecheck" onclick="mafie();"></p>
            <br>
            <p> Are <span id="wf" style="display:initial"> warn sau </span> fp-uri <input type="checkbox"> </p>
            <br>
            <p> Are level  <input type="number"> 
            </p>
            <br>
            <p> Are <input type="number"> de ore 
            </p>
            <br>
            <span id="mafie">
            <p class="avere" id="pretx2"> Cata avere detine: <input name="pret" id="pret2" onchange="butonul();" type="number">
            <select name="select2">
                <option value="k"> k </option>
                <option value="kk"> kk </option>
                <option value="kkk"> kkk </option>
            </select>
            </p>
            <br>
            <p id="numex2"> Numele contului: <input> </p>
            <br>
            <p id="avereax2"> Daca are ceva bunuri pe cont: <input placeholder="Ex: masina sau bizz"> </p>
            <br>
            <p> <span> Este cont banat <input type="checkbox"> &nbsp; </span> Este cont premium <input type="checkbox"> 
            &nbsp;
        </p>
        <br>
        <p id="functie"> Daca are vreo functie:
            <select name="select2x2">
                <option value="select"> Select </option>
                <option value="lider"> Lider </option>
                <option value="helper"> Helper </option>
                <option value="admin"> Admin </option>
            </select>
            </p>
            <br>
            <p> Detine <input type="number"> puncte premium </p>
            <br>
            <p id="functie"> Este in factiunea:
            <select name="select2x2">
                <option value="select"> Select </option>
                <option value="dep"> Oricare </option>
                <option value="dep"> Departament </option>
                <option value="pas"> Pasnica </option>
                <option value="lspd"> LSPD </option>
                <option value="lvpd"> LVPD </option>
                <option value="sfpd"> SFPD </option>
                <option value="fbi"> FBI </option>
                <option value="ng"> NG </option>
                <option value="tl"> Taxi </option>
                <option value="tl"> Taxi Ls </option>
                <option value="tv"> Taxi Lv  </option>
                <option value="ts"> Taxi Sf </option>
                <option value="tl"> Paramedic </option>
                <option value="pl"> Paramedic Ls </option>
                <option value="pv"> Paramedic Lv </option>
                <option value="ps"> Paramedic Sf </option>
                <option value="tl"> School Instructor </option>
                <option value="sl"> School In. Ls </option>
                <option value="sv"> School In. Lv </option>
                <option value="ss"> School In. Sf </option>
                <option value="ht"> Hitman </option>
                <option value="towcar"> Tow Car Company </option>
                <option value="towcar"> News Reporters </option>
                <option value="primar"> Primar </option>
            </select>
            </p>
            <p> Link cont (profilul de pe panel) <input> </p>
            <br>
            </span>
            <p class="avere" id="schimb"> <span id="esc"> Ce vrei la schimb: </span>  
            <select id="selecttx2" name="select3" onchange="plataa(); butonul()">
                <option value="25"> 25 lei </option>
                <option value="50"> 50 lei </option>
                <option value="75"> 75 lei </option>
                <option value="100"> 100 lei </option>
                <option value="125"> 125 lei </option>
                <option value="150"> 150 lei </option>
                <option value="175"> 175 lei </option>
                <option value="200"> 200 lei </option>
                <option value="altas"> alta suma </option>
                <option value="altcv"> altceva </option>
            </select>
            <input name="avere2" id="altasumaax2" onchange="butonul();" type="number" style="display:none">
            <input name="altceva" id="altcvvx2" onchange="butonul();"  style="display:none" placeholder="Ex: cont blue">
            <input name="type" id="typex2" style="display:none" value="0">
            <select id="platax2" name="select4">
                <option> Paysafecard </option>
                <option> Paypal </option>
            </select>
            </p>
            <br>
            <p id="mesajx2" style="display:none"> Detalii: <br> <textarea <textarea placeholder="Alte detalii daca vrei sa mai adaugi ceva" rows="4" cols="50" maxlength="250" name="mesajulnume" id="mesajul" onchange="butonul();"></textarea></p>
            <br><br>
            </span>
            <button class="add" id="addx2"> Adauga anunt </button>
            <p style="display:none;" id="eroare"> Pretul maxim trebuie format din cel mult 4 cifre <br></p>
            <p style="display:none;" id="eroare2"> Cel mult 30 de caractere la detalii ! </p>
        </div>
        </form>
        
        
        <form method="POST" action="magie/adanuntavere2">
            <div class="box" id="boxx2" style="display:none">
            <p id="title"> Alege server:
            <select name="select1" id="selectx2">  
            <option value="Earth"> Earth.Og-times </option>
            <option value="Ruby"> Ruby.nephrie </option>
            <option value="Jade"> Jade.nephrie </option>
            <option value="Blue"> Blue.bugged </option>
            <option value="B-hood"> Rpg.B-hood </option>
            </select>
            </p><br>
            <p> Vreau sa fie strict pentru mafie <input type="checkbox" id="mafiecheck" onclick="mafie();"></p>
            <br>
            <p> Nu vreau sa aiba <span id="wf" style="display:initial"> warn sau </span> fp-uri <input type="checkbox"> </p>
            <br>
            <p> Vreau sa aiba level <select>
            <option value="select"> Select </option>
            <option value="peste"> Peste </option>
            <option value="sub"> Sub </option>
            </select> <input type="number"> 
            </p>
            <br>
            <p> Vreau sa aiba <select>
            <option value="select"> Select </option>
            <option value="peste"> Peste </option>
            <option value="sub"> Sub </option>
            </select> <input type="number"> de ore 
            </p>
            <br>
            <span id="mafie">
            <p class="avere" id="pretx2"> Cata avere ai vrea sa detina: <input name="pret" id="pret2" onchange="butonul();" type="number">
            <select name="select2">
                <option value="k"> k </option>
                <option value="kk"> kk </option>
                <option value="kkk"> kkk </option>
            </select>
            </p>
            <br>
            <p id="numex2" style="display:none;"> Numele contului: <input> </p>
            <br style="display:none">
            <p id="avereax2"> Daca vrei sa aiba bunuri pe cont: <input placeholder="Ex: masina sau bizz"> </p>
            <br>
            <p> <span style="display:none"> Este cont banat <input type="checkbox"> &nbsp; </span> Vreau sa fie cont premium <input type="checkbox"> 
            &nbsp;
        </p>
        <br>
        <p id="functie"> Vreau sa aiba functie:
            <select name="select2x2">
                <option value="select"> Select </option>
                <option value="lider"> Lider </option>
                <option value="helper"> Helper </option>
                <option value="admin"> Admin </option>
            </select>
            </p>
            <br>
            <p> Vreau sa detina <input type="number"> de puncte premium </p>
            <br>
            <p id="functie"> Vreau sa aiba factiune:
            <select name="select2x2">
                <option value="select"> Select </option>
                <option value="dep"> Oricare </option>
                <option value="dep"> Departament </option>
                <option value="pas"> Pasnica </option>
                <option value="lspd"> LSPD </option>
                <option value="lvpd"> LVPD </option>
                <option value="sfpd"> SFPD </option>
                <option value="fbi"> FBI </option>
                <option value="ng"> NG </option>
                <option value="tl"> Taxi </option>
                <option value="tl"> Taxi Ls </option>
                <option value="tv"> Taxi Lv  </option>
                <option value="ts"> Taxi Sf </option>
                <option value="tl"> Paramedic </option>
                <option value="pl"> Paramedic Ls </option>
                <option value="pv"> Paramedic Lv </option>
                <option value="ps"> Paramedic Sf </option>
                <option value="tl"> School Instructor </option>
                <option value="sl"> School In. Ls </option>
                <option value="sv"> School In. Lv </option>
                <option value="ss"> School In. Sf </option>
                <option value="ht"> Hitman </option>
                <option value="towcar"> Tow Car Company </option>
                <option value="towcar"> News Reporters </option>
                <option value="primar"> Primar </option>
            </select>
            </p>
            <p style="display:none"> Link cont <input> </p>
            <br>
            <p class="avere" id="schimb"> <span id="esc"> Ce oferi la schimb: </span>  
            <select id="selecttx2" name="select3" onchange="plataa(); butonul()">
                <option value="25"> 25 lei </option>
                <option value="50"> 50 lei </option>
                <option value="75"> 75 lei </option>
                <option value="100"> 100 lei </option>
                <option value="125"> 125 lei </option>
                <option value="150"> 150 lei </option>
                <option value="175"> 175 lei </option>
                <option value="200"> 200 lei </option>
                <option value="altas"> alta suma </option>
                <option value="altcv"> altceva </option>
            </select>
            <input name="avere2" id="altasumaax2" onchange="butonul();" type="number" style="display:none">
            <input name="altceva" id="altcvvx2" onchange="butonul();"  style="display:none" placeholder="Ex: cont blue">
            <input name="type" id="typex2" style="display:none" value="0">
            <select id="platax2" name="select4">
                <option> Paysafecard </option>
                <option> Paypal </option>
            </select>
            </p>
            <br>
            <p id="mesajx2" style="display:none"> Detalii: <br> <textarea <textarea placeholder="Contul vreau sa fie in PD sa aiba 600 ore, etc.." rows="4" cols="50" maxlength="250" name="mesajulnume" id="mesajul" onchange="butonul();"></textarea></p>
            <br><br>
            </span>
            <button class="add" id="addx2"> Adauga anunt </button>
            <p style="display:none;" id="eroare"> Pretul maxim trebuie format din cel mult 4 cifre <br></p>
            <p style="display:none;" id="eroare2"> Cel mult 30 de caractere la detalii ! </p>
        </div>
        </form> 
    </div>

    </body>
    <div class="footer"><p> © Copyright 2019 - yourad.com - Toate drepturile rezervate </p></div>
</html>