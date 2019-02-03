$(function() {

    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('select').formSelect();


    $('#menu-button').click(function(){
        $('.sidenav').sidenav('open');
    });

});