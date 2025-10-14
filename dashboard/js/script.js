document.addEventListener("DOMContentLoaded", function(){
    const popup = document.getElementById('popup-form');
    const openPopupBtn = document.getElementById('open-popup');
    const closeBtn = document.getElementById('close');
        
    if(openPopupBtn){
        openPopupBtn.onclick = function() {
            popup.style.display = "block";
        }
    }
    if(closeBtn){
        closeBtn.onclick = function() {
            popup.style.display = "none";
        }
    }
    
    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }
});
