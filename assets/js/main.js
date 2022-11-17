function toggleScroll() {
    if ($('body').hasClass('modal-active')) {
        $('body').removeAttr('class')
    } else {
        $('body').addClass('modal-active')
    }
}