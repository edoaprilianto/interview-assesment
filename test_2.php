<!-- 2.	Queen’s Attack -->

<!-- created by Edo Aprilianto
dated      02/02/2023 10:47 -->

<?php

$obstacles = [];

echo "Sample Input 0";
echo "<br>";
echo "[4,0,4,4]";
echo "<br><br>";
echo "Sample result 0";
echo "<br>";
echo queensAttack(4,0,4,4,$obstacles);

function queensAttack($n, $k, $r_q, $c_q, $obstacles) {
    

    // Index obstacles in next format: ob[row-col] = true
    $obstacles_indexed = [];
    foreach ($obstacles as $ob) {
        $obstacles_indexed[$ob[0].'-'.$ob[1]] = true;
    }


    // Go each direction and increase counter until we get to the end of the board or to an obstacle
    $counter = 0;

    // up:
    $r_p = $r_q + 1;

    $c_p = $c_q;

    while ( ! isset($obstacles_indexed[$r_p.'-'.$c_p]) && $r_p <= $n ) {
                    $counter++;
                    $r_p++; // go up
    }


    //down:
    $r_p = $r_q - 1;
    $c_p = $c_q;
    while ( ! isset($obstacles_indexed[$r_p.'-'.$c_p]) && $r_p >= 1 ) {
                    $counter++;
                    $r_p--;//go down

    }

    //left:
    $r_p = $r_q;
    $c_p = $c_q - 1;
    while ( ! isset($obstacles_indexed[$r_p.'-'.$c_p]) && $c_p > 0 ) {
                    $counter++;
                    $c_p--;//go left

    }

    //right:
    $r_p = $r_q;
    $c_p = $c_q + 1;
    while ( ! isset($obstacles_indexed[$r_p.'-'.$c_p]) && $c_p <= $n ) {
                    $counter++;
                    $c_p++;//go left

    }

    // up-right:
    $r_p = $r_q + 1;
    $c_p = $c_q + 1;
    while( ! isset($obstacles_indexed[$r_p.'-'.$c_p]) && $c_p <= $n && $r_p <= $n ){
                    $counter++;
                    $c_p++;//go right
                    $r_p++;//go up

    }

    // up-left:
    $r_p = $r_q + 1;
    $c_p = $c_q - 1;
    while( ! isset($obstacles_indexed[$r_p.'-'.$c_p]) && $c_p > 0 && $r_p <= $n ){
                    $counter++;
                    $c_p--;//go left
                    $r_p++;//go up

    }

    // down-right:
    $r_p = $r_q - 1;
    $c_p = $c_q + 1;
    while( ! isset($obstacles_indexed[$r_p.'-'.$c_p]) && $c_p <= $n && $r_p > 0 ){
                    $counter++;
                    $c_p++;//go right
                    $r_p--;//go down

    }


    // down-left:
    $r_p = $r_q - 1;
    $c_p = $c_q - 1;
    while( ! isset($obstacles_indexed[$r_p.'-'.$c_p]) && $c_p > 0 && $r_p > 0 ){
                    $counter++;
                    $c_p--;//go left
                    $r_p--;//go down
    }

    return $counter;

} 


?>