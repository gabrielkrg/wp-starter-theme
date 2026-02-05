import '../scss/styles.scss';

// Menu controls
function menuControls() {
    // objects    
    var body = document.body;
    var sideMenu = document.querySelector("#side-menu");
    var layer = document.querySelector("#layer");

    var search = document.querySelector("#search");
    var searchContent = document.querySelector("#search-content");

    var closeControls = document.querySelectorAll("#close");

    // click on layer
    if (layer) {
        layer.addEventListener('click', function () {
            body.classList.remove('overflow-hidden');
            sideMenu.classList.remove('block');
            layer.classList.remove('block');
            searchContent.classList.remove('flex');
        });
    }

    // click on close
    if (closeControls) {
        closeControls.forEach(element => {
            element.addEventListener('click', function () {
                body.classList.remove('overflow-hidden');
                sideMenu.classList.remove('block');
                layer.classList.remove('block');
                searchContent.classList.remove('flex');
            });
        });
    }

    // click on search
    if (search) {
        search.addEventListener('click', function (e) {
            e.preventDefault();
            searchContent.classList.toggle('flex');
        })
    }

    // click on menu
    let menu = document.querySelector("#menu");
    if (menu) {
        menu.addEventListener('click', function (e) {
            e.preventDefault();

            sideMenu.classList.add('block');
            body.classList.add('overflow-hidden');
            layer.classList.add('block');
        })
    }
}
menuControls();

// Function to add padding top main of the size of the fixed header
function marginMain() {
    let header = document.querySelector("#header");
    if (header) {
        var headerHeight = header.clientHeight;

        let main = document.querySelector("#main");
        if (main) {
            main.style.marginTop = headerHeight + 'px';
        }
    }
}
marginMain();
