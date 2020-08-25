/**
 * This js script is non page specific and is included on every page.
 */

// Check login against session
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

// On window load
$(document).ready(function() {
    // Check login on evey page apart from the login
    if(location.href.split('/').pop() !== '/' && location.href.split('/').pop() !== 'index') {
        checkLogin();
    }
});
