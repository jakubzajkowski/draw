<?php
namespace Draw;
class bold extends draw{
    public static function forground($text,$color){
        $codeBold = 1;
        $codeUlined =82;
        return "\e[$codeBold;".self::$codes['foreground'][$color].";".$codeUlined."m".$text."\e[0m";
}
public static function background($text,$color){
    $codeBold = 1;
    $codeUlined =self::$codeUlined;
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