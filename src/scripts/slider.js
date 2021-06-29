var slideIndex = [1, 1];
var slideId = ["slider1", "slider2"];
var dotsId = ["dots1", "dots2"];
showSlides(1, 0);
showSlides(1, 1);
// showSlides(1, 2);

function plusSlides(n, no) {
    showSlides(slideIndex[no] += n, no);
}

function currentSlide(n, no) {
    showSlides(slideIndex[no] = n, no);
}

function showSlides(n, no) {
    var i;
    var slides = document.getElementsByClassName(slideId[no]);
    var dots = document.getElementsByClassName(dotsId[no]);
    if (n > slides.length) { slideIndex[no] = 1 }
    if (n < 1) { slideIndex[no] = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex[no] - 1].style.display = "block";
    dots[slideIndex[no] - 1].className += " active";
}