jQuery(document).ready(function($) {

    var comments_activate = function(evt) {
        evt.preventDefault();
        var col1 = $('#thought-content');
        var col2 = $('#thougth-aside');

        col1.removeClass('span9');
        col2.removeClass('span3');
        col1.addClass('span6');
        col2.addClass('span6 expanded');
    }


    /*
     * EVENT LISTENERS:
     */
    $('.activate-comments').on('click', comments_activate);
});