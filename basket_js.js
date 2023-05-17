let cartItems = [];
const addToCartButtons = document.querySelectorAll('.add-to-cart');
addToCartButtons.forEach(button => {
  button.addEventListener('click', () => {
    const product = button.parentNode;
    const id = product.getAttribute('data-name');
    const name = product.querySelector('h3').innerText;
    const price = product.querySelector('.price').innerText;
    const item = { id, name, price };
    cartItems.push(item);
    //sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
    alert("Added Successfully");
    console.log(cartItems);
    
  });
});
