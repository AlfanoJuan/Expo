function showButtons() {
    showElements('header-btn-eventMap');
    showElements('header-btn-assistance');
    showElements('arrow-header');
}



function showElements(_className) {
    var elements = document.getElementsByClassName(_className);
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].classList.contains('notDisplay')) {
            elements[i].classList.remove('notDisplay');
        } else {
            elements[i].classList.add('notDisplay');
        }
    }
}




