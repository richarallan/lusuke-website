const scrollLinks = document.querySelector(".menu__link--risk");
const botLink = document.querySelector(".footer__menu li a");

// for (const link of scrollLinks) {
//     link.addEventListener("click", clickHandler);
// }

scrollLinks.addEventListener("click", clickHandler);
botLink.addEventListener("click", clickHandler);

function clickHandler(e) {
    e.preventDefault();
    const href = this.getAttribute("href");
    const offsetTop = document.querySelector(href).offsetTop;

    scroll({
        top: offsetTop,
        behavior: "smooth"
    });
}