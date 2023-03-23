<?php 

    abstract class Fields{
        protected $fields = [];
        
        protected function initFields(){
            $this->fields = $this->getFields();
        }

        public function setValueField(string $fieldKey, string $fieldValue) 
        {
            if(in_array($fieldKey, array_keys($this->fields))){
                $this->fields[$fieldKey] = $fieldValue;
            }
            
        }

        abstract protected function getFields();
    }
