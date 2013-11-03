jQuery( document ).ready(function( $ ) {
    $('body').on('click','.activate-comments',comments_activate);
    
    
    var comments_activate = function(evt){
        alert('hey!');
    }
});