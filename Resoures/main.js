$('document').ready(function () {
    $('.push').click(function () {
        $('.slideTable').slideToggle(1500);
        if ($('.push').attr("src") == "../Storage/Images/minus.png") {
            $('.push').attr("src", "../Storage/Images/plus.png");
        } else {
            $('.push').attr("src", "../Storage/Images/minus.png")
        }
    });
});

