<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
  </head>
  <body>
    <form action="{{ url('/product/'.$product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <table class="table table-striped table-hover">
        <tr>
            <th colspan="2">
                <h1 style="color:white;">Edit Produk</h1>
            </th>
        </tr>

        <tr style="background-color:white;">
            <td>Barcode</td>
            <td>
                <input type="text" name="barcode_number"
                       value="{{ $product->barcode_number }}"
                       style="width:98%;" required>
            </td>
        </tr>

        <tr style="background-color:white;">
            <td>Nama Produk</td>
            <td>
                <input type="text" name="product_name"
                       value="{{ $product->product_name }}"
                       style="width:98%;" required>
            </td>
        </tr>

        <tr style="background-color:white;">
            <td>Harga Beli</td>
            <td>
                <input type="number" name="buy_price"
                       value="{{ $product->buy_price }}"
                       min="0" required>
            </td>
        </tr>

        <tr style="background-color:white;">
            <td>Harga Jual</td>
            <td>
                <input type="number" name="sell_price"
                       value="{{ $product->sell_price }}"
                       min="0" required>
            </td>
        </tr>

        <tr style="background-color:white;">
            <td>Supplier</td>
            <td>
                <select name="supplier_id" required>
                    <option value="">--- Pilih Supplier ---</option>

                    @foreach ($supplier as $sup)
                        <option value="{{ $sup->id }}"
                            {{ $product->supplier_id == $sup->id ? 'selected' : '' }}>
                            {{ $sup->supplier_name }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <button type="submit">Simpan Perubahan</button>
                <a href="{{ url('/product') }}">Kembali</a>
            </td>
        </tr>
    </table>
</form>
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
  </body>
</html>


