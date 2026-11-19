<!DOCTYPE html>
<html>
<head>
    <title>Create Produk</title>
</head>
<body>

<form action="{{ url('/product') }}" method="POST">
    @csrf

    <table border="1" bgcolor="green" width="35%">
        <tr>
            <th colspan="2">
                <h1 style="color:white;">Create Produk</h1>
            </th>
        </tr>

        <tr>
            <td>Barcode</td>
            <td>
                <input type="text" name="barcode_number"
                       style="width:98%;" required>
            </td>
        </tr>

        <tr>
            <td>Nama Produk</td>
            <td>
                <input type="text" name="product_name"
                       style="width:98%;" required>
            </td>
        </tr>

        <tr>
            <td>Harga Beli</td>
            <td>
                <input type="number" name="buy_price"
                       value="0" min="0" required>
            </td>
        </tr>

        <tr>
            <td>Harga Jual</td>
            <td>
                <input type="number" name="sell_price"
                       value="0" min="0" required>
            </td>
        </tr>

        <tr>
            <td>Supplier</td>
            <td>
                <select name="supplier_id" required>
                    <option value="">--- Pilih Supplier ---</option>

                    @foreach ($supplier as $sup)
                        <option value="{{ $sup->id }}">
                            {{ $sup->supplier_name }}
                        </option>
                    @endforeach

                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <button type="submit">Create</button>
                <button type="reset">Batal</button>
            </td>
        </tr>
    </table>

</form>

</body>
</html>