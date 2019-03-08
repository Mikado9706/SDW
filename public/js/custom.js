$(function() {

    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('select').formSelect();


    $('#menu-button').click(function(){
        $('.sidenav').sidenav('open');
    });

    $("form[name='search'] .etc").click(function() {
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.notSearch').each(function(){
                $(this).addClass('disabled');
            });

        }else{
            $(this).addClass('active');

            $('.notSearch').each(function(){
                $(this).removeClass('disabled');
            });
        }
    });

});