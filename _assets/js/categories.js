function addCategory() {
    window.location.href = 'add-category';
}

function editCategory(id) {
    window.location.href = `edit-category?id=${id}`;
}

function deleteCategory(id) {
    window.location.href = `act/category/delete?id=${id}`;
}