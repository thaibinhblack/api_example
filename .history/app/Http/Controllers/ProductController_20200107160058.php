<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products = ProductModel::all();
        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response    
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ten_sp' => 'required|max:50',
            'gia_sp' => 'required',
        ]);
        if($validatedData)
        {
            $mota = $request->has('mo_ta') == true ? $request->get('mo_ta') : null;
            $product_new = ProdctModel::create([
                "ten_sp" => $request->get('ten_sp'),
                "gia_sp" => $request->get('gia_sp'),
                "mo_ta" => $mota
            ]);
            return response()->json($product_new, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductModel::where('id',$id)->first();
        return response()->json($product, 200);
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
        $validatedData = $request->validate([
            'ten_sp' => 'required|max:50',
            'gia_sp' => 'required',
            'mo_ta' => 'required'
        ]);
        if($validatedData)
        {
            $product_new = ProdctModel::where('id',$id)->update([
                "ten_sp" => $request->get('ten_sp'),
                "gia_sp" => $request->get('gia_sp'),
                "mo_ta" => $mota
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật thành công',
                'status' => 200
            ], 200);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_new = ProdctModel::where('id',$id)->destroy();
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thành công',
            'status' => 200
        ], 200);
    }
}
