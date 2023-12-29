<?php
$n = null;
$a = array(0,1,1);

//Функцuія яка обчислює суму всіх заданих чисел Фібоначі
function SumFibonachi($n, $a)
{
	
	
	for ($i = 3; $i < $n; $i++) {
  $a[$i] = $a[$i-1]+$a[$i-2];

}
  
	$Sum = 0;
	
	for ($i = 0; $i < $n; $i++)
	{
		$Sum += $a[$i];
	}
	echo "Sum: " . $Sum . PHP_EOL;
	
	
}
SumFibonachi(34, $a).PHP_EOL;