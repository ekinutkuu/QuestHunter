<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Test cases
    $testNums = [
        0,
        10,
        398,
        6940
    ];
    
    $answers = [
        1,
        2,
        3,
        4
    ];

    $userCode = $_POST['user_code'];
    eval($userCode);
    
    if (!function_exists('digit')){
        echo "Please set the function name to \"digit()\" and try again!";
    }

    function testRun($num, $testResult){
        $userResult = digit($num);

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


    //Test passed
    if (!$error){
        echo "passed";
    }


}
?>
