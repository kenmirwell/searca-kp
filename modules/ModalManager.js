import ENV_VARS from "../src/config.js"

class ModalManager {
    constructor() {
        this.modalStatus = false; 
        this.currentModal = null; 
        this.typingTimer;
        this.isSpinnerVisible = false;
        this.currentPage = 1;
        this.pageOffset = 5;
        this.initialPage = 1;
        this.totalPages;
        this.pageIndex = 0;
    }


    toggleModal(id) {
        const modal = document.getElementById(id);

        if (this.modalStatus && this.currentModal === modal) {
            this.closeModal(modal);
        } else {
            if (this.currentModal) {
                this.closeModal(this.currentModal); 
            }
            this.openModal(modal);
        }
    }

    openModal(modal) {
        modal.style.display = "flex";
        this.modalStatus = true;
        this.currentModal = modal;
    }

    closeModal(modal) {
        modal.style.display = "none";
        this.modalStatus = false;
        this.currentModal = null;
        const inputField = document.getElementById("global-search");

        inputField.value = null
    }

    handleSearch() {
        const inputField = document.getElementById("global-search");
        const searchResults = document.getElementById("global-search-content");

        searchResults.innerHTML = `<div class="flex w-[100%] justify-center p-[20px]"><p>See your search results here</p></div>`

        inputField.addEventListener("input", (e) => this.typingLogic(e, this.isSpinnerVisible));
    }

    disableScrolling() {
        document.body.style.overflow = 'hidden';
    }

    enableScrolling() {
        document.body.style.overflow = 'scroll';
    }

    typingLogic(e) {
        const searchResults = document.getElementById("global-search-content");
        const paginationContainer = document.getElementById("pagination-container");
        const searchQuery = e.target.value.trim();
        const itemsPerPage = 8;
    
        clearTimeout(this.typingTimer);
    
        if (!paginationContainer) {
            console.error("Pagination container not found!");
            return;
        }
    
        if (!this.isSpinnerVisible) {
            searchResults.innerHTML = '<div class="loader-container"><div class="loader"></div></div>';
            this.isSpinnerVisible = true;
    
            this.renderPaginationControls(paginationContainer, this.currentPage, true);
        }
    
        this.typingTimer = setTimeout(() => {
            const getData = async (page = this.currentPage) => {
          
                if (searchQuery) {
                    try {
                        const [pagesResponse, postsResponse, customPostsResponse] = await Promise.all([
                            // fetch(`${ENV_VARS.API_URL}pages?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then((res) =>
                            //     res.status === 400 ? null : res
                            // ),
                            // fetch(`${ENV_VARS.API_URL}posts?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then((res) =>
                            //     res.status === 400 ? null : res
                            // ),
                            // fetch(`${ENV_VARS.API_URL}knowledge-management?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then((res) =>
                            //     res.status === 400 ? null : res
                            // ),
                            fetch(`${ENV_VARS.API_URL}pages?search=${searchQuery}`).then((res) =>
                                res.status === 400 ? null : res
                            ),
                            fetch(`${ENV_VARS.API_URL}posts?search=${searchQuery}`).then((res) =>
                                res.status === 400 ? null : res
                            ),
                            fetch(`${ENV_VARS.API_URL}knowledge-management?search=${searchQuery}`).then((res) =>
                                res.status === 400 ? null : res
                            ),
                        ]);
                        
                        const pages = !pagesResponse ? [] : await pagesResponse.json();
                        const posts = !postsResponse ? [] : await postsResponse.json();
                        const customPosts = !customPostsResponse ? [] : await customPostsResponse.json();

                        
                        // const totalPagesPages = !pagesResponse ? 1 : pagesResponse.headers.get("X-WP-TotalPages") || 1;
                        // const totalPagesPosts = !postsResponse ? 1 : postsResponse.headers.get("X-WP-TotalPages") || 1;
                        // const totalPagesCustomPosts = !customPostsResponse ? 1 : customPostsResponse.headers.get("X-WP-TotalPages") || 1;
                        
                        // this.totalPages = Math.max(totalPagesPages, totalPagesPosts, totalPagesCustomPosts);
                        
                        const response = [...pages, ...posts, ...customPosts];
                        const filterResponse = response.filter((item) => !item.acf.not_searchable);

                        this.totalPages = Math.ceil(filterResponse.length / itemsPerPage);

                        const startIndex = (this.currentPage - 1) * itemsPerPage;
                        const endIndex = startIndex + itemsPerPage;

                        const paginateResponse = filterResponse.slice(startIndex, endIndex);

                        if (filterResponse.length > 0) {
                            searchResults.innerHTML = paginateResponse
                                .map((i) => `
                                    <div class="flex flex-col gap-[5px] border-b-[1px] py-[20px]">
                                        <h1 class="font-[600]">${i.title.rendered}</h1>
                                        <div class="search-item-content text-[14px]">${i.content.rendered}</div>
                                        <div class="w-[100%] flex">
                                            <button class="text-left font-[600] text-[#196129] text-[14px]">
                                                <a href="${i.link}">View more</a>
                                            </button>
                                        </div>
                                    </div>
                                `)
                                .join("");
                            
                            this.renderPaginationControls(paginationContainer, this.currentPage, false, this.totalPages)
                            this.isSpinnerVisible = false;
                        } else {
                            this.isSpinnerVisible = false;

                            searchResults.innerHTML = `<div class="flex w-[100%] justify-center p-[20px]">
                                <p>No search matches for <span class="font-[600]">"${searchQuery}"</span></p>
                            </div>`;
                        }
                    } catch (error) {
                        console.error("Error fetching data:", error);
                    }
                } else {
                    searchResults.innerHTML = `<div class="flex w-[100%] justify-center p-[20px]">
                        <p>See your search results here</p>
                    </div>`;
                    this.isSpinnerVisible = false;
                }
            };
    
            getData();
        }, 1000);
    }

    pageButton(textContent, activePage, paginationContainer, disabled, from, index) {
        const button = document.createElement("button");
        button.textContent = textContent;
        button.disabled = disabled;

        if(from === "elipsis") {
            button.className = "elipsis";
        }

        if(from === "num") {
            button.className = "numbered-pagination-button";

            if (textContent === this.currentPage) {
                button.classList.add("active-page");
            }
        }

        button.addEventListener("click", () => this.changePage(activePage, index));
        paginationContainer.appendChild(button);
    }
    
    renderPaginationControls(paginationContainer, currentPage, isNotVisible, totalPages) {
        paginationContainer.innerHTML = "";

        if (isNotVisible) {
            return;
        } 


        if(this.currentPage !== 1) {
            this.pageButton("Prev", this.currentPage - 1, paginationContainer, this.currentPage === 1, "", "prev")
        }

        for (let i = this.initialPage; i <= Math.min(this.pageOffset, this.totalPages); i++) {
            this.pageButton(i, i, paginationContainer, false, "num", this.pageIndex++);
            this.pageIndex = this.pageIndex % 5;
        }

        if(this.totalPages > 1) {
            if(this.currentPage !== this.totalPages) {
                this.pageButton("Next", this.currentPage + 1, paginationContainer, this.currentPage === totalPages, "", "next")
            }
        }
    }
    
    changePage(activePage, index) {

        if (activePage < 1) {
            return
        };


        this.currentPage = activePage;

        // if(index === 4) {
        //     if(activePage !== this.totalPages){
        //         this.initialPage = this.initialPage + 1;
        //         this.pageOffset = this.pageOffset + 1;
        //     }
        // } else if(index === 0) {
        //    if(activePage !== 1) {
        //         this.initialPage = this.initialPage - 1;
        //         this.pageOffset = this.pageOffset - 1;
        //     }
        // } 
        // else if(index === "prev") {
        //     if(activePage !== 1) {
        //         this.initialPage = this.initialPage - 1;
        //         this.pageOffset = this.pageOffset - 1;
        //     }
        // } else if(index ===  "next") {
        //     if(activePage !== this.totalPages) {
        //         this.initialPage = this.initialPage + 1;
        //         this.pageOffset = this.pageOffset + 1;
        //     } 
        // } 


        this.typingLogic({ target: { value: document.getElementById("global-search").value.trim() } });
    }
}

export default ModalManager;
