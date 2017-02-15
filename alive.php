<?php

$people = [];

// randomly generate 100 people born and dying between 1900 and 2000
for ($i = 0; $i < 100; $i++) {
    $people[$i] = [rand(1900, 2000), rand(1900, 2000)];
    sort($people[$i]);
}

$file = fopen('people.csv', 'w');
$years = array_fill(1900, 101, 0);
// write the people in a file and fill the years with number of people alive
foreach ($people as $person) {
    fputcsv($file, $person);
    for ($i = $person[0]; $i <= $person[1]; $i++)
        $years[$i]++;
}

// reverse sort and output
arsort($years);
$most = reset($years);
echo "year(s) with the most number of people alive\n";
foreach ($years as $year => $count)
    if ($count == $most)
        echo "$year\n";
    else
        break;
