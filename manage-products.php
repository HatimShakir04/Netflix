<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        main {
            padding: 2rem;
        }
        section {
            margin-bottom: 2rem;
            background: #fff;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
        form label {
            display: block;
            margin: 0.5rem 0 0.2rem;
        }
        form input, form button {
            padding: 0.5rem;
            margin-bottom: 1rem;
            width: 100%;
            box-sizing: border-box;
        }
        form button {
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #555;
        }
        .delete-btn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 0.3rem 0.5rem;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <header>
        <h1>Manage Products</h1>
    </header>
    <main>
        <section id="product-list">
            <h2>Product List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows of products will be dynamically added here -->
                </tbody>
            </table>
        </section>
        <section id="add-product">
            <h2>Add New Product</h2>
            <form id="product-form">
                <label for="product-name">Name:</label>
                <input type="text" id="product-name" name="product-name" required>
                <label for="product-price">Price:</label>
                <input type="number" id="product-price" name="product-price" required>
                <button type="submit">Add Product</button>
            </form>
        </section>
        <script>
            const productForm = document.getElementById('product-form');
            const productTableBody = document.querySelector('#product-list tbody');

            productForm.addEventListener('submit', (event) => {
                event.preventDefault();

                const productName = document.getElementById('product-name').value;
                const productPrice = document.getElementById('product-price').value;

                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${Date.now()}</td>
                    <td>${productName}</td>
                    <td>${productPrice}</td>
                    <td><button class="delete-btn">Delete</button></td>
                `;

                productTableBody.appendChild(newRow);

                // Clear form inputs
                productForm.reset();

                // Add delete functionality
                newRow.querySelector('.delete-btn').addEventListener('click', () => {
                    newRow.remove();
                });
            });
        </script>
    </main>
</body>
</html>
