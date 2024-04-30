<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
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

        .list-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 90px 20px 20px; /* Adjusted padding to accommodate the fixed header */
        }

        /* Define styles for each list item */
        .list-item {
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #9081ff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            color: black;
        }

        .list-item:hover {
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

    <div class="list-container">
        <?php
        $conn = new mysqli('localhost', 'dckap', 'Dckap2023Ecommerce', 'MyTaskdb');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = " SELECT blog.*, users.username  FROM blog JOIN users ON blog.id = users.id";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='list-item'>";
                echo "<p>Id:" . $row["id"] . "</p>";
                echo "<p>name:" . $row["username"] . "</p>";
                echo "<p>Title: " . $row["title"] . "</p>";
                echo "<p>Content: " . $row["content"] . "</p>";
                echo "<p>CreatedAT: " . $row["createdAT"] . "</p>";
                echo "<p>Status: " . $row["Statuses"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
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
