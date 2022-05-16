<?php
use function PHPSTORM_META\type;

include 'magie/connect.php';

$row = $_POST['row'];
$rowperpage = 9;

$query = 'SELECT * FROM ad limit '.$row.','.$rowperpage;

$result = mysqli_query($conn,$query);

$html = '';

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

  if ($premium == 1 && $type==1)  {
  $html .= '<div id="post_'.$id.'" class="box2">';
  $html .= '<p class="nd">'.$nume.','.$data.'</p>';
  $html .= '<p class="inf"> Server: '.$server.'</p>';
  $html .= '<p> Discord: '.$discord.'</p>';
  $html .= '<p> <p class="desc"> Vand '.$pret.' pe '.$ofera.'</p>';
  $html .= '<button> Vezi mai multe detalii </button>';
  $html .= '</div>';
  } else if ($premium == 1 && $type==0) {
  $html .= '<div id="post_'.$id.'" class="box2">';
  $html .= '<p class="nd">'.$nume.','.$data.'</p>';
  $html .= '<p class="inf"> Server: '.$server.'</p>';
  $html .= '<p> Discord: '.$discord.'</p>';
  $html .= '<p> <p class="desc"> Cumpar '.$pret.' pe '.$ofera.'</p>';
  $html .= '<button> Vezi mai multe detalii </button>';
  $html .= '</div>';
  } else if ($premium == 0 && $type == 1) {
    $html .= '<div id="post_'.$id.'" class="box">';
    $html .= '<p class="nd">'.$nume.','.$data.'</p>';
    $html .= '<p class="inf"> Server: '.$server.'</p>';
    $html .= '<p> Discord: '.$discord.'</p>';
    $html .= '<p> <p class="desc"> Vand '.$pret.' pe '.$ofera.'</p>';
    $html .= '<button> Vezi mai multe detalii </button>';
    $html .= '</div>';
    } else if ($premium == 0 && $type == 0) {
      $html .= '<div id="post_'.$id.'" class="box">';
      $html .= '<p class="nd">'.$nume.','.$data.'</p>';
      $html .= '<p class="inf"> Server: '.$server.'</p>';
      $html .= '<p> Discord: '.$discord.'</p>';
      $html .= '<p> <p class="desc"> Cumpar '.$pret.' pe '.$ofera.'</p>';
      $html .= '<button> Vezi mai multe detalii </button>';
      $html .= '</div>';
      }
}

echo $html;