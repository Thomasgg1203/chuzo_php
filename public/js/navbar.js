function Menu() {
    let menu = document.querySelector('.menu');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
}


//Codigo Carrucel
let slideIndex = 1;
showSlides(slideIndex)

function plusSlides(n) {
    showSlides(slideIndex += n)
}
function currentSlide(n) {
    showSlides(slideIndex = n)
}
function showSlides(n) {
    let i;
    let slides = document.querySelectorAll(".mySlides");
    let quadrates = document.querySelectorAll(".quadrate");
    if (n > slides.length) slideIndex = 1
    if (n < 1) slideIndex = slides.length
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"
    }
    for (i = 0; i < quadrates.length; i++) {
        quadrates[i].className = quadrates[i].className.replace("active", "")
    }
    slides[slideIndex - 1].style.display = "block";
    quadrates[slideIndex - 1].className += " active";
}
//Ventaja emergente
function showAlert() {
    var alertBox = document.getElementById("alertBox");
    alertBox.style.display = "block";
}

function closeAlert() {
    var alertBox = document.getElementById("alertBox");
    alertBox.style.display = "none";
}
