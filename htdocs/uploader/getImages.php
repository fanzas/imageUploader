<?php
header('Content-Type: application/json');

$imageContents = scandir('images');
$images = [];

for($x = 2; $x < count($imageContents); $x++) {
    $images[] = [
        'name' => $imageContents[$x],
        'size' => filesize('images/'.$imageContents[$x]),
    ];
}

echo json_encode($images);
 ?>
