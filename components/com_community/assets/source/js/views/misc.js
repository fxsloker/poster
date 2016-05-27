(function( root, $, factory ) {

    joms.view || (joms.view = {});
    joms.view.misc = factory( root, $ );

    define(function() {
        return joms.view.misc;
    });

})( window, joms.jQuery, function( window, $ ) {

var $main, $sidebar;

function initialize() {
    $main = $('.joms-main');
    $sidebar = $('.joms-sidebar');

    rearrangeModuleDiv();
    $( window ).on( 'resize', rearrangeModuleDiv );
}

var rearrangeModuleDiv = joms._.debounce(function() {
    if ( joms.screenSize() !== 'large' ) {
        if ( $sidebar.nextAll('.joms-main').length ) {
            $sidebar.insertAfter( $main );
        }
    } else {
        if ( $sidebar.prevAll('.joms-main').length ) {
            $sidebar.insertBefore( $main );
        }
    }
}, 500 );

var fixSVG = joms._.debounce(function() {
    var url, svg;

    url = window.location.href;
    url = url.replace( /[#].*$/, '' );

    svg = $('.joms-icon use').not('.joms-icon--svg-fixed');
    svg.each(function() {
        var href;
        href = ( this.getAttribute('xlink:href') || '' );
        href = href.replace( /^[^#]*#/, url + '#' );
        this.setAttribute( 'xlink:href', href );
        this.setAttribute( 'class', 'joms-icon--svg-fixed' );
    });
}, 200 );

// Exports.
return {
    start: initialize,
    fixSVG: fixSVG
};

});
