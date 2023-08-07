<?php

function generate_dummy_record($dom, $index) {
    $names = ["John", "Jane", "Michael", "Emily", "Robert", "Linda", "William", "Susan", "David", "Karen"];
    $cities = ["New York, US", "Los Angeles, US", "Chicago, US", "Houston, US", "Miami, US", "Dallas, US"];
    $age = rand(18, 60);
    $name = $names[array_rand($names)];
    $city = $cities[array_rand($cities)];

    $nvRow = $dom->createElement('nv-row');
    $nvSr = $dom->createElement('nv-sr', $index);
    $nvName = $dom->createElement('nv-name', $name);
    $nvAge = $dom->createElement('nv-age', $age);
    $nvCity = $dom->createElement('nv-city', $city);

    $nvRow->appendChild($nvSr);
    $nvRow->appendChild($nvName);
    $nvRow->appendChild($nvAge);
    $nvRow->appendChild($nvCity);

    return $nvRow;
}

$dom = new DOMDocument('1.0', 'UTF-8');
$dom->formatOutput = true;

$root = $dom->createElement('nv-rows');
$dom->appendChild($root);
$total_records = 10000;
for ($i = 1; $i <= $total_records; $i++) {
    $record = generate_dummy_record($dom, $i);
    $root->appendChild($record);
}
$filename = 'dummy_xml_file.xml';
$dom->save($filename);

echo "XML file with 500 dummy records has been created as '$filename'.";
?>