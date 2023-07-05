$(document).ready(function(){

    var src = $(".audio-player").data('audio');
    const audioPlayer = document.querySelector(".audio-player");
    const audio = new Audio(
        src
        );

    audio.addEventListener(
        "loadeddata",
        () => {
            audioPlayer.querySelector(".time .length").textContent = getTimeCodeFromNum(
                audio.duration
                );
            audio.volume = .75;
        },
        false
        );

//click on timeline to skip around
const timeline = audioPlayer.querySelector(".timeline");
timeline.addEventListener("click", e => {
    const timelineWidth = window.getComputedStyle(timeline).width;
    const timeToSeek = e.offsetX / parseInt(timelineWidth) * audio.duration;
    audio.currentTime = timeToSeek;
}, false);

//click volume slider to change volume
const volumeSlider = audioPlayer.querySelector(".controls .volume-slider");
volumeSlider.addEventListener('click', e => {
    const sliderWidth = window.getComputedStyle(volumeSlider).width;
    const newVolume = e.offsetX / parseInt(sliderWidth);
    audio.volume = newVolume;
    audioPlayer.querySelector(".controls .volume-percentage").style.width = newVolume * 100 + '%';
}, false)

//check audio percentage and update time accordingly
setInterval(() => {
    const progressBar = audioPlayer.querySelector(".progress");
    progressBar.style.width = audio.currentTime / audio.duration * 100 + "%";
    audioPlayer.querySelector(".time .current").textContent = getTimeCodeFromNum(
        audio.currentTime
        );
}, 500);

//toggle between playing and pausing on button click
const playBtn = audioPlayer.querySelector(".controls .toggle-play");
playBtn.addEventListener(
    "click",
    () => {
        if (audio.paused) {
            playBtn.classList.remove("play");
            playBtn.classList.add("pause");
            audio.play();
        } else {
            playBtn.classList.remove("pause");
            playBtn.classList.add("play");
            audio.pause();
        }
    },
    false
    );

audioPlayer.querySelector(".volume-button").addEventListener("click", () => {
    const volumeEl = audioPlayer.querySelector(".volume-container .volume");
    audio.muted = !audio.muted;
    if (audio.muted) {
        volumeEl.classList.remove("icono-volumeMedium");
        volumeEl.classList.add("icono-volumeMute");
    } else {
        volumeEl.classList.add("icono-volumeMedium");
        volumeEl.classList.remove("icono-volumeMute");
    }
});

//turn 128 seconds into 2:08
function getTimeCodeFromNum(num) {
    let seconds = parseInt(num);
    let minutes = parseInt(seconds / 60);
    seconds -= minutes * 60;
    const hours = parseInt(minutes / 60);
    minutes -= hours * 60;

    if (hours === 0) return `${minutes}:${String(seconds % 60).padStart(2, 0)}`;
    return `${String(hours).padStart(2, 0)}:${minutes}:${String(
        seconds % 60
        ).padStart(2, 0)}`;
}

// sadsafdadf


var src = $(".audio-player-2").data('audio');
const audioPlayer2 = document.querySelector(".audio-player-2");
const audio2 = new Audio(
    src
    );

audio.addEventListener(
    "loadeddata",
    () => {
        audioPlayer2.querySelector(".time-2 .length-2").textContent = getTimeCodeFromNum(
            audio2.duration
            );
        audio2.volume = .75;
    },
    false
    );

//click on timeline to skip around
const timeline2 = audioPlayer2.querySelector(".timeline-2");
timeline2.addEventListener("click", e => {
    const timelineWidth = window.getComputedStyle(timeline2).width;
    const timeToSeek = e.offsetX / parseInt(timelineWidth) * audio2.duration;
    audio2.currentTime = timeToSeek;
}, false);

//click volume slider to change volume
const volumeSlider2 = audioPlayer2.querySelector(".controls-2 .volume-slider-2");
volumeSlider2.addEventListener('click', e => {
    const sliderWidth2 = window.getComputedStyle(volumeSlider2).width;
    const newVolume2 = e.offsetX / parseInt(sliderWidth2);
    audio2.volume = newVolume2;
    audioPlayer2.querySelector(".controls .volume-percentage").style.width = newVolume2 * 100 + '%';
}, false)

//check audio percentage and update time accordingly
setInterval(() => {
    const progressBar2 = audioPlayer2.querySelector(".progress-2");
    progressBar2.style.width = audio2.currentTime / audio2.duration * 100 + "%";
    audioPlayer2.querySelector(".time-2 .current-2").textContent = getTimeCodeFromNum(
        audio2.currentTime
        );
}, 500);

//toggle between playing and pausing on button click
const playBtn2 = audioPlayer2.querySelector(".controls-2 .toggle-play-2");
playBtn2.addEventListener(
    "click",
    () => {
        if (audio2.paused) {
            playBtn2.classList.remove("play");
            playBtn2.classList.add("pause");
            audio.play();
        } else {
            playBtn2.classList.remove("pause");
            playBtn2.classList.add("play");
            audio2.pause();
        }
    },
    false
    );

audioPlayer2.querySelector(".volume-button").addEventListener("click", () => {
    const volumeEl2 = audioPlayer2.querySelector(".volume-container .volume");
    audio2.muted = !audio2.muted;
    if (audio.muted) {
        volumeEl2.classList.remove("icono-volumeMedium");
        volumeEl2.classList.add("icono-volumeMute");
    } else {
        volumeEl2.classList.add("icono-volumeMedium");
        volumeEl2.classList.remove("icono-volumeMute");
    }
});

//turn 128 seconds into 2:08
function getTimeCodeFromNum(num) {
    let seconds = parseInt(num);
    let minutes = parseInt(seconds / 60);
    seconds -= minutes * 60;
    const hours = parseInt(minutes / 60);
    minutes -= hours * 60;

    if (hours === 0) return `${minutes}:${String(seconds % 60).padStart(2, 0)}`;
    return `${String(hours).padStart(2, 0)}:${minutes}:${String(
        seconds % 60
        ).padStart(2, 0)}`;
}

// sadsafdadf

})
