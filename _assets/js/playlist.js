const sortable = new Sortable.default(document.querySelectorAll('tbody'), {
    draggable: 'tr'
});

sortable.on('sortable:sorted', () => saveState());

function saveState() {

    let inputs = document.getElementsByClassName('medias');

    let new_order = [];

    for (let i = 0; i < document.getElementById('mediaCount').value; i++) {

        let val = inputs[i].value;

        new_order.push(val);

    }

    const formData = new FormData();
    formData.append('id', document.getElementById('id').value);
    formData.append('new_order', new_order.toString());

    fetch('act/playlist/save_state.php', {method: "post", body: formData})
        .then((response) => response.text())
        .then((html) => {
                if (html.includes("succes")) {
                    console.log('success');
                }
            }
        );
}

function editPlaylist(id) {
    window.location.href = `edit-playlist?id=${id}`;
}
