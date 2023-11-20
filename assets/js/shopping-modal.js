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
}
function openModal(product, variants) {
    const productImages = product.image_urls.split(',');

    document.getElementById('modalOverlay').style.display = 'flex';
    document.getElementById('modal__product-name').innerText = product.name;

    const renderVariant = variants
        .map((variant, index) => {
            return `
        <label for="variant_${
            variant.variant_id
        }" class="flex p-3 w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
            <input onchange='handlerChangeInput(${JSON.stringify(
                variants,
            )})' type="radio" name="variant_id" id="variant_${
                variant.variant_id
            }" ${index === 0 ? 'checked' : ''} value="${
                variant.variant_id
            }" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
            <div class="text-sm text-gray-500 ms-3 dark:text-gray-400">
                <p class="text-sm">${variant.variant_name}</p>
                <p class="text-sm font-bold mt-4"><span class="text-xs">(-${
                    product.discount
                }%)$</span>${
                Number(variant.price) -
                (Number(variant.price) * Number(product.discount)) / 100
            }</p>
            </div>
        </label>`;
        })
        .join('');

    document.getElementById(
        'modal__product-variant',
    ).innerHTML = `<div class="grid md:grid-cols-2 grid-cols-1 gap-2 mb-6">${renderVariant}</div>`;

    document.getElementById(
        'modal__product-image',
    ).src = `./upload/${productImages[0]}`;

    const divElm = document.createElement('div');
    divElm.innerHTML = `
        <input type="hidden" name="product_id" value="${product.product_id}">
        <input type="hidden" name="name" value="${product.name}">
        <input type="hidden" name="discount" value="${product.discount}">
        <input type="hidden" name="image_url" value="${productImages[0]}">
    `;
    document.getElementById('add-to-cart-form').prepend(divElm);
}
function handlerChangeInput(variants) {
    const selectedInput = document.querySelector(
        'input[name=variant_id]:checked',
    ).value;
    const currentVariant = variants.find(
        (variant) => variant.variant_id === selectedInput,
    );
    if (Number(currentVariant.quantity) > 0) {
        document.querySelector('.product-quantity-wrapper').innerHTML = `
        <p class="product-quantity text-violet-700 mr-2">${currentVariant.quantity}</p>
            <p class="text-violet-700">In Stock <i class="bi bi-check"></i></p>
        `;
        document
            .querySelector('.add-to-cart-btn')
            .classList.remove('btn-disabled');
    } else {
        document.querySelector(
            '.product-quantity-wrapper',
        ).innerHTML = `<p class="text-red-700">Out Stock <i class="bi bi-emoji-expressionless"></i></p>`;
        document
            .querySelector('.add-to-cart-btn')
            .classList.add('btn-disabled');
    }
}

function closeModal() {
    document.getElementById('modalOverlay').style.display = 'none';
}
