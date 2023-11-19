<?php

function getall_shippingTypes()
{
    $sql = "SELECT * FROM shipping_types";
    return pdo_query($sql);
}
