<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Test cases
    $testNums = [
        [1, 2],
        [3, 5],
        [10, 1],
        [-5, -2],
        [-9, 5],
        [0, 0],
    ];
    
    $answers = [
        3,
        8,
        11,
        -7,
        -4,
        0
    ];

    $userCode = $_POST['user_code'];
    eval($userCode);

    function testRun($num1, $num2, $testResult){
        if (!function_exists('twoSum')){
            return "Please set the function name to \"twoSum()\" and try again!";
        }

        $userResult = twoSum($num1, $num2);

        if ($userResult == $testResult){
            return true;
        } else return false;
    }

    $error = false;
    $lengthOfAllTests = count($testNums);

    for ($i = 0; $i < $lengthOfAllTests; $i++){
        $result = testRun($testNums[$i][0], $testNums[$i][1], $answers[$i]);
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
