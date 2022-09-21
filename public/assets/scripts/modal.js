let modal = document.querySelector(".modal");
let trigger = document.querySelector(".example");
let closeButton = document.querySelector(".close-button");
trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
function toggleModal() {
    console.log("ok");
    modal.classList.toggle("show-modal");
}
function windowOnClick(event) {
    if(event.target === modal) {
        toggleModal();
    }
}

