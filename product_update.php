<?php
require_once "dbconfig.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and update the product details in the database

    // Retrieve the submitted form data
    $product_id = $_POST['product_id'];
    $product_sku = $_POST['product_sku'];
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_img = $_POST['product_img'];

    // Update the product details in the database
    $sql = "UPDATE products SET product_sku = ?, product_name = ?, product_category = ?, product_price = ?, product_img = ? WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_sku, $product_name, $product_category, $product_price, $product_img, $product_id]);

    // Redirect back to products.php with a success message
    echo "<script>alert('Product Updated Successfully!..')</script>";
    echo "<script>window.location.href = 'product_data.php';</script>";
    // header("Location: product_data.php?msg=Product updated successfully");
    exit();
} else {
    // Display the form for editing the product details

    // Check if the product_id parameter is provided
    if (!isset($_GET['product_id'])) {
        header("Location: product_data.php?msg=Product ID is missing");
        exit();
    }

    // Retrieve the product details from the database based on the product_id
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    // Check if the product exists
    if (!$product) {
        header("Location: product_data.php?msg=Product not found");
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
        <title>Edit Product</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="product_style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="product_form_validation.js"></script>
    </head>
    <body>
        <div class="container">
            <form action="product.php" method="post">
                <h4 class="display-4 text-center">Edit Product</h4><hr><br>
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                <div class="form-group">
                    <label for="product_sku">Stock Keeping Unit</label>
                    <input type="text" class="form-control" value="<?php echo $product['product_sku']; ?>" name="product_sku" placeholder="Enter Product SKU">
                </div>
                <div class="form-group">
                    <label for="product_name">Name</label>
                    <select class="form-control" name="product_name">
                        <option value="Product 1"<?php echo ($product['product_name'] == 'Product 1' ? 'selected':'') ?>>Product 1</option>
                        <option value="Product 2"<?php echo ($product['product_name'] == 'Product 2' ? 'selected':'') ?>>Product 2</option>
                        <option value="Product 3"<?php echo ($product['product_name'] == 'Product 3' ? 'selected':'') ?>>Product 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_category">Category</label>
                    <select class="form-control" name="product_category">
                        <option value="Category 1"<?php echo ($product['product_category'] == 'Category 1' ? 'selected':'') ?>>Category 1</option>
                        <option value="Category 2"<?php echo ($product['product_category'] == 'Category 2' ? 'selected':'') ?>>Category 2</option>
                        <option value="Category 3"<?php echo ($product['product_category'] == 'Category 3' ? 'selected':'') ?>>Category 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_price">Price</label>
                    <input type="number" class="form-control" value="<?php echo $product['product_price']; ?>" name="product_price"
                     placeholder="Enter the Product Price">
                </div>
                <div class="form-group">
                    <label for="product_img">Product Image</label>
                    <input type="file" class="form-control" value="<?php echo $product['product_img']; ?>" name="product_img">
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
    </body>
</html>




<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form method="POST" action="product_update.php">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

        <label for="product_sku">SKU:</label>
        <input type="text" name="product_sku" value="<?php echo $product['product_sku']; ?>" required><br>

        <div class="form-group">
                    <label for="product_name">Name</label>
                    <select class="form-control" name="product_name">
                        <option value='Product 1'<?php echo ($product['product_name'] == 'Product 1' ? 'selected':'') ?>>Product 1</option>
                        <option value='Product 2'<?php echo ($product['product_name'] == 'Product 2' ? 'selected':'') ?>>Product 2</option>
                        <option value='Product 3'<?php echo ($product['product_name'] == 'Product 3' ? 'selected':'') ?>>Product 3</option>
                    </select>
                </div>
        <div class="form-group">
            <label for="product_category">Category</label>
            <select class="form-control" name="product_category">
                <option value="Category 1"<?php echo ($product['product_category'] == 'Category 1' ? 'selected':'') ?>>Category 1</option>
                <option value="Category 2"<?php echo ($product['product_category'] == 'Category 2' ? 'selected':'') ?>>Category 2</option>
                <option value="Category 3"<?php echo ($product['product_category'] == 'Category 3' ? 'selected':'') ?>>Category 3</option>
            </select>
        </div>

        
        <label for="product_price">Price:</label>
        <input type="number" name="product_price" value= required><br>

        <label for="product_img">Image:</label>
        <input type="file" name="product_img" value="<?php echo $product['product_img']; ?>"><br>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>
