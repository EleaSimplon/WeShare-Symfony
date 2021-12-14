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
    //SELECT
    $(document).ready(function(){
        $('#post_categories').formSelect();
    });
   
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });