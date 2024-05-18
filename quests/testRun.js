function testRun(phpFile) {
    var userCode = document.querySelector('textarea[name="user_code"]').value;
    var submitButton = document.getElementById('submit-button');
    var resultMessage = document.getElementById('output');

    var xhr = new XMLHttpRequest();
    xhr.open("POST", phpFile + "?t=" + new Date().getTime(), true);
    //kodun normal hali -> xhr.open("POST", phpFile, true);
    //cache'e alınmasını önlemek için anlık olarak tarihi alıp request url'ye eklemektedir
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;

            if (response.trim() === "passed") {
                submitButton.classList.remove('disabled');
                submitButton.setAttribute("onclick", "submitCode()");
                resultMessage.innerHTML = "Correct Answer!";
            } else {
                submitButton.classList.add('disabled');
                submitButton.removeAttribute("onclick");
                resultMessage.innerHTML = "Wrong Answer!";
            }

        }
    };
    xhr.send("user_code=" + encodeURIComponent(userCode));
}
