<?php
// Obtain client IP address
$IP = null;
$limit = 3;
$timestamp = 60;
function throttleIP($IP,$limit,$timestamp) {
    // create a data store to store IP address with an expiry time - Redis can help achieve this
    $my_store = new MyDataStore;
    // check if IP exists in your store
    $IP_exist = $my_store->get($IP);
    if($IP_exist == null) {
        $count = 1;
        $my_store->set($IP,$count,$timestamp);
        echo "Continue";
    } else {
        $count ++;
        $my_store->set($IP,$count,$timestamp);
        if($count > $limit) {
            exit();
        }
        echo "Continue";
    }
}