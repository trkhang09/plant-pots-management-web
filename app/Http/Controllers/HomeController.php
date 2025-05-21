<?php

namespace App\Http\Controllers;

use App\Services\PlantService;
use App\Services\PotService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;
    protected $plantService;
    protected $potService;

    public function __construct(ProductService $productService, PlantService $plantService, PotService $potService){
        $this->productService = $productService;
        $this->plantService = $plantService;
        $this->potService = $potService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plants = $this->plantService->all();
        $pots = $this->potService->all();
        $products = $this->productService->getAllProduct();
        return view('components.homes.home', ['products' => $products, 'plants' => $plants, 'pots'=> $pots] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
