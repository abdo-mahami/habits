<?php

// Your Apps Script URL
$script_url = "https://script.google.com/macros/s/AKfycbwQ0dlzvohZHiwAs3StK5r89GuXnYcLp9gTzscfbC_DMsY1kSzgjvIApP1162pzW0hGZg/exec";

// Collect incoming POST data
$data = [
    "study" => $_POST["study"],
    "coding" => $_POST["coding"],
    "workout" => $_POST["workout"],
    "prayers" => $_POST["prayers"],
    "quran" => $_POST["quran"],
    "reading" => $_POST["reading"]
];

// Prepare POST request
$options = [
    "http" => [
        "header" => "Content-Type: application/json\r\n",
        "method" => "POST",
        "content" => json_encode($data)
    ]
];

$context = stream_context_create($options);

// Send to Google Sheet (no CORS here)
$result = file_get_contents($script_url, false, $context);

// Return success response to your browser
echo "OK";
