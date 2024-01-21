
// Menu controls
function menuControls() {
    // objects    
    var body = document.body;
    var sideMenu = document.querySelector("#side-menu");
    var layer = document.querySelector("#layer");

    var search = document.querySelector("#search");
    var searchContent = document.querySelector("#search-content");

    // click on layer
    if (layer) {
        layer.addEventListener('click', function () {
            body.classList.remove('overflow-hidden');
            sideMenu.classList.remove('d-block');
            layer.classList.remove('d-block');
            searchContent.classList.remove('d-block');
        });
    }

    // click on search
    if (search) {
        search.addEventListener('click', function (e) {
            e.preventDefault();

            console.log(searchContent);

            searchContent.classList.add('d-block');
            body.classList.add('overflow-hidden');
            layer.classList.add('d-block');
        })
    }

    // click on menu
    let menu = document.querySelector("#menu");
    if (menu) {

        menu.addEventListener('click', function (e) {
            e.preventDefault();

            sideMenu.classList.add('d-block');

            body.classList.add('overflow-hidden');
            layer.classList.add('d-block');
        })
    }
}
menuControls();

// Function to add padding top main of the size of the fixed menu
function marginMain() {
    let header = document.querySelector("#header");
    var headerHeight = header.clientHeight;

    let main = document.querySelector("#main");
    main.style.marginTop = headerHeight + 'px';
}
marginMain();