<?php

function get_total_amount()
{
    $sql = "SELECT SUM(total_amount) as total from orders";
    $total_amount = pdo_query_one($sql);
    $total_amount = number_format($total_amount['total'], 0, '.', '');
    return $total_amount;
}

function get_paid_amount()
{
    $sql = "SELECT SUM(total_amount) as total from orders WHERE payment_status='Succeeded'";
    $total_amount = pdo_query_one($sql);
    $total_amount = number_format($total_amount['total'], 0, '.', '');
    return $total_amount;
}

function get_unpaid_amount()
{
    $sql = "SELECT SUM(total_amount) as total from orders WHERE payment_status='Processing'";
    $total_amount = pdo_query_one($sql);
    $total_amount = number_format($total_amount['total'], 0, '.', '');
    return $total_amount;
}

function get_return_amount()
{
    $sql = "SELECT SUM(total_amount) as total from orders WHERE payment_status='Return'";
    $total_amount = pdo_query_one($sql);
    $total_amount = number_format($total_amount['total'], 0, '.', '');
    return $total_amount;
}

//// thong ke don dat hang tung ngay trong 2 tuan gan nhat

function order_of_day()
{
    $sql = "SELECT DATE(created_at) as order_day, COUNT(*) as order_count 
    FROM orders 
    WHERE created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()
    GROUP BY order_day";
    $order_of_days = pdo_query($sql);
    $allDays = [];
    $startDate = new DateTime('now - 1 week');
    $endDate = new DateTime('now');

    while ($startDate <= $endDate) {
        $allDays[] = $startDate->format('Y-m-d');
        $startDate->modify('+1 day');
    }
    $orderData = [];
    foreach ($order_of_days as $row) {
        $orderData[$row['order_day']] = $row['order_count'];
    }

    foreach ($allDays as $day) {
        $orderData[$day] = isset($orderData[$day]) ? $orderData[$day] : 0;
    }
    ksort($orderData);
    return $orderData;
}

/// thong ke so luong san pham trong tung categories

function qty_product_of_category()
{
    $sql = "SELECT categories.name as category_name, count(products.category_id) as count_product from categories
        LEFT JOIN products on products.category_id = categories.category_id
        GROUP BY category_name
     ";
    $qty_product_of_categorys =  pdo_query($sql);
    $data = [];
    foreach ($qty_product_of_categorys as $row) {
        $data[$row['category_name']] = $row['count_product'];
    }
    return $data;
}
/// top 5 sản phẩm nhiều lượt xem nhất

function top_5_most_views_product()
{
    $sql = "SELECT product_id, name, views from products ORDER BY views desc limit 5";
    return pdo_query($sql);
}

// top 5 sản phẩm mua nhiều nhất

function top_5_bestseller_product()
{
    $sql = "SELECT pd.name as product_name, SUM(od.quantity) as quantity 
     FROM products as pd
     INNER JOIN order_details as od ON od.product_id = pd.product_id
     GROUP BY pd.name
     ORDER BY quantity DESC
     LIMIT 5";
    return pdo_query($sql);
}
