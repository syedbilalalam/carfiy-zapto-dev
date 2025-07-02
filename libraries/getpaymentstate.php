<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';
require_once MAIN_ROOT.'/libraries/nowpayment.php';

function getPaymentState($database, $order = ['payment_status'=>0, 'payment_id'=>NULL]){
    $paymentState = 'unpaid';
    if($order['payment_status'] == 4 || $order['payment_status'] == 5){
        $paymentState= 'paid';
    }
    else if($order['payment_status'] == 1 || $order['payment_status'] == 2){
        $paymentState= 'processing';
    }
    else if($order['payment_id']){
        $paymentInformation = paymentInquery($order['payment_id']);
        switch ($paymentInformation['payment_status']) {
            case 'confirming':
                $paymentState = 'processing';
                break;
            case 'confirmed':
                $paymentState = 'processing';
                break;
            case 'sending':
                $paymentState = 'processing';
                break;
            case 'partially_paid':
                $paymentState = 'partial';
                break;
            case 'finished':
                $paymentState = 'paid';
                $paid = 4;
                $deliveryStatus = 2;
                // Updating the status to the servers
                $stmt=$database->prepare('UPDATE `orders` SET `payment_status`=?,`delivery_status`=? WHERE `order_id` = ?;');
                $stmt->bind_param('iii', $paid, $deliveryStatus, $order['order_id']);
                $stmt->execute();
                $stmt->close();
                break;
            case 'failed':
                $paymentState = 'unpaid';
                break;
            case 'refunded':
                $paymentState = 'unpaid';
                break;
            case 'expired':
                $paymentState = 'unpaid';
                break;
            
            default:
                break;
        }
    }else{
        $paymentState = 'unpaid';
    }
    return $paymentState;
}
