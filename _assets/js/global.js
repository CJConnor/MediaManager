/**
 * This js script is non page specific and is included on every page.
 */

/**
 * Check login against session
 */
function checkLogin() {
    fetch('act/login/login_session.php')
    .then((response) => response.text())
    .then((html) => {
        if(html.includes('expired')) {
            window.location.href = 'index';
        }
    })
    .catch((error) => {
        console.warn(error);
    });
}


/**
 * Plays the selected media
 * @param id
 */
function play(id) {

    // Build form data
    const formData = new FormData();
    formData.append('id', id);

    // Fetch player content for the modal
    fetch('inc/media/player', {method: "post", body: formData})
        .then((response) => response.text())
        .then((html) => {

                // Places content in the modal and displays the modal
                let playerModal = document.getElementById('player-modal');
                playerModal.innerHTML = html;
                playerModal.classList.add('d-block');
            }
        );

}

/**
 * Closes the media player
 */
function closePlayer() {

    let player = document.getElementById('player-modal');

    player.classList.remove('d-block');
    player.innerHTML = "";

}

// On window load
$(document).ready(function() {
    // Check login on evey page apart from the login or Register
    if(location.href.split('/').pop() !== '/' && location.href.split('/').pop() !== 'index' && location.href.split('/').pop() !== 'register') {
        checkLogin();
    }
});
