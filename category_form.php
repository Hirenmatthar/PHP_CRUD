<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Category</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="product_style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <form action="category.php" method="post">
                <h4 class="display-4 text-center">Category Form</h4><hr><br>
                <div class="form-group">
                    <label for="category_name">Name</label>
                    <select class="form-control" name="category_name">
                        <option value="Category 1">Category 1</option>
                        <option value="Category 2">Category 2</option>
                        <option value="Category 3">Category 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_status">Status</label>
                    <select class="form-control" name="category_status">
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </div>
                <button type="submit" name="add" class="btn btn-primary">Submit</button>
                <button type="submit" name="view" class="btn btn-primary"><a href="category_data.php">View</a></button>
            </form>
        </div>
    </body>
</html>
