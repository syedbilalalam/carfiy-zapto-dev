<?php
// Checking if admin is logged in or not
require $_SERVER['DOCUMENT_ROOT'].'/sub_root_cf.php';

// Importing LDB
require_once MAIN_ROOT.'/libraries/ad-dsaltb.php';

session_start();
if(isset($_SESSION['adminEmail']) && isset($_SESSION['adminPassword'])){
    if(!isset(LDB[$_SESSION['adminEmail']]) || LDB[$_SESSION['adminEmail']] != $_SESSION['adminPassword']){
        header('Location: '.SUB_ROOT.'/seller/admin/home/login-admin.php');
        exit();
    }

}else{
    header('Location: '.SUB_ROOT.'/seller/admin/home/login-admin.php');
    exit();
}

$pricingName = ['basic'=>'Basic', 'silver'=>'Silver', 'gold' => 'Gold'];
$pendingOrders = [];
$finishedOrders = [];
$pendingPayments = [];
$approvedPayments = [];
// Contacting database
require_once MAIN_ROOT.'/libraries/database.php';
$stmt=$database->prepare('SELECT users.email,users.name,users.uid, orders.order_id, orders.delivery_status , orders.plan, orders.phone, orders.vin, orders.payment_status, orders.payment_method, orders.time FROM `users` INNER JOIN `orders` ON users.uid = orders.uid WHERE orders.payment_status ORDER BY orders.time DESC;');
// $stmt=$database->prepare('SELECT users.email,users.uid, orders.order_id, orders.delivery_status , orders.plan, orders.time FROM `users` INNER JOIN `orders` ON users.uid = orders.uid WHERE orders.payment_status = 1 ORDER BY orders.time DESC;');
$stmt->execute();
$result = $stmt->get_result();

// Fetching all datafrom database
while($record=$result->fetch_assoc()){
    if($record['delivery_status'] == 3){
        array_push($finishedOrders, $record);
    }else if($record['payment_status'] >= 4) {
        array_push($pendingOrders, $record);
    }else if($record['payment_status'] == 1){

        array_push($pendingPayments, $record);
    }
    if($record['payment_status'] == 5){
        array_push($approvedPayments, $record);
    }
}

// closing database
$stmt->close();
$database->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            /* max-width: 800px; */
            width:fit-content;
            white-space:nowrap;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
            min-width:700px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
       .userRecord {
            cursor:pointer;
        }
        .completedList{
            background-color:#1bb481;
        }
        a.button {
            margin:20px;
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            text-align: center;
            transition: background 0.3s ease;
        }

        a.button:hover {
            background-color: #0056b3;
        }
    </style>
    <!-- Sweetaleart 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        
        <h2>Pending Orders (Customer payment verified)</h2>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Phone</th>
                    <th>Plan</th>
                    <th>VIN</th>
                    <th>Payment Method</th>
                    <th>Order Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($pendingOrders as $order){
                ?>
                <tr class="userRecord incompleteRecords" data-id="<?php echo $order['order_id']; ?>">
                    <td><?php echo $order['name']; ?></td>
                    <td><?php echo $order['email']; ?></td>
                    <td><?php echo $order['phone']; ?></td>
                    <td><?php echo $pricingName[$order['plan']]; ?></td>
                    <td><?php echo $order['vin']; ?></td>
                    <td><?php echo $order['payment_method']; ?></td>
                    <td class="printTime" data-time="<?php echo $order['time']; ?>">~</td>
                </tr>
                <?php
                    }
                ?>
                <!-- <tr class="userRecord incompleteRecords" data-id="100">
                    <td>user1@example.com</td>
                    <td>Gold</td>
                    <td>2025-03-05 10:30 AM</td>
                </tr>
                <tr class="userRecord incompleteRecords" data-id="100">
                    <td>user2@example.com</td>
                    <td>Silver</td>
                    <td>2025-03-05 11:00 AM</td>
                </tr>
                <tr class="userRecord incompleteRecords" data-id="100">
                    <td>user3@example.com</td>
                    <td>Basic</td>
                    <td>2025-03-05 11:45 AM</td>
                </tr> -->
            </tbody>
        </table>
        <h2>Pending payment approvals</h2>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Phone</th>
                    <th>Plan</th>
                    <th>VIN</th>
                    <th>Payment Method</th>
                    <th>Order Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($pendingPayments as $order){
                ?>
                <tr class="userRecord paymentApprovals" data-id="<?php echo $order['order_id']; ?>">
                    <td><?php echo $order['name']; ?></td>
                    <td><?php echo $order['email']; ?></td>
                    <td><?php echo  $order['phone']; ?></td>
                    <td><?php echo  $pricingName[$order['plan']]; ?></td>
                    <td><?php echo  $order['vin']; ?></td>
                    <td><?php echo  $order['payment_method']; ?></td>
                    <td class="printTime" data-time="<?php echo $order['time']; ?>">~</td>
                </tr>
                <?php
                    }
                ?>
                <!-- 
                <tr class="userRecord completedRecords" data-id="100">
                    <td>user1@example.com</td>
                    <td>Gold</td>
                    <td>2025-03-05 10:30 AM</td>
                </tr>
                <tr class="userRecord completedRecords" data-id="100">
                    <td>user2@example.com</td>
                    <td>Silver</td>
                    <td>2025-03-05 11:00 AM</td>
                </tr>
                <tr class="userRecord completedRecords" data-id="100">
                    <td>user3@example.com</td>
                    <td>Basic</td>
                    <td>2025-03-05 11:45 AM</td>
                </tr> -->
            </tbody>
        </table>
        <h2>Manually Approved Payments</h2>
        <table>
            <thead>
                <tr>
                    <th class="completedList">User Name</th>
                    <th class="completedList">User Email</th>
                    <th class="completedList">Phone</th>
                    <th class="completedList">Plan</th>
                    <th class="completedList">VIN</th>
                    <th class="completedList">Payment Method</th>
                    <th class="completedList">Order Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($approvedPayments as $order){
                ?>
                <tr class="userRecord paymentApprovals" data-id="<?php echo $order['order_id']; ?>">
                    <td><?php echo $order['name']; ?></td>
                    <td><?php echo $order['email']; ?></td>
                    <td><?php echo  $order['phone']; ?></td>
                    <td><?php echo  $pricingName[$order['plan']]; ?></td>
                    <td><?php echo  $order['vin']; ?></td>
                    <td><?php echo  $order['payment_method']; ?></td>
                    <td class="printTime" data-time="<?php echo $order['time']; ?>">~</td>
                </tr>
                <?php
                    }
                ?>
                <!-- 
                <tr class="userRecord completedRecords" data-id="100">
                    <td>user1@example.com</td>
                    <td>Gold</td>
                    <td>2025-03-05 10:30 AM</td>
                </tr>
                <tr class="userRecord completedRecords" data-id="100">
                    <td>user2@example.com</td>
                    <td>Silver</td>
                    <td>2025-03-05 11:00 AM</td>
                </tr>
                <tr class="userRecord completedRecords" data-id="100">
                    <td>user3@example.com</td>
                    <td>Basic</td>
                    <td>2025-03-05 11:45 AM</td>
                </tr> -->
            </tbody>
        </table>
        <h2>Completed orders</h2>
        <table>
            <thead>
                <tr>
                    <th class="completedList">User Name</th>
                    <th class="completedList">User Email</th>
                    <th class="completedList">Phone</th>
                    <th class="completedList">Plan</th>
                    <th class="completedList">VIN</th>
                    <th class="completedList">Payment Method</th>
                    <th class="completedList">Order Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($finishedOrders as $order){
                ?>
                <tr class="userRecord completedRecords" data-id="<?php echo $order['order_id']; ?>">
                    <td><?php echo $order['name']; ?></td>
                    <td><?php echo $order['email']; ?></td>
                    <td><?php echo  $order['phone']; ?></td>
                    <td><?php echo  $pricingName[$order['plan']]; ?></td>
                    <td><?php echo  $order['vin']; ?></td>
                    <td><?php echo  $order['payment_method']; ?></td>
                    <td class="printTime" data-time="<?php echo $order['time']; ?>">~</td>
                </tr>
                <?php
                    }
                ?>
                <!-- 
                <tr class="userRecord completedRecords" data-id="100">
                    <td>user1@example.com</td>
                    <td>Gold</td>
                    <td>2025-03-05 10:30 AM</td>
                </tr>
                <tr class="userRecord completedRecords" data-id="100">
                    <td>user2@example.com</td>
                    <td>Silver</td>
                    <td>2025-03-05 11:00 AM</td>
                </tr>
                <tr class="userRecord completedRecords" data-id="100">
                    <td>user3@example.com</td>
                    <td>Basic</td>
                    <td>2025-03-05 11:45 AM</td>
                </tr> -->
            </tbody>
        </table>
        
        
        <a class="button" href="seller/admin/home/logout.php">Log out</a>
    </div>
    <script type="text/javascript">
        const completedRecords = document.getElementsByClassName('completedRecords');
        const paymentApprovals = document.getElementsByClassName('paymentApprovals');
        for(let index=0; index<completedRecords.length; index++){
            completedRecords[index].onclick = ()=>{
                Swal.fire({
                    icon: 'question', 
                    text: 'The report is already sent to the client do you want to replace with new one ?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, I want to edit'
                }).then((e)=>{
                    if(e.isConfirmed){
                        // Handle the further process here
                        window.location.assign('seller/admin/home/upload-report.php?id='+encodeURIComponent(completedRecords[index].dataset.id));
                    }
                })

            }

        }
        for(let index=0; index<paymentApprovals.length; index++){
            paymentApprovals[index].onclick = ()=>{
                Swal.fire({
                    icon: 'info', 
                    text: "After you approve the payment it will be marked as paid to the client's my orders page!",
                    showCancelButton: true,
                    confirmButtonText: 'See proof of payment',
                    cancelButtonText: 'Cancel'
                }).then((e)=>{
                    if(e.isConfirmed){
                        // Handle the further process here
                        window.location.assign('seller/admin/home/approve-payment.php?id='+encodeURIComponent(paymentApprovals[index].dataset.id));
                    }
                })

            }

        }
        const pendingRecords = document.getElementsByClassName('incompleteRecords');
        for(let index=0; index<pendingRecords.length; index++){
            pendingRecords[index].onclick = ()=>{
                // Handle the further process here
                window.location.assign('seller/admin/home/upload-report.php?id='+encodeURIComponent(pendingRecords[index].dataset.id));
            }
        }
    </script>
    <script src="static/global_files/docs/seller-layout.js" type="text/javascript"></script>
</body>
</html>
