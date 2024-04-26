let cart = [];

function addItem(id, name, Platforma, price) {
  cart.push({ id, name, Platforma, price });
  console.log(cart);
  displayCart();
}

function displayCart() {
  const cartList = document.getElementById('cart-items');
  const cartTotal = document.getElementById('cart-total');
  let total = 0;

  cartList.innerHTML = '';

  cart.forEach(item => {
    const li = document.createElement('li');
    li.textContent = `${item.name} (${item.Platforma}) - ${item.price}`;
    cartList.appendChild(li);
    total += parseFloat(item.price);
  });

  cartTotal.textContent = `${total.toFixed(2)} €`;
}

function purchase() {
  fetch('purchase.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(cart),
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert('Purchase successful!');
      cart = [];
      displayCart();
    } else {
      alert('Purchase failed. Please try again.');
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
}


function purchaseAndRedirect() {
  purchase();
  window.location.href = 'http://localhost/GameShop/PurchuseScreen.html';
}
