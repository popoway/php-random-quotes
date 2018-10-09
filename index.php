<?php

// php-random-quotes
// https://github.com/popoway/php-random-quotes
// Copyright 2018 popoway. Licensed under the MIT license.

// define the location / i18n of the JSON file
if ($_GET["base"] === null) {
  $quote_file = "base/en.json";
  if ($_GET["lang"] != null) {
    $lang = strtolower($_GET["lang"]); // ignore case
    $quote_file = "base/$lang.json";
  }
}
else {
  $quote_file = $_GET["base"];
}

// load file
$string = file_get_contents($quote_file);

// decode JSON into an array
$array = json_decode($string, true);

// pick a random index
$one_item = $array[rand(0, count($array) - 1)];

// data process
$one_item_json = json_encode($one_item); // convert back to JSON
$obj = json_decode($one_item_json);
$quote = $obj->{'Quote'}; // quote in plain text
$author = $obj->{'Author'}; // author in plain text

// output options
if ($_GET["output"] === "json") {
  echo $one_item_json;
}
else if ($_GET["output"] === "quote-only") {
  echo $quote;
}
else if ($_GET["output"] === "double-hyphen") {
  echo "$quote —— $author";
}
else if ($_GET["output"] === "no-hyphen") {
  echo "$quote $author";
}
else {
  echo "$quote — $author";
}
?>
