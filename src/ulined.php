<?php
namespace Draw;
class ulined extends draw{
    public static function forground($text,$color){
        $codeBold = self::$codeBold;
        $codeUlined =self::$codeUlined;
        return "\e[$codeBold;".self::$codes['foreground'][$color].";".$codeUlined."m".$text."\e[0m";
}
public static function background($text,$color){
    $codeBold = self::$codeBold;
    $codeUlined =4;
    $color=self::$codes['background'][$color];
    if (strpos($text, "\n")) {
        $text = trim($text,"\n");
        $toReturn = "\e[$codeBold;37;$color;5;".$codeUlined."m$text \e[0m"."\n";
        return $toReturn;
    }
    else{
        $toReturn = "\e[$codeBold;37;$color;5;".$codeUlined."m$text \e[0m";
        return $toReturn;
    }
}
};