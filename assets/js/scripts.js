// search
let search = document.querySelector("#search");
if (search) {
    search.addEventListener('click', function (e) {
        e.preventDefault();

        let searchForm = document.querySelector("#search-form");
        searchForm.classList.toggle('d-block');
    })
}

// menu
let menu = document.querySelector("#menu");
if (menu) {
    menu.addEventListener('click', function (e) {
        e.preventDefault();

        let sideMenu = document.querySelector("#side-menu");
        sideMenu.classList.toggle('d-block');
    })
}