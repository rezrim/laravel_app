<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::with('product_category')->orderBy('id', 'desc')->get();
        $category = Category::orderBy('category_name', 'asc')->where('active', 1)->get();

        $data = [];
        $data['title'] = 'Product';
        $data['list'] = $product;
        $data['category'] = $category;

        return view('admin.product.list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $filename = '';

        if ($request->hasFile('product_image')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png', 'webp'];
            $files = $request->file('product_image');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $request->product_name . "." . $extension;
                // $public_folder = public_path() . $filename;
                $files->move(public_path('assets/images/product/'), $filename);
            } else {
                return redirect('product')->with('status', 'Gagal Upload Gambar');
            }
        }

        $value = new Product();
        $value->category_id = $request->category_id;
        $value->slug = $request->slug;
        $value->meta_description = $request->meta_description;
        $value->product_image = $filename;
        $value->meta_title = $request->meta_title;
        $value->product_name = $request->product_name;
        $value->product_description = $request->product_description;
        $value->stock = $request->stock;
        $value->price = $request->price;
        $value->view = 0;
        $value->active = $request->active;
        $value->save();

        return redirect('product')->with('status', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $filename = '';

        if ($request->hasFile('product_image')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png', 'webp', 'pdf'];
            $files = $request->file('product_image');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $request->product_name . "." . $extension;
                // $public_folder = public_path() . $filename;
                $files->move(public_path('assets/images/product/'), $filename);
            } else {
                return redirect('product')->with('status', 'Gagal Upload Gambar');
            }
        }

        if ($filename == "") {
            $filename = $request->product_image_old;
        }

        $value = Product::whereId($id)->first();
        $value->category_id = $request->category_id;
        $value->slug = $request->slug;
        $value->meta_description = $request->meta_description;
        $value->product_image = $filename;
        $value->meta_title = $request->meta_title;
        $value->product_name = $request->product_name;
        $value->product_description = $request->product_description;
        $value->stock = $request->stock;
        $value->price = $request->price;
        $value->active = $request->active;
        $value->save();

        return redirect('product')->with('status', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::whereId($id)->delete();

        return redirect('product')->with('status', 'Data Berhasil Dihapus');
    }
}
