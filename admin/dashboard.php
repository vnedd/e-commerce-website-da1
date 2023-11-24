<div class="min-h-screen h-full pb-0">
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5 px-2">
        <div>
            <h4 class="font-semibold text-3xl ">Hello Admin!</h4>
            <p class="text-neutral-500 mt-1">Welcome to your admin page</p>
        </div>
    </div>
    <!-- amount from website -->
    <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6 mt-5">
        <div class=" bg-violet-600 text-white px-4 py-3 rounded-xl">
            <div class=" text-neutral-50 text-lg">Total Amount</div>
            <div class=" my-4 font-semibold text-4xl"><?php echo $total_amount ?> USD</div>
            <div class=" text-neutral-50 text-sm">21% more than last month</div>
        </div>
        <div class=" bg-green-300 text-white px-4 py-3 rounded-xl">
            <div class=" text-neutral-50 text-lg">Payment Successed </div>
            <div class=" my-4 font-semibold text-4xl"><?php echo $paid_amount ?> USD</div>
            <div class=" text-neutral-50 text-sm">21% more than last month</div>
        </div>
        <div class=" bg-blue-300 text-white px-4 py-3 rounded-xl">
            <div class=" text-neutral-50 text-lg">Payment Processing</div>
            <div class=" my-4 font-semibold text-4xl"><?php echo $unpaid_amount ?> USD</div>
            <div class=" text-neutral-50 text-sm">21% more than last month</div>
        </div>
        <div class=" bg-red-300 text-white px-4 py-3 rounded-xl">
            <div class=" text-neutral-50 text-lg">Payment Return</div>
            <div class=" my-4 font-semibold text-4xl"><?php echo $return_amount ?> USD</div>
            <div class=" text-neutral-100 text-sm">21% more than last month</div>
        </div>
    </div>
    <div class="grid md:grid-cols-2 grid-cols-1 gap-6 mt-6">
        <div class="w-full border p-6 rounded-lg bg-white shadow-lg">
            <h2 class="mb-6 font-semibold text-lg">Orders within the last 1 weeks</h2>
            <div>
                <canvas class="w-full h-[400px]" id="order-chart"></canvas>
            </div>
        </div>
        <div class="w-full border p-6 rounded-lg bg-white shadow-lg">
            <h2 class="mb-6 font-semibold text-lg">Number of products in each category</h2>
            <div>
                <canvas class="w-full h-[400px]" id="product-count-chart"></canvas>
            </div>
        </div>
    </div>
    <div class="grid md:grid-cols-2 grid-cols-1 gap-6 mt-6">
        <div class="w-full border p-6 rounded-lg bg-white shadow-lg">
            <h2 class="mb-6 font-semibold text-lg">Top 5 products with the most views</h2>
            <div>
                <table class="table">
                    <thead class="font-medium">
                        <th>Rank</th>
                        <th>Product Name</th>
                        <th>Views</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($top_5_most_view_products as $key => $product) {
                        ?>
                            <tr>
                                <th><?php echo $key + 1 ?></th>
                                <td><?php echo $product['name'] ?></td>
                                <td><?php echo $product['views'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full border p-6 rounded-lg bg-white shadow-lg">
            <h2 class="mb-6 font-semibold text-lg">Top 5 most purchased products</h2>
            <div>
                <table class="table">
                    <thead class="font-medium">
                        <th>Rank</th>
                        <th>Product Name</th>
                        <th>Sales</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($top_5_bestseller_products as $key => $product) {
                        ?>
                            <tr>
                                <th><?php echo $key + 1 ?></th>
                                <td><?php echo $product['product_name'] ?></td>
                                <td><?php echo $product['quantity'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx1 = document.getElementById('order-chart').getContext('2d');
    const ctx2 = document.getElementById('product-count-chart').getContext('2d');

    const orderChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($orderData)); ?>,
            datasets: [{
                label: 'Unit orders each day of the month',
                data: <?php echo json_encode(array_values($orderData)); ?>,
                backgroundColor: 'rgba(124, 58, 237, 0.2)',
                borderColor: 'rgba(124, 58, 237, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
    const productCountChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode(array_keys($qty_product_of_category)); ?>,
            datasets: [{
                label: 'Quantity Products',
                data: <?php echo json_encode(array_values($qty_product_of_category)); ?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(124, 58, 237)',
                    'rgb(54, 162, 235)'
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>