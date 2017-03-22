jQuery(document).ready(function(){
 alert();
   /* $('#maisprodutos').click(function(e){  
        e.preventDefault(); 
        var offset = 1;
        $.post(
            WPaAjax.ajaxurl,
            {
                action : 'mais_produtos',
                offset : offset
            },
            function( response ) {
                $('#list-prod').append( 'ok' );
            }
        );
    });*/

    jQuery('select[name="linha-produto"]').change(function(){
        alert();
    }

});