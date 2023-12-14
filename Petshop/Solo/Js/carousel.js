const slides = document.querySelectorAll(".slide")
var contador = 0;

// console.log(slides)
slides.forEach (
(slide, index) => {
    slide.style.left = `${index * 100}%`
})

const goRetornar = () => {
    if (contador == 0) {
        contador = slides.length - 1;
        slideImage();
    } else {
        contador--;
        slideImage();
    }
}

const goAvancar = () => {
    if (contador == slides.length - 1) {
        contador = 0;
        slideImage();
    } else {
        contador++;
        slideImage();
    }
}

const slideImage = () => {
    slides.forEach(
        (slide) => {
            slide.style.transform = `translateX(-${contador * 100}%)`
        }
    )
}