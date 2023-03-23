<?php 

    class PlaymentCard extends Fields implements IPlaymentCard{

        public function constructor(){
            $this->initFields();
        }

        public function getInfo()
        {
            return $this->fields;
        }

        protected function getFields(){
            return ['Дата' => '', 'Сумма' => '', 'НазначениеПлатежа' => ''];
        }
    }
