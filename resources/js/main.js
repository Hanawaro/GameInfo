$(document).ready(function () {

    $('#copy').click(function () {
        let alertBox = $('.messenger .alert-success');
        if (!alertBox.hasClass('active')) {
            alertBox.addClass('active');

            let url = document.getElementById("url");
            url.innerHTML = window.location.href;
            url.select();
            document.execCommand("copy");

            setTimeout(function () {
                alertBox.removeClass('active');
            }, 3000);
        }
    });

    $('.nav-item').click(function () {
        // set tab button
        let input = $(this).find('input').first();
        input.prop('checked', true);

        // get current input and check
        let current = $(`.tab-content input[name=${input.data('for')}]`).first();
        current.prop('checked', true);

        // clear others
        let tabs = $('.tab-content label');
        tabs.removeClass('active');

        // set new current
        let label = $(`.tab-content label[for='${current.attr('id')}']`);
        label.addClass('active');
        $(`#${tabs.attr('for')}`).prop('checked', true);
    });

    $('.type .nav-link').click(function () {
        let input = $(this).find('input').first();
        input.prop('checked', true);
    });

    $('.tab-content label').click(function() {
        $('.tab-content label').removeClass('active');
        $(this).addClass('active');
    });

});

