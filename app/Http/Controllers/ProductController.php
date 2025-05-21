<?php

namespace App\Http\Controllers;

use App\Services\PlantService;
use App\Services\PotService;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;
    protected $plantService;
    protected $potService;
    public function __construct(ProductService $productService, PlantService $plantService, PotService $potService)
    {
        $this->productService = $productService;
        $this->plantService = $plantService;
        $this->potService = $potService;
    }

    //
    public function index()
    {
        // return view('components.products.index');
        $products = $this->productService->getAllProduct();
        return $products;
    }
    public function show()
    {
        $products = $this->productService->getAllProduct();
        dd($products);
    }
    public function showByCode(Request $request)
    {
        $keyword = $request->query('code');
        if (!$keyword) {
            return response()->json(['message' => 'Missing product code'], 400);
        }

        $product = $this->productService->getProductByCode($keyword);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // return response()->json($product);
        return view('components.products.index', compact('product'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'new_plant' => 'nullable|string',
            'new_pot' => 'nullable|string',
        ]);
        $plantId = $this->plantService->createIfNeeded($request->input('new_plant')) ?? $request->input('plant');
        $potId = $this->potService->createIfNeeded($request->input('new_pot')) ?? $request->input('pot');

        $code = $this->productService->generateCode();

        // Gọi service tạo sản phẩm
        $this->productService->create([
            'name' => $request->name,
            'code' => $code,
            'price' => $request->price,
            'plant' => $plantId,
            'pot' => $potId,
            'status_id' => $request->input('status_id', 1),
        ], $request->file('image'));

        // return redirect()->route('products.index')->with('success', 'Đã thêm sản phẩm!');
        return response()->json(['message' => 'Success'], 200);
    }

    public function destroy($id) {
        try {
            $deleted = $this->productService->destroy($id);

            if ($deleted) {
                return response()->json(['message' => 'Product deleted successfully.'], 200);
            } else {
                return response()->json(['message' => 'Product not found or could not be deleted.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting product.', 'error' => $e->getMessage()], 500);
        }
    }
}
