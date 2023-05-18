<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="product_style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="product_form_validation.js"></script>
    </head>
    <body>
        <div class="container">
            <form action="product.php" method="post">
                <h4 class="display-4 text-center">Product Form</h4><hr><br>
                <div class="form-group">
                    <label for="product_sku">Stock Keeping Unit</label>
                    <input type="text" class="form-control" name="product_sku" placeholder="Enter Product SKU">
                </div>
                <div class="form-group">
                    <label for="product_name">Name</label>
                    <select class="form-control" name="product_name">
                        <option value="Product 1">Product 1</option>
                        <option value="Product 2">Product 2</option>
                        <option value="Product 3">Product 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_category">Category</label>
                    <select class="form-control" name="product_category">
                        <option value="Category 1">Category 1</option>
                        <option value="Category 2">Category 2</option>
                        <option value="Category 3">Category 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_price">Price</label>
                    <input type="number" class="form-control" step="0.01" min="0" name="product_price" placeholder="Enter the Product Price">
                </div>
                <div class="form-group">
                    <label for="product_img">Product Image</label>
                    <input type="file" class="form-control" name="product_img" placeholder="Enter Customer ID">
                </div>
                <button type="submit" name="add" class="btn btn-primary">Submit</button>
                <button type="submit" name="view" class="btn btn-primary"><a href="product_data.php">View</a></button>
            </form>
        </div>
    </body>
</html>
