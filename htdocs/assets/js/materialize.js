$(document).ready(function(){
    // TABS
    $('.tabs').tabs();
    // NAV BAR
    $('#navbarDropdown').mouseenter(function() {
        $('.dropdown-menu').slideToggle(300, "linear");
    });
      
    $('.dropdown-menu').mouseleave(function() {
        $(this).slideToggle(300, "linear");
    });
    //COLLAPSIBLE (ACCORDION)
    $('.collapsible').collapsible();
});