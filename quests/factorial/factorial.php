<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Test cases
    $testNums = [
        0,
        1,
        5,
        7,
        10
    ];
    
    $answers = [
        1,
        1,
        120,
        5040,
        3628800
    ];

    $userCode = $_POST['user_code'];
    eval($userCode);
    
    if (!function_exists('factorial')){
        echo "Please set the function name to \"factorial()\" and try again!";
    }

    function testRun($num, $testResult){
        $userResult = factorial($num);

        if ($userResult == $testResult){
            return true;
        } else return false;
    }

    $error = false;
    $lengthOfAllTests = count($testNums);

    for ($i = 0; $i < $lengthOfAllTests; $i++){
        $result = testRun($testNums[$i], $answers[$i]);
        if($result === false){
            echo "Wrong Answer! Try Again.";
            $error = true;
            break;
        }
    }

    if (!$error){
        echo "Congratulations!";
    }


}
?>
