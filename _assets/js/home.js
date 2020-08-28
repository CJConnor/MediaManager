
// This makes the media table sortable
const sortable = new Sortable.default(document.querySelectorAll('tbody'), {
    draggable: 'tr'
});

// Every time the table is sorted call the saveState() function
sortable.on('sortable:sorted', () => saveState());

/**
 * This function saves the current order of the media files
 */
function saveState() {

    // This collects all of the media ids
    let inputs = document.getElementsByClassName('medias');

    let new_order = [];

    // Loop through ids in order
    for (let i = 0; i < document.getElementById('mediaCount').value; i++) {

        // Push them into the array in their new order
        let val = inputs[i].value;
        new_order.push(val);

    }

    // Build form data and append the new order to be posted
    const formData = new FormData();
    formData.append('new_order', new_order.toString());

    // Send request for the new order to be saved
    fetch('act/media/save_state.php', {method: "post", body: formData})
        .then((response) => response.text())
        .then((html) => {
                if (html.includes("succes")) {
                    console.log('success');
                }
            }
        );
}

/**
 * Takes user to the add media page
 */
function addMedia() {
    window.location.href = 'add-media';
}

/**
 * Deletes the selected media
 * @param id
 */
function deleteMedia(id) {
    if (confirm("Are you sure you wish to delete this media?"))
        window.location.href = `act/media/delete?id=${id}`;
}