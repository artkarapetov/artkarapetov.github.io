<?php

function compress($source, $destination, $quality) {
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
    return $destination;
}

$location = array(
    "location1" => "Wilfrid Laurier University",
    "location2" => "University of Toronto Mississauga",
    "location3" => "University of Toronto Scarborough",
    "location4" => "University of Toronto St. George",
    "location5" => "University of Waterloo",
    "location6" => "Lakehead University",
    "location7" => "York University",
    "location8" => "University of British Columbia",
    "location9" => "Trent University",
    "location10" => "Ryerson University"
);
