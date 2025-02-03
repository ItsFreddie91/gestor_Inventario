const cloud = document.getElementById("nube");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll(".botones_textos");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");
const body = document.body;

// Cargar preferencias al cargar la página
document.addEventListener("DOMContentLoaded", () => {
    const darkMode = localStorage.getItem("dark-mode");
    const barraLateralState = localStorage.getItem("barra-lateral");

    // Aplicar modo oscuro si está activado
    if (darkMode === "enabled") {
        body.classList.add("dark-mode");
        circulo.classList.add("prendido");
    }

    // Aplicar el estado de la barra lateral
    if (barraLateralState === "mini") {
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span) => {
            span.classList.add("oculto");
        });
    }else if (barraLateralState === "max") {
        barraLateral.classList.add("max-barra-lateral");
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    }
});

// Alternar el modo oscuro y guardar la preferencia
palanca.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
    circulo.classList.toggle("prendido");

    if (body.classList.contains("dark-mode")) {
        localStorage.setItem("dark-mode", "enabled");
    } else {
        localStorage.setItem("dark-mode", "disabled");
    }
});

// Alternar el estado de la barra lateral con el botón del menú
menu.addEventListener("click", () => {
    barraLateral.classList.toggle("max-barra-lateral");
    if (barraLateral.classList.contains("max-barra-lateral")) {
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
        localStorage.setItem("barra-lateral", "max");
    } else {
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
        localStorage.setItem("barra-lateral", "complete");
    }

    if (window.innerWidth <= 320) {
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span) => {
            span.classList.add("oculto");
        });
        localStorage.setItem("barra-lateral", "mini");
    }
});

// Alternar la barra lateral con el botón de nube
cloud.addEventListener("click", () => {
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span) => {
        span.classList.toggle("oculto");
    });

    // Guardar estado de la barra lateral
    if (barraLateral.classList.contains("mini-barra-lateral")) {
        localStorage.setItem("barra-lateral", "mini");
    } else {
        localStorage.setItem("barra-lateral", "complete");
    }
});
