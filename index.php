<?php

include ('Series.php');

$json = [
    [
        'name' => 'tx s2 e2',
        'season' => 1,
        'id' => 1,
        'episode' => 1,
    ],
    [
        'name' => 'tx s2 e2',
        'season' => 45,
        'id' => 2,
        'episode' => 1,
    ],
    [
        'name' => 'tx s2 e2',
        'season' => 2,
        'id' => 3,
        'episode' => 12,
    ],
    [
        'name' => 'tx s2 e2',
        'season' => 2,
        'id' => 4,
        'episode' => 2,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 13,
        'id' => 5,
        'episode' => 1,
    ],
    [
        'name' => 'tx s2 e1',
        'season' => 2,
        'id' => 6,
        'episode' => 1,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 8,
        'id' => 7,
        'episode' => 1,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 8,
        'id' => 8,
        'episode' => 12,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 8,
        'id' => 9,
        'episode' => 9,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 2,
        'id' => 10,
        'episode' => 9,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 7,
        'id' => 11,
        'episode' => 2,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 13,
        'episode' => 2,
        'id' => 12,
    ],
    [
        'name' => 'tx s1 e1',
        'season' => 7,
        'id' => 13,
        'episode' => 1,
    ],
];

$data = array();
foreach ($json as $v) {
    $data[$v['season']][$v['episode']] = $v;
}
header('Content-Type: application/json');
$t = new Series($data);
foreach ($t->getIterator() as $s) {
    var_dump($s);
}
echo "next episode 3: ". $t->getNextEpisode(3);

echo " next season 1: ".  $t->getNextSeason(1);

