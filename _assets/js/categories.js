/**
 * Takes user to category page
 */
function addCategory() {
    window.location.href = 'add-category';
}

/**
 * Takes user to edit category page
 * @param id
 */
function editCategory(id) {
    window.location.href = `edit-category?id=${id}`;
}

/**
 * Deletes category
 * @param id
 */
function deleteCategory(id) {
    if (confirm('Are you sure you want to delete this category?'))
        window.location.href = `act/category/delete?id=${id}`;
}