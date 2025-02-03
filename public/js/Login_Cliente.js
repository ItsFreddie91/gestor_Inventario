const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach((inp) => {
    inp.addEventListener("focus", () => {
        inp.classList.add("active");
    });
    inp.addEventListener("blur", () => {
        if (inp.value != "") return;
        inp.classList.remove("active");
    });
});

toggle_btn.forEach((btn) => {
    btn.addEventListener("click", () => {
        main.classList.toggle("sign-up-mode");
    });
});

let currentIndex = 1; // Índice inicial
const totalImages = images.length; // Número total de imágenes

function moveSliderAuto() {
    // Calcula el siguiente índice
    currentIndex = currentIndex >= totalImages ? 1 : currentIndex + 1;

    let currentImage = document.querySelector(`.img-${currentIndex}`);
    images.forEach((img) => img.classList.remove("show"));
    currentImage.classList.add("show");

    const textSlider = document.querySelector(".text-group");
    textSlider.style.transform = `translateY(${-(currentIndex - 1) * 2.2}rem)`;

    bullets.forEach((bull) => bull.classList.remove("active"));
    bullets[currentIndex - 1].classList.add("active");
}

// Llamada automática cada 3 segundos
setInterval(moveSliderAuto, 3000);

bullets.forEach((bullet) => {
    bullet.addEventListener("click", moveSlider);
});