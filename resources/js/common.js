const toTop = document.querySelector('.to-top');
window.onscroll = function() {
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        toTop.classList.add("visible")
    } else {
        toTop.classList.remove("visible")
    }
};

toTop.addEventListener('click', function () {
    window.scroll({top: 0, left: 0, behavior: 'smooth'});
});
