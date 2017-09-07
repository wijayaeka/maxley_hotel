<!-- Tooltip -->  
$('[data-toggle="tooltip"]').tooltip('hide');

<!-- Up -->
$('.up').click(function(){
    $('html').animate({scrollTop:0}, 'slow');
});
    
<!-- Playlist -->    
$('.btn-playlist').click(function(){
    $('#playlist').slideToggle('normal');
});

<!-- Player -->   
$( function() { $( 'audio' ).audioPlayer(); } );