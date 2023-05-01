<?php
$con = new mysqli('localhost', 'u702691124_delivery', '*0FsCig@F6', 'u702691124_delivery') or die("Could not connect to mysql" . mysqli_error($con));
$conn =mysqli_connect('localhost', 'u702691124_delivery', '*0FsCig@F6', 'u702691124_delivery');
date_default_timezone_set("Asia/Kuala_Lumpur");

$data = json_decode(file_get_contents('php://input'), true);

$json_string = json_encode($data, JSON_PRETTY_PRINT);
$con->query("INSERT INTO temp (data) VALUES ('$json_string')");

http_response_code(200);

$reference_id                   = check($data['reference_id']);
$service_level                  = check($data['service_level']);
$shipment_no                    = check($data['shipment_no']);
$driver                         = check($data['driver']);
$delivery_partner               = check($data['delivery_partner']);
$driver_commission              = check($data['driver_commission']);
$delivery_partner_commission    = check($data['delivery_partner_commission']);
$status                         = check($data['status']);
$shipment_status                = check($data['shipment_status']);
$origin                         = check($data['origin']);
$destination                    = check($data['destination']);
$location                       = check($data['location']);
$lat                            = check($data['lat']);
$lng                            = check($data['lng']);
$size                           = check($data['size']);
$weight                         = check($data['weight']);
$declaration_value              = check($data['declaration_value']);
$quantity                       = check($data['quantity']);
$receiver_name                  = check($data['receiver_name']);
$receiver_phone                 = check($data['receiver_phone']);
$receiver_telephone             = check($data['receiver_telephone']);
$receiver_email                 = check($data['receiver_email']);
$receiver_address               = check($data['receiver_address']);
$receiver_address_type          = check($data['receiver_address_type']);
$receiver_address_line1         = check($data['receiver_address_line1']);
$receiver_address_line2         = check($data['receiver_address_line2']);
$receiver_city                  = check($data['receiver_city']);
$receiver_state                 = check($data['receiver_state']);
$receiver_country               = check($data['receiver_country']);
$receiver_postcode              = check($data['receiver_postcode']);
$sender_name                    = check($data['sender_name']);
$sender_email                   = check($data['sender_email']);
$sender_phone                   = check($data['sender_phone']);
$sender_address_line1           = check($data['sender_address_line1']);
$sender_address_line2           = check($data['sender_address_line2']);
$sender_state                   = check($data['sender_state']);
$sender_city                    = check($data['sender_city']);
$sender_country                 = check($data['sender_country']);
$sender_postcode                = check($data['sender_postcode']);
$comment                        = check($data['comment']);
$metadata                       = check($data['metadata']);
$group_id                       = check($data['group_id']);
$master_id                      = check($data['master_id']);
$file_reference_id              = check($data['file_reference_id']);
$container                      = check($data['container']);
$container_reference_id         = check($data['container_reference_id']);
$client                         = check($data['client']);
$estimated_time_of_arrival      = check($data['estimated_time_of_arrival']);
$estimated_time_of_departure    = check($data['estimated_time_of_departure']);
$pickup_date                    = check($data['pickup_date']);
$payable_by                     = check($data['payable_by']);
$instructions                   = check($data['instructions']);
$description                    = check($data['description']);
$volume                         = check($data['volume']);
$partner                        = check($data['partner']);
$partner_reference_id           = check($data['partner_reference_id']);
$delivery_attempts              = check($data['delivery_attempts']);
$charges                        = check($data['charges']);
$charges_currency               = check($data['charges_currency']);
$goods_sku                      = check($data['goods_sku']);
$goods_value                    = check($data['goods_value']);
$goods_value_currency           = check($data['goods_value_currency']);
$port_code                      = check($data['port_code']);
$mother_bag                     = check($data['mother_bag']);
$awb_no                         = check($data['awb_no']);
$biz_key                        = check($data['biz_key']);
$user_updated_at                = check($data['user_updated_at']);
$created_at                     = check($data['created_at']);
$updated_at                     = check($data['updated_at']);
$created_by                     = check($data['created_by']);
$updated_by                     = check($data['updated_by']);
$deleted_at                     = check($data['deleted_at']);

$time = date("Y-m-d H:i:s");

$con->query("INSERT INTO bs_shipments (shipment_no, created_at) VALUES ('dasdad', '$time')");

function check($data) {       // check for empty fields
    if (empty($data)) {
        return "";
    } else {
        return $data;
    }
}