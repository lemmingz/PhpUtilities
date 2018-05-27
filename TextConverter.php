<?php

namespace LmgZ\Utilities;


/**
 * Class TextConverter
 * @package LmgZ\Utilities
 */
class TextConverter
{
    /**
     *
     */
    const ENCIRCLE_MAP = [
        'A' => 'Ⓐ', 'B' => 'Ⓑ', 'C' => 'Ⓒ', 'D' => 'Ⓓ', 'E' => 'Ⓔ', 'F' => 'Ⓕ', 'G' => 'Ⓖ', 'H' => 'Ⓗ', 'I' => 'Ⓘ',
        'J' => 'Ⓙ', 'K' => 'Ⓚ', 'L' => 'Ⓛ', 'M' => 'Ⓜ', 'N' => 'Ⓝ', 'O' => 'Ⓞ', 'P' => 'Ⓟ', 'Q' => 'Ⓠ', 'R' => 'Ⓡ',
        'S' => 'Ⓢ', 'T' => 'Ⓣ', 'U' => 'Ⓤ', 'V' => 'Ⓥ', 'W' => 'Ⓦ', 'X' => 'Ⓧ', 'Y' => 'Ⓨ', 'Z' => 'Ⓩ',
        'a' => 'ⓐ', 'b' => 'ⓑ', 'c' => 'ⓒ', 'd' => 'ⓓ', 'e' => 'ⓔ', 'f' => 'ⓕ', 'g' => 'ⓖ', 'h' => 'ⓗ', 'i' => 'ⓘ',
        'j' => 'ⓙ', 'k' => 'ⓚ', 'l' => 'ⓛ', 'm' => 'ⓜ', 'n' => 'ⓝ', 'o' => 'ⓞ', 'p' => 'ⓟ', 'q' => 'ⓠ', 'r' => 'ⓡ',
        's' => 'ⓢ', 't' => 'ⓣ', 'u' => 'ⓤ', 'v' => 'ⓥ', 'w' => 'ⓦ', 'x' => 'ⓧ', 'y' => 'ⓨ', 'z' => 'ⓩ',
        '1' => '①', '2' => '②', '3' => '③', '4' => '④', '5' => '⑤', '6' => '⑥', '7' => '⑦', '8' => '⑧',
        '9' => '⑨', '0' => '⓪'
    ];

    /**
     * @param string $text
     * @return string
     */
    public static function encircle(string $text)
    {
        $strArray = self::mb_str_split($text);

        foreach ($strArray as &$char) {
            foreach (self::ENCIRCLE_MAP as $letter => $encircledLetter) {
                if ($char === $letter) {
                    $char = $encircledLetter;
                    break;
                }
            }
        }

        return implode('', $strArray);
    }

    /**
     * @param string $text
     * @return string
     */
    public static function strike(string $text)
    {
        $strike = self::getLongStrikeOverlay();
        $text = str_replace($strike, '', trim($text));
        $strArray = self::mb_str_split($text);

        return implode($strike, $strArray) . $strike;
    }

    /**
     * @param string $str
     * @return array|false|string[]
     */
    public static function mb_str_split(string $str)
    {
        return preg_split('//u', $str, null, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * @return string
     */
    public static function getLongStrikeOverlay()
    {
        return html_entity_decode('&#x336;', ENT_QUOTES, 'UTF-8');
    }

    /**
     * @return string
     */
    public static function getLtoROverride()
    {
        return html_entity_decode('&#8238;', ENT_QUOTES, 'UTF-8');
    }

    /**
     * @return string
     */
    public static function getRtoLOverride()
    {
        return html_entity_decode('&#8237;', ENT_QUOTES, 'UTF-8');
    }
}
