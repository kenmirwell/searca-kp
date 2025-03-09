class KmFilterAcc {
    constructor() {}

    handleKmFilterAcc(elementId, groupId, index) {
        const accElement = document.getElementById(elementId)

        const height = accElement.offsetHeight < 200 ? accElement.offsetHeight : 200;

        for(let i = 0; i < 4; i++) {
            if(index !== i) {
                document.getElementById(`km-side-filter-container-${i}`).style.height = 0;
                document.getElementById(`km-side-filter-container-${i}`).style.margin = "0";
            } else {
                document.getElementById(`km-side-filter-container-${i}`).style.height = height+"px";
                document.getElementById(`km-side-filter-container-${i}`).style.margin = "10px 0";
            }
        }
    }
}

export default KmFilterAcc;