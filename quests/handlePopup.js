function openPopup(title, text){
    popupContainer = document.getElementById("popup-container");
    popupTitle = document.getElementById("popup-title"); 
    popupText = document.getElementById("popup-text");

    popupTitle.innerHTML = title;
    popupText.innerHTML = text;
    popupContainer.className = "";
    popupContainer.classList.add("active");
    document.body.classList.add("popup-active");
}

//to close popup
document.getElementById("popup-close-button").addEventListener("click", function(){
    document.getElementById("popup-container").classList.add("out");
    document.body.classList.remove("popup-active");
});