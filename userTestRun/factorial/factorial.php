<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_code = $_POST['php_code'];

    $num = 5;

    function runTest($user_code, $num){
        
        eval($user_code);

        $result = factorial($num);

        if($result == 120){
            return $result . "- Doğru Cevap";
        } 
        else{
            return $result . "- Yanlış Cevap";
        }
    }

    $test_result = runTest($user_code, $num);
    echo $test_result;


}


/*
function factorial($num){
    $sum = 1;
    for ($i=1; $i<=$num; $i++){
        $sum *= $i;
    }
    return $sum;
}
*/



?>