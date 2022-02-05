<?php

namespace MyApp;

class Password

{

    private $pass_level;
    private $length;

    public function __construct($pass_level, $length)
    {
        $this->pass_level = $pass_level;
        $this->length = $length;
    }

    public function randomPassword() {

        try{

            if ($this->checkInputs() == true){
                $password = '';

                //level 1 pass
                if ($this->pass_level === 1){
                    $password = $this->getCapitalLetters(2);
                    $password .= $this->getSmallLetters(1);
                }

                //level 2 pass
                if ($this->pass_level === 2){
                    $range_from = 2;
                    $range_to = 5;
                    $password = $this->getCapitalLetters(2);
                    $password .= $this->getSmallLetters(1);
                    $password .= $this->getNumber($range_from, $range_to);
                }

                //level 3 pass
                if ($this->pass_level === 3){
                    $range_from = 2;
                    $range_to = 5;
                    $password = $this->getCapitalLetters(2);
                    $password .= $this->getSmallLetters(1);
                    $password .= $this->getNumber($range_from, $range_to);
                    $password .= $this->getSpecialChar(1);
                }

                //get other chars of pass
                $passwordSets = ['2345', '!#$%&(){}[]', 'ABCDEFGHJKLMNPQRSTUVWXYZ', 'abcdefghjkmnpqrstuvwxyz'];

                while (strlen($password) < $this->length) {
                    $randomSet = $passwordSets[array_rand($passwordSets)];
                    $password .= $randomSet[array_rand(str_split($randomSet))];
                }
                $password = str_shuffle($password);

                return $password;
            }



        }catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    private function checkInputs(){

        $inputs = true;

        if ( !is_int($this->pass_level) || ($this->pass_level < 1 || $this->pass_level > 3)){
            echo 'Value pass level is not an integer or is not in correct range.';
            $inputs = false;
        }
        if ( !is_int($this->length) || ($this->length < 6 || $this->length > 20)){
            echo 'Value length level is not an integer or is not in correct range.';
            $inputs = false;
        }
        return $inputs;
    }

    private function getCapitalLetters($length){

        $passSet = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        return $this->getChars($passSet, $length);
    }

    private function getSmallLetters($length){

        $passSet = 'abcdefghjkmnpqrstuvwxyz';
        return $this->getChars($passSet, $length);
    }

    private function getNumber($from_range, $to_range){
        return rand(2,5);
    }

    private function getSpecialChar($length){

        $passSet = '!#$%&(){}[]';
        return $this->getChars($passSet, $length);
    }

    private function getChars($passSet, $length){
        $password = '';
        for($i=0; $i<$length; $i++){
            $password .= $passSet[array_rand(str_split($passSet))];
        }
        return $password;
    }
}




