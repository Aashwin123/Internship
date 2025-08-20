<!DOCTYPE html>
<html>
<head>
    <title>Create Seller & Product</title>
</head>
<body>

    <h2>Add Seller & Product</h2>

    {{-- Seller Form --}}
    <form id="sellerForm" method="POST" action="{{ route('sellers.store') }}">
        @csrf
        <h4>Seller Info</h4>
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>
    </form>

    {{-- Product Form --}}
    <form id="productForm" method="POST" action="{{ route('products.store') }}">
        @csrf
        <h4>Product Info</h4>
        <label>Title:</label>
        <input type="text" name="title" required><br>

        <label>Price:</label>
        <input type="number" name="price" required><br>
    </form>

    {{-- Submit Both --}}
    <button onclick="submitBoth()">Submit Both</button>

    <script>
        function submitBoth() {
            document.getElementById('sellerForm').submit();
            setTimeout(() => {
                document.getElementById('productForm').submit();
            }, 1000); // Delay to let first request go through
        }
    </script>

</body>
</html>
