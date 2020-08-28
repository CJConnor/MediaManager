/**
 * Takes user to the add playlist page
 */
function addPlaylist() {
    window.location.href = 'add-playlist';
}

/**
 * Takes user to the selected playlist page
 * @param id
 */
function view(id) {
    window.location.href = `playlist?id=${id}`;
}

/**
 * Deletes the selected playlist for the user
 * @param id
 */
function deletePlaylist(id) {
    if (confirm('Are you sure you wish to delete this playlist?'))
        window.location.href = `act/playlist/delete?id=${id}`;
}