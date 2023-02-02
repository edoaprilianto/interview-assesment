<!-- 1.	Fraudulent Activity Notifications -->

<!-- Created by Edo Aprilianto
Dated       02/02/2023 09:46 PM -->

<?php

$expeditures = [2,3,4,2,3,6,8,4,5];
$a = 5; 

function findMedian($counter, $d){
    $count = 0;
    $median = 0;

    if($d % 2 != 0){
        for($i=0; $i<count($counter); $i++){
            $count += $counter[$i];
            if($count > $d / 2){
                $median = $i;
                break;
             }
        }
    } else {
        $first = 0;
        $second = 0;
        for($i=0; $i<count($counter); $i++){
            $count += $counter[$i];

            if($first == 0 && $count >= $d / 2){
                $first = $i;
            }

            if($second == 0 && $count >= $d / 2 + 1){
                $second = $i;
                break;
            }

        }

        $median = ($first+$second) / 2;
    }

    return $median;

}

function activeNotification($expenditure, $d){
    $notif = 0;
    $arrCounter = [];

    // make 0 in array until 200
    for($a=0; $a<201; $a++){
        $arrCounter[] = 0;
    }

    // count value if index is exists in expenditure array
    for($i=0; $i<$d; $i++){
        $arrCounter[$expenditure[$i]] += 1;
    }


    for($i=$d; $i<count($expenditure); $i++){
        $median = findMedian($arrCounter, $d);

        $totMedian = $median * 2;
        if($totMedian <= $expenditure[$i]){
            $notif += 1;
        }

        $arrCounter[$expenditure[$i-$d]] -= 1;
        $arrCounter[$expenditure[$i]] += 1;
    }


    return $notif;

}

echo "Sample Input 0";
echo "<br>";
echo "Expenditure =  [2,3,4,2,3,6,8,4,5] & d = 5";
echo "<br><br>";
echo "Sample result 0";
echo "<br>";
echo activeNotification($expeditures, $a);

echo "<br><br><br>";

echo "Sample Input 1";
echo "<br>";
echo "Expenditure =  [1,2,3,4,4] & d = 4";
echo "<br><br>";
echo "Sample result 1";
echo "<br>";
$expeditures = [1,2,3,4,4];
$a = 4;
echo activeNotification($expeditures, $a);

?>