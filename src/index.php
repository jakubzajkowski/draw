<?php
namespace Draw;
require '../vendor/autoload.php';
use Draw\bold;
use Draw\ulined;
use Draw\boldUlined;
use Draw\cross;
class draw {
    public static $codeBold=0;
    public static $codeUlined=4;
    public static $cross=9;
    private static $colorsRainbow=["Black","Red","Green","Yellow","Blue","Magenta","Cyan","White"];
    private static $codes=[
    "foreground"=>

    [
    "Black"=>"30",
    "Red"=>"31",
    "Green"=>"32",
    "Yellow"=>"33",
    "Blue"=>"34",
    "Magenta"=>"35",
    "Cyan"=>"36",
    "White"	=>"37"
    ],

    "background"=>

    [
    "White"=>"47",
    "Black"=>"40",
    "Red"=>"41",
    "Green"=>"42",
    "Yellow"=>"43",
    "Blue"=>"44",
    "Magenta"=>"45",
    "Cyan"=>"46",
    ]

];
    public static function forground($text,$color){
            return "\e[0;".self::$codes['foreground'][$color].";82m".$text."\e[0m";
    }
    public static function background($text,$color){
        $color=self::$codes['background'][$color];
        if (strpos($text, "\n")) {
            $text = trim($text,"\n");
            $toReturn = "\e[0;37;$color;5;82m$text \e[0m"."\n";
            return $toReturn;
        }
        else{
            $toReturn = "\e[0;37;$color;5;82m$text \e[0m";
            return $toReturn;
        }
    }
    static public function blue($text){
        return static::forground($text,'Blue');
    }
    static public function black($text){
        return static::forground($text,'Black');
    }
    static public function red($text){
        return static::forground($text,'Red');
    }
    static public function green($text){
        return static::forground($text,'Green');
    }
    static public function yellow($text){
        return static::forground($text,'Yellow');
    }
    static public function magenta($text){
        return static::forground($text,'Magenta');
    }
    static public function cyan($text){
        return static::forground($text,'Cyan');
    }
    static public function white($text){
        return static::forground($text,'White');
    }
    static public function bgBlue($text){
        return static::background($text,'Blue');
    }
    static public function bgBlack($text){
        return static::background($text,'Black');
    }
    static public function bgRed($text){
        return static::background($text,'Red');
    }
    static public function bgGreen($text){
        return static::background($text,'Green');
    }
    static public function bgYellow($text){
        return static::background($text,'Yellow');
    }
    static public function bgMagenta($text){
        return static::background($text,'Magenta');
    }
    static public function bgCyan($text){
        return static::background($text,'Cyan');
    }
    static public function bgWhite($text){
        return static::background($text,'White');
    }
    static public function rainbow($text){
        $textArr = str_split($text,1);
        $returnArr=[];
        foreach ($textArr as $value){
            $color=self::$codes['foreground'][self::$colorsRainbow[rand(0,count(self::$colorsRainbow)-1)]];
            array_push($returnArr,"\e[0;".$color.";5;82m".$value."\e[0m");
        }
        return implode('',$returnArr);
    }
    static public function bgRainbow($text){
        if (strpos($text, "\n")) {
            $text = trim($text,"\n");
            $textArr = str_split($text,1);
            $returnArr=[];
            foreach ($textArr as $value){
                if ($value==" "){
                    array_push($returnArr, $value);
                }
                else{
                    $color =self::$colorsRainbow[rand(0,count(self::$colorsRainbow)-1)];
                    array_push($returnArr,self::background($value,$color));}
            }
            $toReturn=implode('',$returnArr);
            return $toReturn."\n";
        }
        else{
            $textArr = str_split($text,1);
            $returnArr=[];
            foreach ($textArr as $value){
                if ($value==" "){
                    array_push($returnArr, $value);
                }
                else{
                    $color=self::$colorsRainbow[rand(0,count(self::$colorsRainbow)-1)];
                    array_push($returnArr,self::background($value,$color));}
            }
            $toReturn=implode('',$returnArr);
            return $toReturn;
        }
    }
    static public function bold(){
        return new bold();
    }
    static public function ulined(){
        return new ulined();
    }
    static public function boldUlined(){
        return new boldUlined();
    }
    static public function cross(){
        return new cross();
    }
}


