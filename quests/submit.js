function submitCode() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submit.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            console.log(response);
            if (response === "not_logged_in") {
                openPopup(
                    "Not logged in",
                    "You have to log in to earn points!"
                );
            } else if (response === "user_not_found") {
                openPopup(
                    "User not found",
                    "There is a problem with your account, you can try to create a new account!"
                );
            } else if (response === "already_solved") {
                openPopup(
                    "Already solved",
                    "Go to new adventures and complete quests"
                );
            } else if (response === "successfully_solved") {
                openPopup(
                    "You successfully earned points",
                    "Go to new adventures and complete quests"
                );
            }
        }
    };
    xhr.send();
}
