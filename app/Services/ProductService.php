<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductService {
    public function getAllProduct(){
        return Product::all();
    }   
    public function getProductByCode($keyword): ?Product{

        return Product::where('code',  $keyword)->with(['plant:id,name','pot:id,name','status:id,name'])->first();
    }

    public function create(array $data, ?UploadedFile $image = null): Product {
        $path = null;
        if($image){
            $path = $image->store('uploads', 'public');
            
        }
        // dd($path);
        // dd($data);
        return Product::create([
            'name' => $data['name'],
            'code' => $data['code'] ?? uniqid(),
            'price' => $data['price'],
            'plant' => $data['plant'],
            'pot' => $data['pot'],
            'status' => $data['status_id'] ?? 1,
            'image' => $path,
        ]);
    }

    public function generateCode(){
        $code = '';
        do {
            $code = strtoupper(bin2hex(random_bytes(4)));
        } while (Product::where('code', $code)->exists());

        return $code;
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        if($product->image && Storage::disk('public')->exists($product->image)){
            Storage::disk('public')->delete($product->image);
        }
        return $product->delete();
    }
} 

    