var carouselContainers = document.querySelectorAll('.carousel__container');

for (var i = 0; i < carouselContainers.length; i++) {
    var container = carouselContainers[i];
    initCarouselContainer(container);
}

function initCarouselContainer(container) {
    var options = {
        prevNextButtons: false,
        percentPosition: false,
        setGallerySize: true,
        wrapAround: true
    }
    var carousel = container.querySelector('.carousel');
    var flkty = new Flickity(carousel, options);
    // var imgs = carousel.querySelectorAll('.carousel-cell');

    flkty.on('select');

}