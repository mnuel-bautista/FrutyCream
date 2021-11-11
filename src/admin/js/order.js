const deleteOrderButton = document.querySelector('.delete-order');

deleteOrderButton.addEventListener('click', e => {
    deleteOrder(); 
})

/**
 * Empty the array where order items are stored, this array is defined in inicio.js file. 
 */
function deleteOrder() {
    itemsContainer.innerHTML = ''; 

    while(ps.length > 0) { ps.pop(); }
}