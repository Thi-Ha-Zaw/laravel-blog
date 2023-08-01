import Swiper from "../../node_modules/swiper/swiper-bundle.min";

const swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 5,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
    },
    loop: true,
});


    // const categoryBtns = container.querySelectorAll(".category-btn");
    // categoryBtns.forEach((btn) => {
    //     console.log(btn);
    //     btn.addEventListener("click", function(e) {
    //         console.log("success")
    //     });
    // });
