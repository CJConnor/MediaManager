const sortable = new Sortable.default(document.querySelectorAll('tbody'), {
    draggable: 'tr'
});

sortable.on('sortable:sorted', () => saveState());

function saveState() {

    let inputs = document.getElementsByClassName('medias');

    console.log(inputs);

    let new_order = [];

    for (let i = 0; i < document.getElementById('mediaCount').value; i++) {

        let val = inputs[i].value;

        console.log(inputs[i]);

        new_order.push(val);

    }

    const formData = new FormData();
    formData.append('new_order', new_order.toString());

    fetch('act/media/save_state.php', {method: "post", body: formData})
        .then((response) => response.text())
        .then((html) => {
                if (html.includes("succes")) {
                    console.log('success');
                }
            }
        );
}

function addMedia() {
    window.location.href = 'add-media';
}

function deleteMedia(id) {
    window.location.href = `act/media/delete?id=${id}`;
}