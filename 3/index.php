<?php
require_once "./abstract/abstract.fields.php";
require_once "./payment.card/playment.card.intefrace.php";
require_once "./payment.card/playment.card.php";
require_once "./parser/parser.interface.php";
require_once "./parser/parser.php";

$parser = new Parser();
$resultParse = $parser->parseFile("1c_export.txt");
print_r($resultParse);