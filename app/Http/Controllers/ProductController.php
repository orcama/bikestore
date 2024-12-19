<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menyimpan produk ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Menyimpan gambar dan mendapatkan path-nya
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Membuat produk baru
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        // Mengembalikan respons dengan URL gambar
        $product->image_url = asset('storage/' . $imagePath);

        return response()->json($product, 201);
    }

    public function destroy($id)
    {
        // Temukan produk berdasarkan ID
        $product = Product::find($id);

        // Jika produk tidak ditemukan, kembalikan respons 404
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Hapus gambar jika ada
        if ($product->image) {
            // Menghapus file gambar dari storage
            Storage::disk('public')->delete($product->image);
        }

        // Hapus produk dari database
        $product->delete();

        // Mengembalikan respons sukses
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }


    // Mengambil semua produk
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
