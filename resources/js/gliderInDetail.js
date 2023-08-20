import "../../node_modules/glider-js/glider"

new Glider(document.querySelector(".glider"), {
    slidesToShow: 1,
    dots: ".dots",
    draggable: true,
    arrows: {
        prev: ".prev",
        next: ".next",
    },
});
