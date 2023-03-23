<?php 

    class Parser implements IParser{

        public function parseFile(string $filePath){
            $allFileData = $this->getPlaymentFromFile($filePath);
            print_r($allFileData[0]);
        }

        private function getPlaymentFromFile(string $filePath){
            $lines = @file($filePath);
            $flag = false;
            $allItems = [];
            $indexItem = 0;
            foreach ($lines as $line){
    
                if(str_contains($line, 'Платежное поручение')){
                    $flag = true;
                }
            
                if(str_contains($line, 'КонецДокумента')){
                    $flag = false;
                    $indexItem += 1;
                }
            
                if($flag){
                    $result = explode('=', $line);
                    $allItems[$indexItem][$result[0]] = $result[1];
                } 
            }
            return $allItems;
        }
    }

?>