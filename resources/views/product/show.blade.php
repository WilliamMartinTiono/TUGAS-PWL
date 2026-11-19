
<!DOCTYPE html>
<html>
<head>
    <title>Product Show</title>
</head>
<body>

<table border="1" bgcolor="green" width="50%" cellpadding="8">
    <tr>
        <th colspan="2">
            <h1 style="color:white;">Detail Produk</h1>
        </th>
    </tr>

    <tr style="background-color:white;">
        <td>ID</td>
        <td>{{ $product->id }}</td>
    </tr>

    <tr style="background-color:white;">
        <td>Barcode</td>
        <td>{{ $product->barcode_number }}</td>
    </tr>

    <tr style="background-color:white;">
        <td>Nama Produk</td>
        <td>{{ $product->product_name }}</td>
    </tr>

    <tr style="background-color:white;">
        <td>Harga Beli</td>
        <td>{{ $product->buy_price }}</td>
    </tr>

    <tr style="background-color:white;">
        <td>Harga Jual</td>
        <td>{{ $product->sell_price }}</td>
    </tr>

    <tr style="background-color:white;">
        <td>Supplier</td>
        <td>{{ $product->supplier->supplier_name ?? '-' }}</td>
    </tr>

    <tr>
        <td colspan="2" align="center">
            <a href="{{ url('/product') }}">Kembali</a> |
            <a href="{{ url('/edit-product/'.$product->id) }}">Edit</a>
        </td>
    </tr>
</table>

</body>
</html>
