<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background: #F4C095">
    
    
    <br>
    <div class="container mt-5">
        <h1 class="display-4 text-md-start">Daftar Produk</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <Table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Gambar Produk</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @forelse ($products as $product)                    
                                <tr>
                                
                                    <td>
                                        <img src="{{ asset("storage/products/".$product->gambar) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>
                                        <p>{{ $product->nama_barang }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $product->jumlah }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $product->harga }}</p>
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Produk akan dihapus, apakah anda yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                             @empty
                                    <div class="alert alert-danger">
                                        Data tidak ditemukan
                                    </div>
                    
                             @endforelse
                            </tr>
                        </Table>
                        <a href="{{ route('products.create') }}" class="btn btn-lg rounded-circle btn-success mb-3 float-xl-end">+</a>
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>




    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>