// This makes the media list sortable
const sortable = new Sortable.default(document.querySelectorAll('tbody'), {
    draggable: 'tr'
});

// Every time the list is sorted it calls the saveState() function
sortable.on('sortable:sorted', () => saveState());

/**
 * Saves the new order of media
 */
function saveState() {

    // Collects the media ids
    let inputs = document.getElementsByClassName('medias');

    let new_order = [];

    // Loops through the media ids in order
    for (let i = 0; i < document.getElementById('mediaCount').value; i++) {

        // Pushes them into a new order array
        let val = inputs[i].value;
        new_order.push(val);

    }

    // Builds form data and adds the id of the playlist and the new order of the media to it
    const formData = new FormData();
    formData.append('id', document.getElementById('id').value);
    formData.append('new_order', new_order.toString());

    // Sends request of the new order
    fetch('act/playlist/save_state.php', {method: "post", body: formData})
        .then((response) => response.text())
        .then((html) => {
                if (html.includes("succes")) {
                    console.log('success');
                }
            }
        );
}

/**
 * Takes user to the edit playlist page
 * @param id
 */
function editPlaylist(id) {
    window.location.href = `edit-playlist?id=${id}`;
}
