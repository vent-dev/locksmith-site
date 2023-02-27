let slides = document.getElementsByClassName("slides");

let slideIndex = 0;

function showSlides(){

    for (let i = 0; i < slides.length; i++){
        slides[i].style.display = "none";
    }

    if (slideIndex >= slides.length){ slideIndex = 0; }
    slides[slideIndex].style.display = "flex";
    slideIndex++;
    setTimeout(showSlides, 2000)
}

showSlides();