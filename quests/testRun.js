function testRun(phpFile) {
    var userCode = document.querySelector('textarea[name="user_code"]').value;
    var submitButton = document.getElementById('submit-button');

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
                openPopup("Congratulations", "Correct Answer! Don't forget to submit quest to earn points.");
            } else {
                submitButton.classList.add('disabled');
                submitButton.removeAttribute("onclick");
                openPopup("Wrong Answer", "Don't lose your spirit and try again!");
            }

        }
    };
    xhr.send("user_code=" + encodeURIComponent(userCode));
}
