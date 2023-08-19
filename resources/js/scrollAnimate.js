import "../../node_modules/scrollreveal/dist/scrollreveal";

let slideDown = {
    distance: '50px',
    origin: 'top',
    opacity: 0.5,
    duration: 800
};

ScrollReveal().reveal('.slide-down', slideDown);

let slideLeft = {
    distance: '50px',
    origin: 'left',
    opacity: 0.5,
    duration: 800
};

ScrollReveal().reveal('.slide-Left', slideLeft);
