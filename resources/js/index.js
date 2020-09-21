import "./common"

const supportsVideo = !!document.createElement('video').canPlayType;
if (supportsVideo) {

    let homeVideo = document.getElementById('video');
    const iconPlayer = document.getElementById('icon-Player');
    let home0 = document.querySelector('.home0');
    let home1 = document.querySelector('.home1');
    let header = document.querySelector('.header');

    let headerDisplay = "none"
    if(home1.offsetHeight < home1.offsetWidth)
        homeVideo.style.height =  (home1.offsetHeight - 5) + "px";
    else {
        homeVideo.style.width = home1.offsetWidth + "px";
        homeVideo.style.height = (home1.offsetHeight - 5) + "px";
        headerDisplay = "block"
    }




    iconPlayer.addEventListener('click', function (e) {
        home1.style.display = "none";
        header.style.display = headerDisplay;
        home0.style.display = "block";

        if (homeVideo.paused || homeVideo.ended) homeVideo.play();
        else homeVideo.pause();
    });

    homeVideo.onended = function() {
        home1.style.display = "block";
        header.style.display = "block";
        home0.style.display = "none";
    };

    homeVideo.addEventListener("ended", function (e) {
        home1.style.display = "block";
        header.style.display = "block";
        home0.style.display = "none";
    });

    homeVideo.addEventListener("paused", function (e) {
        home1.style.display = "block";
        header.style.display = "block";
        home0.style.display = "none";
    });
}
