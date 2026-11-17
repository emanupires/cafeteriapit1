<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Exception;
use File;
use stdClass;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProductController
{
    public function products(): Response
    {
      return response()->json(Product::all());
    }

    public function show(int $id): Response {
      return response()->json(Product::find($id));
    }

    public function getEditForm(int $id = null)
    {
        if (!$id)
          return view('components.menu.card-edit');

        $product = Product::find($id);

        return view('components.menu.card-edit', compact('product'));
    }

    public function getProductDisplay(int $id = null)
    {
        if (!$id)
          throw new Exception("Impossível ver um produto sem o id");

        $product = Product::find($id);

        return view('components.menu.product-display', compact('product'));
    }

    public function update(Request $request, int $id)
    {
      $product = Product::find($id);
      $product->name = $request->input('name');
      $product->price = $request->input('price');
      $product->image = $request->input('image');
      $product->description = $request->input('description');
      $product->product_type = $request->input('product_type');

      $product->save();

      return redirect('/');
    }

    public function destroy(int $id)
    {
        Product::find($id)->delete();
    }

    public function store(Request $request)
    {
      $product = new Product();
      $product->name = $request->input('name');
      $product->price = $request->input('price');
      $product->image = $request->input('image');
      $product->description = $request->input('description');
      $product->product_type = $request->input('product_type');

      $product->save();

      return redirect('/');
    }

    public function productTypes()
    {
      return response()->json(ProductType::all());
    }

    public function avaiableImages()
    {
      return collect(File::files(public_path('imgs')))
        ->filter(fn ($file) => $file->getExtension() === 'jpg')
        ->map(fn ($file) => $file->getFilenameWithoutExtension())
        ->values();
    }
}
