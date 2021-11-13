const confirmOrderButton = document.querySelector('.confirm-order');

confirmOrderButton.addEventListener('click', e => {
    confirmOrder();     
})

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

/**
 * Confirms the order and saves it into the database
 */
 function confirmOrder() {

    //Validate that the number of items is greater than 0   
    if(ps.length < 1) {
        alert('Add at least one item to the order'); 
    } else {
        //List of item ids in the order and the quantity of them.
        items = ps.map(item => ({ productId: item['id'], quantity: item['cantidad']}))
        console.log(ps); 
        console.log(JSON.stringify(items)); 
        //Send data to the server using POST method. 
        fetch('http://localhost/proyecto-pw/src/admin/sell/create.php', {
            method: "POST", 
            headers: { 'Content-Type': 'application/json' }, 
            body: JSON.stringify(items)
        })
        .then(response => {
            //Response was successful
            if(response.ok) {
                alert('La orden se ha guardado.');
                
                //Clear the current order items
                while(ps.length > 0) { ps.pop(); }
                itemsContainer.innerHTML = '';  
            } else {
                alert('Ocurrio algún error'); 
            }
        }) 

    }

}