$('.toggle-password-visibility').click(function () {
    let passwordInput = $(this).siblings('.password-input');
    if($(passwordInput).hasClass('visible')) {
        $(passwordInput).removeClass('visible');
        $(passwordInput).attr('type', 'password');
    }else {
        $(passwordInput).addClass('visible');
        $(passwordInput).attr('type', 'text');
    }
});