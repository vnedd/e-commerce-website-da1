const inscreaseQtyBtn = document.querySelector('.inscrease-cart-qty');
const decreaseQtyBtn = document.querySelector('.descrease-cart-qty');
const cartQtyInput = document.getElementById('cart-qty-input');

if (inscreaseQtyBtn && decreaseQtyBtn && cartQtyInput) {
    inscreaseQtyBtn.addEventListener('click', () => {
        let qty = parseInt(cartQtyInput.value) + 1;
        cartQtyInput.setAttribute('value', qty);
    });

    decreaseQtyBtn.addEventListener('click', () => {
        if (parseInt(cartQtyInput.value) > 1) {
            let qty = parseInt(cartQtyInput.value) - 1;
            cartQtyInput.setAttribute('value', qty);
        } else {
            alert('quantity must be more than one');
        }
    });

    function openModal(data) {
        let price =
            Number(data.price) -
            (Number(data.price) * Number(data.discount)) / 100;
        const dataImages = data.image_urls.split(',');

        document.getElementById('modalOverlay').style.display = 'flex';
        document.getElementById('modal__product-name').innerText = data.name;
        document.getElementById('modal__product-price').innerText = `$${price}`;
        document.getElementById(
            'modal__product-image',
        ).src = `./upload/${dataImages[0]}`;
        const divElm = document.createElement('div');
        divElm.innerHTML = `
            <input type="hidden" name="product_id" value="${data.product_id}">
            <input type="hidden" name="name" value="${data.name}">
            <input type="hidden" name="price" value="${Number(data.price)}">
            <input type="hidden" name="image_url" value="${dataImages[0]}">
        `;
        document.getElementById('add-to-cart-form').prepend(divElm);
    }

    function closeModal() {
        document.getElementById('modalOverlay').style.display = 'none';
    }
}
