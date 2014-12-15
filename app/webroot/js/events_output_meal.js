/**
 * Created by Daniel on 12/12/14.
 */
jQuery(function($) {

    $('.dd').nestable();
    $("button[data-action='collapse']").attr('style', 'display: none;');
    $("button[data-action='expand']").attr('style', 'display: true;');
    $('.dd-handle a').on('mousedown', function(e){
        e.stopPropagation();
    });
});