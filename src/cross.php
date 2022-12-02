<?php
namespace Draw;
class cross extends draw{
    public static function forground($text,$color){
        $cross =self::$cross;
        return "\e[0;".self::$codes['foreground'][$color].";".$cross."m".$text."\e[0m";
}
public static function background($text,$color){
    $cross =self::$cross;
    $color=self::$codes['background'][$color];
    if (strpos($text, "\n")) {
        $text = trim($text,"\n");
        $toReturn = "\e[0;37;$color;5;".$cross."m$text \e[0m"."\n";
        return $toReturn;
    }
    else{
        $toReturn = "\e[0;37;$color;5;".$cross."m$text \e[0m";
        return $toReturn;
    }
}
};