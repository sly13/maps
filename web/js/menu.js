$( document ).ready(function() {

    var menuLeft = document.getElementById( 'map-filter' ),

    body = document.body;
    $('.showLeft').on('click', function(){
        classie.toggle( this, 'active' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeft' );
    });

    function disableOther( button ) {
        if( button !== 'showLeft' ) {
            classie.toggle( showLeft, 'disabled' );
        }
    }
});