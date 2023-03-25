<?php
require_once "./payment.card/playment.card.intefrace.php";
require_once "./payment.card/playment.card.php";
require_once "./parser/parser.interface.php";
require_once "./parser/parser.php";
require_once "./counterparty/counterparty.interface.php";
require_once "./counterparty/counterparty.php";

$parser = new Parser("1c_export.txt");
$resultParse = $parser->parseFile();
print_r($resultParse);