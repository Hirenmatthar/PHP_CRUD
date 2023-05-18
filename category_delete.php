<?php
require_once "dbconfig.php";

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Delete the category
    $deleteCategorySql = "DELETE FROM category WHERE category_id = :category_id";
    $deleteCategoryStmt = $pdo->prepare($deleteCategorySql);
    $deleteCategoryStmt->bindParam(':category_id', $category_id);

    if ($deleteCategoryStmt->execute()) {
        $msg = "Category deleted successfully";
    } else {
        $msg = "Error deleting category";
    }
}

header("Location: category_data.php?msg=" . urlencode($msg));
exit();
?>
