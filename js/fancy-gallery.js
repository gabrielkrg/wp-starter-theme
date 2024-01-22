jQuery(document).ready(function ($) {
    $('.wp-block-gallery').each(function () {
        $(this).find('a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".gif"]').attr('data-fancybox', 'gallery').attr('data-type', 'image');
    });

    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });
});