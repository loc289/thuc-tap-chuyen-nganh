const dropdown = document.querySelector(".dropdown");

dropdown.addEventListener("mouseenter", () => {
  dropdown.querySelector(".dropdown-menu").style.display = "block";
});

dropdown.addEventListener("mouseleave", () => {
  dropdown.querySelector(".dropdown-menu").style.display = "none";
});

// Like btn
document.getElementById("likeButton").addEventListener("click", function () {
  var likeImage = document.querySelector(".likeImage");

  // Check if the current image is 'like.svg', then toggle to 'liked.svg' and vice versa
  if (likeImage.src.includes("like.svg")) {
    likeImage.src = "static/assets/button/liked.svg";
  } else {
    likeImage.src = "static/assets/button/like.svg";
  }
});

// Swiper
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 4,
  slidesPerGroup: 6,
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
