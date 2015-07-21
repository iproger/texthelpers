<?php

namespace iproger\texthelpers;

class ClearingText
{

    public static function clean($text)
    {
        // replace symbols
        $search = ["'ё'",
            "'<script[^>]*?>.*?</script>'si",
            "'<style[^>]*?>.*?</style>'si",
            "'<[\/\!]*?[^<>]*?>'si",
            "'([\r\n])[\s]+'",
            "'&(quot|#34);'i",
            "'&(amp|#38);'i",
            "'&(lt|#60);'i",
            "'&(gt|#62);'i",
            "'&(nbsp|#160);'i",
            "'&(iexcl|#161);'i",
            "'&(cent|#162);'i",
            "'&(pound|#163);'i",
            "'&(copy|#169);'i",
            "'&#(\d+);'e"];
        $replace = ["е",
            " ",
            " ",
            " ",
            "\\1 ",
            "\" ",
            " ",
            " ",
            " ",
            " ",
            chr(161),
            chr(162),
            chr(163),
            chr(169),
            "chr(\\1)"];
        $cleanText = preg_replace($search, $replace, $text);

        // delete symbols
        $delSymbols = array(",", ".", ";", ":", "\"", "#", "\$", "%", "^",
            "!", "@", "`", "~", "*", "-", "=", "+", "\\",
            "|", "/", ">", "<", "(", ")", "&", "?", "№", "\t",
            "\r", "\n", "{", "}", "[", "]", "'", "“", "”", "•",
            "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
            '«', '»', '  ', '(', ')', '+'
        );
        $cleanText = str_replace($delSymbols, " ", $cleanText);

        // replace spaces
        $cleanText = preg_replace('|\s+|', ' ', $cleanText);

        // trim spaces
        $cleanText = trim($cleanText);

        return $cleanText;
    }

}
