class FaqAccPage {
    constructor() {}

    handlePageFaqAcc(elementId, index) {
        const accElement = document.getElementById(elementId)

        const height = accElement.offsetHeight;

        console.log(height)
        for(let i = 0; i < 6; i++) {
            if(index !== i) {
                document.getElementById(`page-answer-container-${i}`).style.height = 0;
                document.getElementById(`page-faq-group-${i}`).classList.remove("page-active-faq")
            } else {
                document.getElementById(`page-answer-container-${i}`).style.height = height+"px";
                document.getElementById(`page-faq-group-${i}`).classList.add("page-active-faq")
            }
        }

        // if( accContainer.classList.contains("active") ) {
        //     accContainer.style.height = 0
        //     accContainer.classList.remove("active")
        //     accHead.style.paddingBottom = 0
        // } else {
        //     accContainer.style.height = height+"px"
        //     accContainer.classList.add("active")
        //     accHead.style.paddingBottom = "10px"
        // }
    }
}

export default FaqAccPage;