class CustomVideoButton {
    constructor() {}

    handleCustomVideoButton(elementId, index) {
        const video = document.getElementById("cadrein-action-video")
        const playPauseBtn = document.getElementById('play-pause-btn');
        const overlay = document.getElementById('c-a-video-overlay');
        const container = document.getElementById('c-a-video-container');
    
        container.addEventListener('click', (e) => {
            if (video.paused) {
                video.play();
                overlay.style.opacity = "0"
                playPauseBtn.style.opacity = "0"
            } else {
                video.pause();
                overlay.style.opacity = "0.5"
                playPauseBtn.style.opacity = "1"
            }
        });

        // container.addEventListener('click', (e) => {
        //     if (!video.paused) {
        //         console.log("e", e)
        //         video.pause();
        //         overlay.style.opacity = "0.5"
        //         playPauseBtn.style.opacity = "1"
        //     }
        // });
    }    
}

export default CustomVideoButton;