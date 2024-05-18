function submitCode() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submit.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("php executed! -> " + xhr.responseText);
            var response = xhr.responseText;
            console.log(response);
            //if (response === "done") -> pop up
        }
    };
    xhr.send();
}
