<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\Products\Interfaces\IProductDataProvider;
use App\Http\Controllers\Admin\Products\Service\ProductServiceContainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller {
    /**
     * @var IProductDataProvider
     */
    private IProductDataProvider $productDataProvider;

    public function __construct() {

        $this->productDataProvider = ProductServiceContainer::factory();

    }

    public function index()
    {
        $products = $this->productDataProvider->getLatestProducts(5);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.add');
    }

    public function store(Request $request)
    {
        $status = $this->productDataProvider->saveProduct($request);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = $this->productDataProvider->showProductById($id);

        if ($product === null) {
            return response()->json(
                [
                    'message' => 'Product not found.'
                ], 404);
        }

        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productDataProvider->showProductById($id);

        if ($product === null) {
            return response()->json(
                [
                    'message' => 'Product not found.'
                ], 404);
        }

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $status = $this->productDataProvider->updateProduct($request, $id);

        $product = $this->productDataProvider->showProductById($id);

        if ($status === false) {
            return view('admin.products.edit', compact('product'));
        }

        return view('admin.products.show', compact('product'));
    }

    public function destroy($id)
    {
        //
    }
}
