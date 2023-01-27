<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = DB::table('products')->select('id', 'gambar', 'nama_barang', 'jumlah', 'harga')->get();
        return view('home', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(StoreproductRequest $request)
    {
        // $this->validate($request, [
        //     'image' => 'max:2048|mimes:jpeg,png,jpg,gif,svg',
        //     'nama-barang' => 'required|min:4',
        //     'jumlah' => 'required|min:1',
        //     'harga' => 'required'
        // ]);

        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        DB::table('products')->insert([
            'gambar' => $image->hashName(),
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga
        ]);


        return redirect()->route('products.index')->with(['Success' => 'Data telah tersimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('products.edit', compact('product'));
    }


    public function update(UpdateproductRequest $request, product $product)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            Storage::delete('public/products/' . $product->image);

            DB::table('products')->where('id', $product->id)->update([
                'gambar' => $image->hashName(),
                'nama_barang' => $request->nama_barang,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga
            ]);


            // $product->update([
            //     'gambar' => $image->hashName(),
            //     'nama_barang' => $request->nama_barang,
            //     'jumlah' => $request->jumlah,
            //     'harga' => $request->harga
            // ]);
        } else {
            // $product->update([
            //     'nama_barang' => $request->nama_barang,
            //     'jumlah' => $request->jumlah,
            //     'harga' => $request->harga
            // ]);

            DB::table('products')->where('id', $product->id)->update([
                'nama_barang' => $request->nama_barang,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga
            ]);
        }

        return to_route('products.index')->with(['Success' => 'Data telah diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        DB::table('products')->delete($product->id);
        return redirect()->route('products.index')->with(['Success' => 'Data telah dihapus']);
    }
}
