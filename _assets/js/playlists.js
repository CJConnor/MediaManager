function addPlaylist() {
    window.location.href = 'add-playlist';
}

function view(id) {
    window.location.href = `playlist?id=${id}`;
}

function deletePlaylist(id) {
    window.location.href = `act/playlist/delete?id=${id}`;
}