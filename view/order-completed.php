<div class="container mx-auto max-w-[1440px] my-8 mt-[140px] md:mt-[100px] md:p-8 ">
    <div class="sm:mx-auto mx-8 max-w-[900px] my-8 mt-16 p-6 md:p-8 rounded-lg border shadow-md relative">
        <i class="bi bi-check-circle-fill absolute -top-7 left-[50%] -translate-x-[50%] text-violet-600 text-6xl rounded-full shadow-md"></i>
        <div class="flex items-center flex-col">
            <h4 class="text-center mt-5 font-bold text-2xl">
                Thank you for order <?php echo '#TKQ00' . $order['order_id'] ?>
            </h4>
            <p class="text-neutral-600 text-sm mt-2 text-center">We'll send you an email with tracking information when your item ships</p>
        </div>
        <div class="mt-8">
            <?php echo order_item($order, $order_details, true, true) ?>
        </div>
    </div>
</div>
<script>
    function confirmCancle(url) {
        const result = confirm("Are you sure to cancel this order?");
        if (result) {
            window.location.href = url;
        }
    }
</script>