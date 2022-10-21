<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::orderBy('category_name', 'asc')->get();

        return response()->json(
            [
                'status' => true,
                'data' => $category,
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
        $input = $request->all();

        $category = Category::create($input);

        return response()->json(
            [
                'status' => true,
                'data' => $category,
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
        try {
            $category = Category::whereId($id)->first();

            return response()->json(
                [
                    'status' => true,
                    'data' => $category,
                    'message' => 'Data berhasil ditampilkan'
                ]
            );
        } catch (\Throwable $th) {

            return response()->json(
                [
                    'status' => false,
                    'data' => $th,
                    'message' => 'Data gagal ditampilkan'
                ]
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $category->category_name = $request->category_name;
        $category->active = $request->active;
        $category->save();

        return response()->json(
            [
                'status' => true,
                'data' => $category,
                'message' => 'Data berhasil diupdate'
            ]
        );
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
        Category::whereId($id)->delete();

        return response()->json(
            [
                'status' => true,
                'data' => [],
                'message' => 'Data berhasil dihapus'
            ]
        );
    }
}
