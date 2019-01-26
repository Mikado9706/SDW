$(function() {

    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();

    $('#menu-button').click(function(){
        $('.sidenav').sidenav('open');
    });

});