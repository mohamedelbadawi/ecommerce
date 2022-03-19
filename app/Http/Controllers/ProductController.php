<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Http\Requests\ProductRequest;
use App\Http\traits\ImageOperations;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Tag;
use Couchbase\QueryErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    use ImageOperations;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = Product::with('attributes')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function show(Product $product)
    {

        return view('admin.product.attributes.index', compact('product'));
    }

    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->get();
        $tags = Tag::all();
        return view('admin.product.create', compact('categories', 'tags'));
    }

    public function editAttribute(Product $product, ProductAttribute $productAttribute)
    {

        return view('admin.product.attributes.edit', compact('productAttribute', 'product'));
    }

    public function deleteAttribute(Product $product, ProductAttribute $productAttribute)
    {
        try {
            $productAttribute->delete();
            Alert::success('Done', 'Property deleted successfully');
        } catch (ModelNotFoundException $exception) {

            Alert::error('Error', 'Can\'t delete Property right now');
        }
        return redirect()->route('admin.product.show', $product->id);
    }

    public function createAttribute(Product $product)
    {

        return view('admin.product.attributes.create', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        try {


            $product = Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'status' => $request['status'],
                'featured' => $request['featured'],
                'category_id' => $request['category_id']
            ]);
            $num = 1;
            foreach ($request->Images as $image) {
                $this->uploadMedia($product, $num, $image);
                $num++;
            }
            $product->tags()->attach($request['tags']);
            Alert::success('Done', 'Product created successfully');

        } catch (ModelNotFoundException $exception) {
            Alert::error('error', 'Can\'t create product right now');
        }
        return redirect()->route('admin.product.show', $product->id);
    }

    public function storeAttribute(Product $product, AttributeRequest $request)
    {
        try {

            ProductAttribute::create([
                'size' => $request['size'],
                'price' => $request['price'],
                'stock' => $request['stock'],
                'color' => $request['color'],
                'product_id' => $product->id
            ]);
            Alert::success('Done', 'Property created Successfully');
        } catch (ModelNotFoundException $exception) {
            Alert::error('Error', ' Can\'t create property now');
        }
        return redirect()->route('admin.product.show', $product->id);
    }

    public function updateAttribute(Product $product, AttributeRequest $request, ProductAttribute $productAttribute)

    {
        try {

            $productAttribute->update([
                'size' => $request['size'],
                'price' => $request['price'],
                'stock' => $request['stock'],
                'color' => $request['color'],
            ]);
            Alert::success('Done', 'Property updated Successfully');
        } catch (ModelNotFoundException $exception) {
            Alert::error('Error', ' Can\'t update   property now');
        }
        return redirect()->route('admin.product.show', $productAttribute->product_id);
    }

    public function edit(Product $product)
    {
        $tags = Tag::all();
        $categories = Category::whereNotNull('parent_id')->get();
        $productTags = $product->tags->pluck('id')->toArray();
        return view('admin.product.edit', compact(['tags', 'categories', 'product', 'productTags']));
    }

    public function removeImage(Product $product, Media $media)
    {
        dd($product);
        $this->deleteProductMedia($product, $media->id);

    }

    public function update(Product $product, ProductRequest $request)
    {
        try {
            $product->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'category_id' => $request['category_id'],
                'featured' => $request['featured'],
                'status' => $request['status']
            ]);
            $product->tags()->sync($request['tags']);
            if ($request->Images && count($request->Images) > 0) {
                $num = 1;
                foreach ($request->Images as $image) {
                    $this->uploadMedia($product, $num, $image);
                    $num++;
                }
            }
            Alert::success('Done', 'Product updated successfully');
        } catch (QueryErrorException $exception) {
            Alert::error('Error', 'Product can\'t be updated right now ');
        }
        return redirect()->route('admin.product.index');
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->media()) {
                foreach ($product->media as $media) {
                    $this->deleteProductMedia($product, $media->id);
                }
            }
            $product->tags()->detach();
            $product->delete();
            Alert::success('Done', 'Product deleted successfully');
        } catch (QueryException $exception) {
            Alert::error('Error', 'Can\'t delete product successfully');

        }
        return redirect()->route('admin.product.index');
    }
}
