<!-- ----------------passing id through url------------ -->
<?php

$conn = new mysqli('localhost', 'dckap', 'Dckap2023Ecommerce', 'MyTaskdb');

$id = $_GET['id'];
if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT * FROM productdetails WHERE id = $id LIMIT 1";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: 'id' parameter is missing.";
}
?>

<!-- ----------------description page view---------- -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description</title>
    <style>
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: calc(33.33% - 20px); /* Three products per row */
            float: left;
            box-sizing: border-box;
            background-color: #9081ff;
        }

    </style>
</head>

<body>
    <?php if (isset($row)) : ?>
        <div class="product">
            <h1>Description:</h1>
            <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
            <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
            <p><strong>Price:</strong> <?php echo $row['price']; ?></p>
            <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
        </div>
    <?php else : ?>
        <p>No data found for ID: <?php echo $id; ?></p>
    <?php endif; ?>
</body>

</html>
