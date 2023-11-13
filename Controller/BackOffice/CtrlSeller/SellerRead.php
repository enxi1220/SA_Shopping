<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Model/Seller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/BusinessLogic/BllSeller/SellerRead.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SA_Shopping/Constant/UserStatusConstant.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        session_start();
        $sellerId = $_SESSION['seller']['sellerId'];

        $seller = new Seller();

        $seller->setSellerId($sellerId);
        
        $result = SellerRead::Read($seller);

        if (empty($result)) {
            throw new Exception("Data not found");
        }

        $result = $result[0];
        $output = array(
            'sellerId' => $result->getSellerId(),
            'username' => $result->getUsername(),
            'name' => $result->getName(),
            'email' => $result->getEmail(),
            'phone' => $result->getPhone(),
            'status' => $result->getStatus(),
            'businessAddress' => $result->getBusinessAddress(),
            'storeName' => $result->getStoreName(),
            'storeDesc' => $result->getStoreDesc(),
            'lastLoginDate' => $result->getLastLoginDate(),
            'createdDate' => $result->getCreatedDate(),
            'updatedDate' => $result->getUpdatedDate()
        );

        echo json_encode($output);
    } catch (\Throwable $e) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        
        echo $e->getMessage();
    }
}
