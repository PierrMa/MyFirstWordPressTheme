$(window).scroll(function() {
    if($(window).height() + $(window).scrollTop() == $(document).height()) {
       $('#backToTop_button').css('display','block');
    }else{
        $('#backToTop_button').css('display','none');
    }
});

$('#backToTop_button').click(function(){
    scrollTo(0,0);
});
