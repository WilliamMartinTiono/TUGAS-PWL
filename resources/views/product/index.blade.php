<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Index</title>
    
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
  </head>
  <body>
    <table class="table table-striped table-hover">
    <tr>
        <th colspan="7">
            <h1 style="color:white;">Daftar Produk</h1>
        </th>
    </tr>
    <tr style="background-color:white;">
        <th>ID</th>
        <th>Barcode</th>
        <th>Nama Produk</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Supplier</th>
        <th>Aksi</th>
    </tr>

    @foreach ($products as $product)
    <tr style="background-color:white;">
        <td>{{ $product->id }}</td>
        <td>{{ $product->barcode_number }}</td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->buy_price }}</td>
        <td>{{ $product->sell_price }}</td>
        <td>{{ $product->supplier->supplier_name ?? '-' }}</td>

<td>
    <div style="display:flex; gap:8px; align-items:center;">

        <!-- Tombol Show -->
        <a href="{{ url('/product/'.$product->id) }}"
           style="color:blue;">
            <i class="fa-solid fa-eye"
               style="height:12px; width:12px;"></i>
        </a>

        <!-- Tombol Edit -->
        <a href="{{ url('/edit-product/'.$product->id) }}"
           style="color:green;">
            <i class="fa-solid fa-pen-to-square"
               style="height:12px; width:12px;"></i>
        </a>

        <!-- Tombol Delete -->
        <form action="{{ url('/product/'.$product->id) }}"
              method="POST"
              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
            @csrf
            @method('DELETE')

            <button type="submit"
                    style="background:none; border:none; cursor:pointer; color:red; padding:0;">
                <i class="fa-solid fa-trash-can"
                   style="height:12px; width:12px;"></i>
            </button>
        </form>

    </div>
</td>

    </tr>
    @endforeach

    <tr>
        <td colspan="7" class="text-center">
            <a href="{{ url('/create-product') }}"
               class="btn btn-primary">
                <i class="fa-solid fa-square-plus"></i>
                Tambah Produk
            </a>
        </td>
    </tr>
</table>
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
  </body>
</html>



