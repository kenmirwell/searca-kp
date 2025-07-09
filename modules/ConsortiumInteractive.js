class ConsortiumInteractive {
  constructor() {}

  handleTrasition() {
      const keyPoints = document.querySelectorAll(".key-point");
      const images = document.querySelectorAll(".image-wrapper");

      keyPoints.forEach((item) => {
          item.addEventListener("mouseenter", function () {
            let index = item.getAttribute("data-index");

            images.forEach((img) => {
                img.style.opacity = img.getAttribute("data-index") === index ? "1" : "0";
            });

            keyPoints.forEach((kp) => {
                kp.style.backgroundColor = kp.getAttribute("data-index") === index ? "#0C5C32" : "transparent";
            });
          });
      });

      // Show the first image by default
      if (images.length > 0) {
          images[0].style.opacity = "1";
      }

      if (keyPoints.length > 0) {
        keyPoints[0].style.backgroundColor = "#0C5C32";
    }

      // Optional: Reset to first image when mouse leaves key points
      document.querySelector(".flex").addEventListener("mouseleave", function () {
          images.forEach((img, idx) => {
              img.style.opacity = idx === 0 ? "1" : "0";
          });

          keyPoints.forEach((kp, idx) => {
            kp.style.backgroundColor = idx === 0 ? "#0C5C32" : "transparent";
        });
      });
  }
}

export default ConsortiumInteractive;