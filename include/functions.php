<?php
  include("after_dot_function.php");

function digits_to_words($number) {
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' Naira ';
    $digits = array(
        0 => 'Zero',
        1  => 'One',
        2 => 'Two',
        3  => 'Three',
        4 => 'Four',
        5  => 'Five',
        6 => 'Six',
        7  => 'Seven',
        8  => 'Eight',
        9  => 'Nine',
        10  => 'Ten',
        11  => 'Eleven',
        12  => 'Twelve',
        13  => 'Thirteen',
        14  => 'Fourteen',
        15  => 'Fifteen',
        16  => 'Sixteen',
        17  => 'Seventeen',
        18  => 'Eighteen',
        19  => 'Nineteen',
        20  => 'Twenty',
        30  => 'Thirty',
        40  => 'Forty',
        50  => 'Fifty',
        60  => 'Sixty',
        70   => 'Seventy',
        80   => 'Eighty',
        90    => 'Ninety',
        100     => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . digits_to_words(abs($number));
    }
   
    $string = $after_dot = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $after_dot) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $digits[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $digits[$tens];
            if ($units) {
                $string .= $hyphen . $digits[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $digits[$hundreds] . ' ' . $digits[100];
            if ($remainder) {
                $string .= $conjunction . digits_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = digits_to_words($numBaseUnits) . ' ' . $digits[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= digits_to_words($remainder);
            }
            break;
    }
   
    if (null !== $after_dot && is_numeric($after_dot)) {
      $string .= $decimal;
        $no_of_digits = strlen($after_dot);
		if($no_of_digits > 2){
			$z = substr("$after_dot",0,2);
		$string .= afterDecimal((int)$z);
			}else
			{
						$string .= afterDecimal($after_dot);
			}
    }
    return $string;
}

?>