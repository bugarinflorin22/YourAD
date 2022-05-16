<?php 
date_default_timezone_set('Europe/Bucharest');
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'ani',
        'm' => 'luni',
        'w' => 'saptamana',
        'd' => 'zi',
        'h' => 'ore',
        'i' => 'minut',
        's' => 'secund',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 'e' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) : 'chiar acum';
}

echo time_elapsed_string('2019-08-09 12:28:05', true);
echo '<br>';
$zi = strftime('%d',time());  
$data = date('Y-m-d H:i:s');
$datafinala = "postat pe ".$zi." la ".$data;

echo $data;