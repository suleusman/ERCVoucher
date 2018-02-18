<?php

//function for decimal parts
 function afterDecimal($num){


	$fraction= array(
0 => 'Zero',
 1 => 'One',
 2 => 'Two',
 3 => 'Three',
 4 => 'Four',
 5 => 'Five',
 6 => 'Six',
 7 => 'Seven',
 8 => 'Eight',
 9 => 'Nine',
10 => 'Ten',
11 => 'Eleven',
12 => 'Twelve',
13 => 'Thirteen',
14 => 'Fourteen',
15 => 'Fifteen',
16 => 'Sixteen',
17 => 'Seventeen',
18 => 'Eighteen',
19 => 'Nineteen',
20 => 'Twenty',
30 => 'Thirty',
40 => 'Fourty',
50 => 'Fifty',
60 => 'Sixty',
70 => 'Seventy',
80 => 'Eighty',
90 => 'Ninety',
);


    $str="";
    $len = strlen($num);
    if($len==1){
        $num=$num*10;
		$str .= $fraction[$num].' '.'Kobo Only';
		return $str;
    }else
    if($len == 2 && $num >= 20){
		$tens = (int)($num/10)*10;
		$unit = ($num%10);
		if($unit == 0){
			$str .= $fraction[$tens].' '.'Kobo Only';
		}else
		{		
		$str .= $fraction[$tens].' '.$fraction[$unit].' '.'Kobo Only';
		 }
		return $str;
 }else
 if($len==2 && $num < 20 && $num >=10){
	 $str .= $fraction[$num].' '.'Kobo Only';
	 return $str;
 }else
 if($len==2 && $num < 10){
	 $x = substr("$num",1,1);
$str .= $fraction[((int)$x * 10)/10].' '.'Kobo Only';
return $str;
	 
	 }
else
 {return $fraction[0].' '.'Kobo Only';}

 }
 
	  
	  
?>



