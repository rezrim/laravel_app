<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->q) {
            $product = Product::orderBy('id', 'desc')
                ->where('product_name', 'like', '%' . $request->q . '%')->get();
        } else {
            $product = Product::orderBy('id', 'desc')->get();
        }

        return response()->json(
            [
                'status' => true,
                'data' => $product,
                'message' => 'Data berhasil ditampilkan'
            ]
        );
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
        $value->meta_description = $request->product_description;
        $value->product_image = $filename;
        $value->meta_title = $request->product_name;
        $value->product_name = $request->product_name;
        $value->product_description = $request->product_description;
        $value->stock = $request->stock;
        $value->price = $request->price;
        $value->view = 0;
        $value->active = 1;
        $value->save();


        return response()->json(
            [
                'status' => true,
                'data' => $value,
                'message' => 'Data berhasil disimpan'
            ]
        );
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

        return response()->json(
            [
                'status' => true,
                'data' => [],
                'message' => 'Data berhasil dihapus'
            ]
        );
    }
}
