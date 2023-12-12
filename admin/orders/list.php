<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">List Orders</h4>
            <p class="text-neutral-500 mt-1">All orders of your store</p>
        </div>
    </div>
    <div>
        <ul class="grid grid-cols-7 items-center justify-between h-[45px] divide-x-2 relative">
            <li class="order-tab init-order-tab cursor-pointer text-center px-3 py-1 md:text-sm text-xs font-medium text-neutral-500" data-status="all">All Orders</li>
            <li class="order-tab cursor-pointer text-center px-3 py-1 md:text-sm text-xs font-medium text-neutral-500" data-status="Processing">Order Processing</li>
            <li class="order-tab cursor-pointer text-center px-3 py-1 md:text-sm text-xs font-medium text-neutral-500" data-status="In transit">In transit</li>
            <li class="order-tab cursor-pointer text-center px-3 py-1 md:text-sm text-xs font-medium text-neutral-500" data-status="Delivered">Delivered</li>
            <li class="order-tab cursor-pointer text-center px-3 py-1 md:text-sm text-xs font-medium text-neutral-500" data-status="Cancelled">Cancelled</li>
            <div class="absolute bottom-0 h-1 bg-neutral-600 rounded-full tab-underline transition-all duration-400"></div>
        </ul>
        <div class="mt-6 flex flex-col space-y-6" id="order-details">

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    const tabs = document.querySelectorAll('.order-tab');

    const tabUnderline = document.querySelector('.tab-underline')

    tabUnderline.style.left = tabs[0].offsetLeft + 'px';
    tabUnderline.style.width = tabs[0].offsetWidth + 'px';
    tabs[0].classList.add('text-slate-900')
    tabs.forEach(tab => {

        tab.addEventListener('click', function() {

            tabs.forEach(tab => tab.classList.remove('text-slate-900'))
            tabUnderline.style.left = this.offsetLeft + 'px';
            tabUnderline.style.width = this.offsetWidth + 'px';
            this.classList.add('text-slate-900')

            const orderStatus = tab.getAttribute('data-status');
            history.pushState({}, '', `index.php?act=list_order&order_status=${orderStatus}`);
            fetchData(orderStatus);
        });
    });

    fetchData('all');

    function fetchData(orderStatus) {
        $.ajax({
            type: 'GET',
            url: `orders/get_orders.php?order_status=${orderStatus}`,
            success: function(response) {
                $('#order-details').html(response);
            },
            error: function() {
                console.error('Error fetching data');
            }
        });
    }
</script>