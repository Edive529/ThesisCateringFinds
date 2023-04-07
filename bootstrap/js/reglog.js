const signInBtn = document.querySelector("#signInBtn");
const signUpBtn = document.querySelector("#signUpBtn");
const container = document.querySelector(".reglogcontainer");
const signInBtn2 = document.querySelector("#signInBtn2");
const signUpBtn2 = document.querySelector("#signUpBtn2");

signUpBtn.addEventListener("click", () => {
    container.classList.add("signUpMode");
}); 

signInBtn.addEventListener("click", () => {
    container.classList.remove("signUpMode");
});

signUpBtn2.addEventListener("click", () => {
    container.classList.add("signUpMode2");
}); 
signInBtn2.addEventListener("click", () => {
    container.classList.remove("signUpMode2");
});
