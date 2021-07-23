var carouselContainers = document.querySelectorAll('.carousel-container');

for (var i = 0; i < carouselContainers.length; i++) {
    var container = carouselContainers[i];
    initCarouselContainer(container);
}

function initCarouselContainer(container) {
    var options = {
        accessibility: true,
        prevNextButtons: false,
        pageDots: true
    };
    var carousel = container.querySelector('.carousel');
    var flkty = new Flickity(carousel, options);

    flkty.on('select');

}