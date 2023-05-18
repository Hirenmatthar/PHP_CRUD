<?php
require_once "dbconfig.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and update the product details in the database

    // Retrieve the submitted form data
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $category_status = $_POST['category_status'];

    // Update the product details in the database
    $sql = "UPDATE category SET category_name = ?, category_status = ? WHERE category_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category_name, $category_status, $category_id]);

    // Redirect back to products.php with a success message
    echo "<script>alert('Category Updated Successfully!..')</script>";
    echo "<script>window.location.href = 'category_data.php';</script>";
    // header("Location: product_data.php?msg=Product updated successfully");
    exit();
} else {
    // Display the form for editing the product details

    // Check if the product_id parameter is provided
    if (!isset($_GET['category_id'])) {
        header("Location: category_data.php?msg=Category ID is missing");
        exit();
    }

    // Retrieve the product details from the database based on the product_id
    $category_id = $_GET['category_id'];
    $sql = "SELECT * FROM category WHERE category_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category_id]);
    $category = $stmt->fetch();

    // Check if the product exists
    if (!$category) {
        header("Location: category_data.php?msg=Category not found");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Category</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="product_style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <form action="category_update.php" method="post">
                <h4 class="display-4 text-center">Edit Category</h4><hr><br>
                <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
                <div class="form-group">
                    <label for="category_name">Name</label>
                    <select class="form-control" name="category_name">
                        <option value="Category 1"<?php echo ($category['category_name'] == 'Category 1' ? 'selected':'') ?>>Category 1</option>
                        <option value="Category 2"<?php echo ($category['category_name'] == 'Category 2' ? 'selected':'') ?>>Category 2</option>
                        <option value="Category 3"<?php echo ($category['category_name'] == 'Category 3' ? 'selected':'') ?>>Category 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_status">Status</label>
                    <select class="form-control" name="category_status">
                        <option value="Available"<?php echo ($category['category_status'] == 'Available' ? 'selected':'') ?>>Available</option>
                        <option value="Not Available"<?php echo ($category['category_status'] == 'Not Available' ? 'selected':'') ?>>Not Available</option>
                    </select>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
    </body>
</html>
