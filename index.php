<?php
    include_once 'config/core.php';
    include_once 'config/database.php';
    include_once 'objects/product.php';
    include_once 'objects/category.php';

    $database = new Database();
    $db = $database->getConnection();

    $product = new Product($db);
    $category = new Category($db);

    $stmt = $product->readAll($from_record_num, $records_per_page);
    $total_rows=$product->countAll();

    $page_url = "index.php?";
    $page_title = "Read Products";

    include_once "layout_header.php";
    include_once "read_template.php";
    include_once "layout_footer.php";
?>