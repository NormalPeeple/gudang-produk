<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background: #F4C095">
    <div class="container mt-5 mb-5">
        <h1 class="display-4 text-md-start">Tambah Produk</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            <div class="d-grip gap-3">
                                <div class="form-group row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="inputNamaProduk" class="col-form-label font-weight-bold">NAMA PRODUK :</label>
                                      </div>
                                      <div class="col-auto">
                                        <input type="text" id="inputNamaProduk" class="form-control" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan Nama Produk">
                                      </div>
                                
                                    <!-- error message untuk title -->
                                    @error('nama_produk')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="inputJumlah" class="col-form-label font-weight-bold">JUMLAH :</label>
                                      </div>
                                      <div class="col-auto">
                                        <input type="text" id="inputJumlah" class="form-control" name="jumlah" value="{{ old('jumlah') }}" placeholder="Masukkan Jumlah Produk">
                                      </div>
                                
                                    <!-- error message untuk content -->
                                    @error('jumlah')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="inputHarga" class="col-form-label font-weight-bold">Harga :</label>
                                      </div>
                                      <div class="col-auto">
                                        <input type="text" id="inputHarga" class="form-control" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Jumlah Produk">
                                      </div>
                                
                                    <!-- error message untuk content -->
                                    @error('harga')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="form-group">
                                    <label class="font-weight-bold">GAMBAR</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                
                                    <!-- error message untuk title -->
                                    @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

    

    
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
    
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
    
</body>