let clicked = 0;

$(".toggle-password").click(function (e) {
    e.preventDefault();

    $(this).toggleClass("toggle-password");

    if (clicked == 0) {
        $(this).html('<span class="material-icons">visibility_off</span >');
        clicked = 1;
    } else {
        $(this).html('<span class="material-icons">visibility</span >');
        clicked = 0;
    }

    let inputPassword = $('#registration_form_Password');
    let inputAttr = inputPassword.attr("type");

    if (inputAttr == "password") {

        inputPassword.attr("type", "text");

    } else {
        inputPassword.attr("type", "password");
    }

})