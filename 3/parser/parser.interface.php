<?php 

interface IParser{
    public function __construct(string $filePath);

    public function parseFile();
}

?>