(function (window, document, $) {
    'use strict';
    hideloading();
    $('#message_form').on('submit', function () {
        showloading();
    });
    $('.delete_content').on('click', function () {
        showloading();
    });
})(window, document, jQuery);