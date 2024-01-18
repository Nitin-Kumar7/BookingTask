<?php
// definition
// function createPatternWithMirror($n) {
//     $res = '';
//     for ($i=1; $i < $n; $i++) { 
//         $res .= str_repeat(' ',$n - $i ).str_repeat('*', $i * 2 -1  ). "\n";
//      }

//      for ($i= $n-1 ; $i > 0 ; $i--) { 
//         $res .= str_repeat(' ', $n - $i ).str_repeat('*', $i * 2 -1  ). "\n";
//      }
//     return $res;
// }

// $out = createPatternWithMirror(5);

// echo $out;


// function bubbleSort($nums): array {
//     $n = count($nums);

//     for ($i = 0; $i < $n; $i++) {
//         for ($j = 0; $j < $n - $i - 1; $j++) {
//             if ($nums[$j] > $nums[$j + 1]) {
               
//                 [$nums[$j], $nums[$j + 1]] = [$nums[$j + 1], $nums[$j]];
//             }
//         }
//     }

//     return $nums;
// }

// $arr = [2, 56, 358, 358, 74, 66];
// $out = bubbleSort($arr);
// print_r($out);
// function selectionSort($nums): array {
//     $n = count($nums);

//     for ($i = 0; $i < $n - 1; $i++) {
//         $minIndex = $i;

      
//         for ($j = $i + 1; $j < $n; $j++) {
//             if ($nums[$j] < $nums[$minIndex]) {
//                 $minIndex = $j;
//             }
//         }

      
//         [$nums[$i], $nums[$minIndex]] = [$nums[$minIndex], $nums[$i]];
//     }

//     return $nums;
// }

// $arr = [2, 56, 358, 358, 74, 66];
// $out = selectionSort($arr);
// print_r($out);

function insertionSort($nums): array {
    $n = count($nums);

    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;

      
        for ($j = $i + 1; $j >= 0; $j--) {
            if ($nums[$j] < $nums[$j-1]) {
                [$nums[$j], $nums[$j-1]] = [$nums[$j], $nums[$j-1]];
            }
        }
     
      
       
    }

    return $nums;
}

$arr = [2, 56, 358, 358, 74, 66];
$out = insertionSort($arr);
print_r($out);


?>

