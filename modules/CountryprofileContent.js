class CountryprofileContent {
  constructor() {}

  InitializeContent() {
    const content = document.querySelectorAll(".country-topic-content");
    const topics = document.querySelectorAll(".country-topic-category");

    content.forEach((data) => {
      data.style.display = data.getAttribute("data-index") === "0" ? "block" : "none";
    });

    topics.forEach((topic) => {
      const index = topic.getAttribute("data-index");
      topic.style.backgroundColor = index === "0" ? "#B59637" : "#096936";
      if (index === "0") topic.classList.add("active");
      else topic.classList.remove("active");
    });
  }

  handleChooseContent() {
    const topics = document.querySelectorAll(".country-topic-category");
    const content = document.querySelectorAll(".country-topic-content");

    topics.forEach((topic) => {
      topic.addEventListener("click", function () {
        const index = topic.getAttribute("data-index");

        content.forEach((data) => {
          data.style.display = data.getAttribute("data-index") === index ? "block" : "none";
        });

        topics.forEach((t) => {
          const tIndex = t.getAttribute("data-index");
          if (tIndex === index) {
            t.classList.add("active");
            t.style.backgroundColor = "#B59637";
          } else {
            t.classList.remove("active");
            t.style.backgroundColor = "#096936";
          }
        });
      });
    });
  }

  onMouseHover() {
    const topics = document.querySelectorAll(".country-topic-category");

    topics.forEach((topic) => {
      topic.addEventListener("mouseenter", () => {
        topic.style.backgroundColor = "#B59637";
      });

      topic.addEventListener("mouseleave", () => {
        if (!topic.classList.contains("active")) {
          topic.style.backgroundColor = "#096936";
        }
      });
    });
  }
}

export default CountryprofileContent;
