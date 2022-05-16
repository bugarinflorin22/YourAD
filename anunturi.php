<!DOCTYPE html>
<html>
    <head>
        <title> Your Ad </title>
        <link rel="stylesheet" type="text/css" href="css/nav2.css">
        <link rel="stylesheet" type="text/css" href="css/anunturi.css">
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">
        <link rel="icon" type="images/png" href="images/icon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Scheherazade&display=swap" rel="stylesheet">
        <script src="js/lodcont.js"></script>    
        <script>
        
        $(document).ready(function(){
            
            $(window).scroll(function(){
                
                var position = $(window).scrollTop();
                var bottom = $(document).height() - $(window).height();

                if( position == bottom ){

                    var row = Number($('#row').val());
                    var allcount = Number($('#all').val());
                    var rowperpage = 9;
                    row = row + rowperpage;

                    if(row <= allcount){
                        $('#row').val(row);
                        $.ajax({
                            url: 'fetch_data.php',
                            type: 'post',
                            data: {row:row},
                            success: function(response){
                                $(".box:last").after(response).show().fadeIn("slow");
                            }
                        });
                    }
                }

            });
        
        });
        </script>
    </head>
<?php
session_start();
include "magie/connect.php";
if (!isset($_SESSION['nume'])){
    header("Location:index.php");
}
if (isset($_SESSION['nume']) && $_SESSION['ban']==1){
    header("Location: ailuatban.php");

}
$rowperpage = 9;
$allcount_query = "SELECT count(*) as allcount FROM ad";
 $allcount_result = mysqli_query($conn,$allcount_query);
 $allcount_fetch = mysqli_fetch_array($allcount_result);
 $allcount = $allcount_fetch['allcount'];
 if (isset($_GET['select']) && $_GET['select'] == 'crescator')
 $query = "select * from ad order by server LIKE '%Earth%' limit 0,$rowperpage ";
 else
 $query = "select * from ad order by data desc limit 0,$rowperpage ";
 $result = mysqli_query($conn,$query);
 
?>

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
    <?php
            if (isset($_GET['info']) && !empty($_GET['info']) && $_GET['info'] == 'succes'){
            echo '
            <p id="succes" > Anuntul a fost creat cu succes ! </p>';
            header("Refresh:2 url=adanunt.php");}
            if (isset($_GET['info']) && !empty($_GET['info']) && $_GET['info'] == 'error'){
                echo '
                <p id="error" > Nu ai voie sa postezi doua anunturi la fel </p>';
                header("Refresh:4 url=adanunt.php");}
                if (isset($_GET['info']) && !empty($_GET['info']) && $_GET['info'] == 'error2'){
                    echo '
                    <p id="error" > Pretul este prea mare, minim cinci caractere </p>';
                    header("Refresh:4 url=adanunt.php");}
                    if (isset($_GET['info']) && !empty($_GET['info']) && $_GET['info'] == 'error3'){
                        echo '
                        <p id="error" > Completeaza toate campurile te rog </p>';
                        header("Refresh:4 url=adanunt.php");}
            ?>
    <div class="dep">
        <p id="sortare" style="display:none"> </p>
    </div>
    <div class="tot">
    <?php
    date_default_timezone_set('Europe/Bucharest');
    // Ora nebuna
    function time_elapsed_string2($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => '',
            'm' => '',
            'w' => '',
            'd' => '',
            'h' => '',
            'i' => '',
            's' => '',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . '' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode('', $string) . '' : '';
    }
    // Ora Buna
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(' ', $string) . ' ago' : 'just now';
    }
    while($row = mysqli_fetch_array($result)){

        $id = $row['id'];
        $nume = $row['nume'];
        $server = $row['server'];
        $discord = $row['discord'];
        $data = $row['data'];
        $pret = $row['pret'];
        $ofera = $row['ofera'];
        $type = $row['type'];
        $premium = $row['premium'];
        $dneb = time_elapsed_string2($data, true);
        $string = time_elapsed_string($data, true);
        $mystring = 'day';
        $mystring2 = 'month';
        $mystring3 = 'week';
        $mystring4 = 'year';
        $adv = strpos($string, $mystring);
        $adv2 = strpos($string, $mystring2);
        $adv3 = strpos($string, $mystring3);
        $adv4 = strpos($string, $mystring4);
        if ($adv == true && $dneb[0] >= 3 || $adv2 == true || $adv3 == true || $adv4 == true){
            $expirat = "da";
        } else {
            $expirat = "nu";
        }
    ?>
    <?php if ($premium == 1 && $type ==0 && $expirat != "da") { ?>
        <div class="box2" id="post_<?php echo $id; ?>">
            <p class="nd"> <?php echo $nume ?>, <?php echo time_elapsed_string($data, true); ?> </p>
            <p class="inf"> Server: <?php echo $server ?> </p>
            <p> Discord: <?php echo $discord ?> </p>
            <p class="desc"> Cumpar <?php echo $pret ?> pe <?php echo $ofera ?></p>
            <button> Vezi mai multe detalii </button>
        </div>
    <?php } else if ($premium == 1 && $type == 1 && $expirat != "da"){ ?>
        <div class="box2" id="post_<?php echo $id; ?>">
            <p class="nd"> <?php echo $nume ?>, <?php echo time_elapsed_string($data, true); ?> </p>
            <p class="inf"> Server: <?php echo $server ?> </p>
            <p> Discord: <?php echo $discord ?> </p>
            <p class="desc"> Vand <?php echo $pret ?> pe <?php echo $ofera ?></p>
            <button> Vezi mai multe detalii </button>
        </div>
    <?php } else if ($premium == 0 && $type == 1 && $expirat != "da") { ?>
            <div class="box" id="post_<?php echo $id; ?>">
            <p class="nd"> <?php echo $nume ?>, <?php echo time_elapsed_string($data, true); ?> </p>
            <p class="inf"> Server: <?php echo $server ?> </p>
            <p> Discord: <?php echo $discord ?> </p>
            <p class="desc"> Vand <?php echo $pret ?> pe <?php echo $ofera ?></p>
            <button> Vezi mai multe detalii </button>
            </div>
        <?php } else if ($premium == 0 && $type == 0 && $expirat != "da") { ?>
            <div class="box" id="post_<?php echo $id; ?>">
            <p class="nd"> <?php echo $nume ?>, <?php echo time_elapsed_string($data, true); ?> </p>
            <p class="inf"> Server: <?php echo $server ?> </p>
            <p> Discord: <?php echo $discord ?> </p>
            <p class="desc"> Cumpar <?php echo $pret ?> pe <?php echo $ofera ?></p>
            <button> Vezi mai multe detalii </button>
            </div>

            <!-- CONT //-->

        <?php }else if ($premium == 1 && $type ==2) { ?>
        <div class="box2" id="post_<?php echo $id; ?>">
            <p class="nd"> <?php echo $nume ?>, <?php echo time_elapsed_string($data, true); ?> </p>
            <p class="inf"> Server: <?php echo $server ?> </p>
            <p> Discord: <?php echo $discord ?> </p>
            <p class="desc"> Cumpar <?php echo $pret ?> pe <?php echo $ofera ?></p>
            <button> Vezi mai multe detalii </button>
        </div>
    <?php } else if ($premium == 1 && $type == 3){ ?>
        <div class="box2" id="post_<?php echo $id; ?>">
            <p class="nd"> <?php echo $nume ?>, <?php echo time_elapsed_string($data, true); ?> </p>
            <p class="inf"> Server: <?php echo $server ?> </p>
            <p> Discord: <?php echo $discord ?> </p>
            <p class="desc"> Vand <?php echo $pret ?> pe <?php echo $ofera ?></p>
            <button> Vezi mai multe detalii </button>
        </div>
    <?php } else if ($premium == 0 && $type == 3) { ?>
            <div class="box" id="post_<?php echo $id; ?>">
            <p class="nd"> <?php echo $nume ?>, <?php echo time_elapsed_string($data, true); ?> </p>
            <p class="inf"> Server: <?php echo $server ?> </p>
            <p> Discord: <?php echo $discord ?> </p>
            <p class="desc"> Vand <?php echo $pret ?> pe <?php echo $ofera ?></p>
            <button> Vezi mai multe detalii </button>
            </div>
        <?php } else if ($premium == 0 && $type == 2) { ?>
            <div class="box" id="post_<?php echo $id; ?>">
            <p class="nd"> <?php echo $nume ?>, <?php echo time_elapsed_string($data, true); ?> </p>
            <p class="inf"> Server: <?php echo $server ?> </p>
            <p> Discord: <?php echo $discord ?> </p>
            <p class="desc"> Cumpar <?php echo $pret ?> pe <?php echo $ofera ?></p>
            <button> Vezi mai multe detalii </button>
            </div>
        <?php
        
 }}
 
 ?>

 <input type="hidden" id="row" value="0">
 <input type="hidden" id="all" value="<?php echo $allcount; ?>">       
 </div>
    </body>
    <script src="js/ceas.js"></script>
    <div class="footer"><p> © Copyright 2019 - yourad.com - Toate drepturile rezervate </p></div>
</html>