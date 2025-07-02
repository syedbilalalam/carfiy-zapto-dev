<?php
define('PRICING', ['basic'=>35, 'silver'=>50, 'gold'=>70]);


// Payment status meanings in orders database
// payment status  = 0 mean not paid
// payment status  = 1 mean pending for manually verification
// payment status  = 2 mean pending for system verifications
// payment status  = 3 mean partically paid
// payment status  = 4 mean paid
// payment status  = 5 mean paid but the payment was manually approved