function testRun() {
    var userCode = document.querySelector('textarea[name="user_code"]').value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "twoSum.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            document.getElementById("output").innerHTML = response;
            console.log(response);
        }
    };
    xhr.send("user_code=" + encodeURIComponent(userCode));
}
