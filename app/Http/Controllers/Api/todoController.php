<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\todo as ModelsTodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Models\todo;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "status"=>"success",
            "data"=>ModelsTodo::all()
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "title"=>"required|max:250",
            "description"=>"required|min:2"
        ]);
        if($validate->fails()){
            return response()->json([
                "status"=>"error",
                "errors"=>$validate->errors()
            ],402);
        }


        $todo = new ModelsTodo();
        $todo->title=$request->title;
        $todo->description=$request->description;
        if($todo->save()){

            return response()->json([
                "status"=>"success",
                "datat"=>$todo
            ],200);
        }else{
            return response()->json([
                "status"=>"error",
                "error"=>"internal server error"
            ],500);
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
        $todo = ModelsTodo::find($id);
        if(empty($todo)){
            return response()->json([
                "status"=>"error",
                "error"=>"todo not found !"
            ],404);
        }else{
            return response()->json([
                "status"=>"success",
                "data"=>$todo
            ],200);
        }
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
        $validate = Validator::make($request->all(),[
            "title"=>"required|max:250",
            "description"=>"required|min:2"
        ]);
        if($validate->fails()){
            return response()->json([
                "status"=>"error",
                "errors"=>$validate->errors()
            ],402);
        }
        $todo = ModelsTodo::find($id);
        if(empty($todo)){
            return response()->json([
                "status"=>"error",
                "error"=>"todo not found !"
            ],404);
        }
        $todo->title=$request->title;
        $todo->description=$request->description;
        if($todo->update()){

            return response()->json([
                "status"=>"success",
                "datat"=>$todo
            ],200);
        }else{
            return response()->json([
                "status"=>"error",
                "error"=>"internal server error"
            ],500);
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
        $todo = ModelsTodo::find($id);
        if(empty($todo)){
            return response()->json([
                "status"=>"error",
                "error"=>"todo not found !"
            ],404);

        }else{
            $todo->delete();
            return response()->json([
                "status"=>"success",
                "data"=>$todo
            ],200);
        }
    }
}
