<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $user_code = $_POST['user_code'];
    
    $num1 = 1;
    $num2 = 2;
    
    
    function runTest($user_code, $num1, $num2){

        eval($user_code);

        $result = twoSum($num1, $num2);

        if($result == 3){
            return "Doğru";
        }
        else{
            return "Yanlış";
        }
    }


    $test_result = runTest($user_code, $num1, $num2);
    echo $test_result;




}






/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kullanıcının girdiği PHP kodunu al
    $user_code = $_POST['php_code'];

    // Test için iki sayı tanımla
    $num1 = 1;
    $num2 = 2;

    // Dinamik olarak test edilecek kod parçasını oluştur
    $test_code = "
        // Kullanıcının girdiği kodu çalıştır
        $user_code

        // Kullanıcının kodunu test et
        \$result = twoSum($num1, $num2);

        // Sonucu kontrol et
        if (\$result == 3) {
            echo 'Kullanıcının kodu doğru çalışıyor.';
        } else {
            echo 'Kullanıcının kodu yanlış çalışıyor.';
        }
    ";

    // Dinamik olarak oluşturulan kodu eval() fonksiyonuyla çalıştır
    eval($test_code);
} */




?>
