

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            padding: 10px 0;
            position: fixed;
            top: 0;
            width: 100%;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo-search h1 {
            color: white;
            margin: 0;
        }

        nav form {
            margin-left: 20px;
        }

        nav form input[type="search"] {
            padding: 5px;
            border-radius: 5px;
            border: none;
        }

        nav .nav-buttons {
            display: flex;
        }

        .nav-buttons .button {
            color: white;
            background-color: #9081ff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-left: 10px;
            cursor: pointer;
        }

        .nav-buttons .button:hover {
            background-color: #9081ff;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 10px;
            padding: 90px 20px 20px; /* Adjusted padding to accommodate the fixed header */
        }

        .grid-item {
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #9081ff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            color: black;
        }

        .grid-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        footer {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <header>
        <nav>
            <div class="logo-search">
                <h1>Yours Trends</h1>
                <form>
                    <input type="search" name="search" id="search" placeholder="Search...">
                </form>
            </div>
            <div class="nav-buttons">
                <button class="button" onclick="viewBlog()">Blog</button>
                <button class="button" onclick="gridView()">Shop Product</button>
            </div>
        </nav>
    </header>

    <div class="grid-container">
        <?php
        $conn = new mysqli('localhost', 'dckap', 'Dckap2023Ecommerce', 'MyTaskdb');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        function retrieve_data_from_database($conn)
        {
            $query = "SELECT * FROM productdetails";
            $result = $conn->query($query);
            return $result;
        }

        $data = retrieve_data_from_database($conn);

        if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
                echo '<div class="grid-item">';
                echo '<p><strong>ID:</strong> ' . $row['id'] . '</p>';
                echo '<p><strong>Name:</strong> ' . $row['name'] . '</p>';
                echo '<p><strong>Price:</strong> ' . $row['price'] . '</p>';
                echo '<img src="controllers/' . $row['image'] . '" alt="' . $row['name'] . '">';
                echo '<a href="description.php?id=' . $row['id'] . '">';
                echo '<p><strong>Description:</strong> ' . '</p>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo "No data found";
        }

        ?>
    </div>

    <footer>
        <p>&copy; 2024 Yours Trends. All rights reserved.</p>
    </footer>

    <script>
        function viewBlog() {
            window.location.href = "blog.php"; // Redirect to blog.php when button is clicked
        }

        function gridView() {
            window.location.href = "shop.php"; // Redirect to shop.php when button is clicked
        }
    </script>

</body>

</html>