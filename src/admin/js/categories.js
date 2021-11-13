const allCategories = Array.from(document.getElementsByClassName('category'));
const productsContainer = document.querySelector('.products');

allCategories.forEach(category => {
    category.addEventListener('click', e => {
        //When the selected category changes, make a request to the server to get new products
        fetch(`http://localhost/proyecto-pw/src/admin/products.php?categoryId=${e.target.id}`)
            .then(response => response.text())
            .then(products => {
                productsContainer.innerHTML = products
                setAddItemButtonsClickListener(); 
            }); 
    })
});