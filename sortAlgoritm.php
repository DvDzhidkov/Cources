<?php
$unsorted = [7, 10, 3, 5, 1, 2, 6, 4, 9, 8];

function BubbleSort(array $array): array
{
    for($i = count($array) - 1; $i > 0; $i--){
        $isSwaped = false;
        for($j = 0; $j < $i; $j++){
            $curentElement = $array[$j];
            $nextElement = $array[$j+1];
            if($array[$j] > $array[$j+1]) {
                $temp = $curentElement;
                $array[$j] = $nextElement;
                $array[$j+1] = $temp;
                $isSwaped = true;
            }

        }
        if(!$isSwaped){
            break;
        } showArray($array);
        // У відео у вас декілька рядків ще повторювалось
        // оскільки ви поставили вивід масиву як просто задачу,
        // а не як задачу при виконанні умови або не виконанні.
    }
    return $array;
}

function showArray(array $array)
{
    $arrayToString = '[' . implode(',', $array) . ']';
    echo $arrayToString . PHP_EOL;
}

showArray($unsorted);

$sorted = BubbleSort($unsorted);

showArray($sorted);

echo "The smallest number in the array: " . $sorted[0] . PHP_EOL;