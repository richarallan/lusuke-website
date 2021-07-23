var docStyle = document.documentElement.style;
var transformProp = typeof docStyle.transform == 'string' ? 'transform' : 'WebkitTransform';

var carouselContainers = document.querySelectorAll('.carousel-container');

for (var i = 0; i < carouselContainers.length; i++) {
    var container = carouselContainers[i];
    initCarouselContainer(container);
}

function initCarouselContainer(container) {
    var options = {
        prevNextButtons: false,
        imagesLoaded: true,
        percentPosition: false
    }
    var carousel = container.querySelector('.carousel');
    var flkty = new Flickity(carousel, options);
    var imgs = carousel.querySelectorAll('.carousel-cell img');

    flkty.on('scroll', function () {
        flkty.slides.forEach(function (slide, i) {
            var img = imgs[i];
            var x = (slide.target + flkty.x) * -1 / 3;
            img.style[transformProp] = 'translateX(' + x + 'px)';
        })
    });

}