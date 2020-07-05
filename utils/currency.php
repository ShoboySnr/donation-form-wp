<?php 

function get_currency_symbol($string)
{
    $symbol = '';
    $length = mb_strlen($string, 'utf-8');
    for ($i = 0; $i < $length; $i++)
    {
        $char = mb_substr($string, $i, 1, 'utf-8');
        if (!ctype_digit($char) && !ctype_punct($char))
            $symbol .= $char;
    }
    return $symbol;
}