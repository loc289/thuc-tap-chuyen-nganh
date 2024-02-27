const dropdown = document.querySelector(".dropdown");

dropdown.addEventListener("mouseenter", () => {
    dropdown.querySelector(".dropdown-menu").style.display = "block";
});

dropdown.addEventListener("mouseleave", () => {
    dropdown.querySelector(".dropdown-menu").style.display = "none";
});
