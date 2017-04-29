<?php

include ('Series.php');

$json = [
    [
        'name' => 'tx s2 e2',
        'season' => 45,
        'episode' => 1,
    ],
    [
        'name' => 'tx s2 e2',
        'season' => 2,
        'episode' => 2,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 13,
        'episode' => 1,
    ],
    [
        'name' => 'tx s2 e1',
        'season' => 2,
        'episode' => 1,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 8,
        'episode' => 1,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 8,
        'episode' => 12,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 8,
        'episode' => 9,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 2,
        'episode' => 9,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 7,
        'episode' => 2,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 13,
        'episode' => 2,
    ],
];

$data = array();
foreach ($json as $v) {
    $data[$v['season']][$v['episode']] = $v;
}
header('Content-Type: application/json');
$t = new Series($data);
// var_dump($t);
foreach ($t as $s) {
    // echo current($s);

    var_dump($s);
}
// echo json_encode($data, true);
exit;
