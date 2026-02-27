const periodToggle = document.querySelector(".price .main-toggle-wrapper");
const slides = document.querySelectorAll(".price .swiper-slide");

console.log(periodToggle, slides);
if (periodToggle && slides.length) {
  const toggleActiveSlides = () => {
    slides.forEach((slide) => {
      slide.classList.toggle("active");
      slide.classList.toggle("visually-hidden");
    });
  };

  periodToggle.addEventListener("change", toggleActiveSlides);
}
