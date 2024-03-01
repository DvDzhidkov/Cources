<?php
$unsorted = [7, 10, 3, 13, 1, 2, 6, 4, 9, 8, 17, 12, 5, 11, 15, 16, 14];

function selectionSort($arr) {
    $n = count($arr);
    $isSwapped = false;
    for ($i = 0; $i < $n - 1; $i++) {
        // Знаходимо індекс найменшого елементу в підмасиві, починаючи з індексу $i
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }

        // Обмін значень між поточним елементом та найменшим елементом
        if ($minIndex !== $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$minIndex];
            $arr[$minIndex] = $temp;
            $isSwapped = true;
        }
        showArray($arr);
        if(!$isSwapped){
            break;
        }
    }


    return $arr;
}


function showArray(array $array)
{
    $arrayToString = '[' . implode(',', $array) . ']';
    echo $arrayToString . PHP_EOL;
}

showArray($unsorted);

$sorted = selectionSort($unsorted);

showArray($sorted);

echo "The smallest number in the array: " . $sorted[0] . PHP_EOL;