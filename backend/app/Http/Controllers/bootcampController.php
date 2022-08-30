<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Models\Bootcamp;
use Illuminate\Support\Facades\Hash;

class bootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo;
        //return Bootcamp::all();
        return response()->json(["success" => true,
                                    "data" => Bootcamp::all()], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verificar que llegue el payload
        //return $request->all();
        //registrar el bootcamp a partir del payload
        $b = new Bootcamp();
        $b->name = $request->input("name");
        $b->description = $request->input("description") ;
        $b->website = $request->input("website");
        $b->phone = $request->input("phone");       
        $b->user_id = $request->input("user_id");
        $b->save();
            
        return response()->json(["success"=> true,
                                    "data" => $b] , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(["success" => true,
        "data" => Bootcamp::find($id)], 200);
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
        //echo"Aqui se modifican los datos del bootcamp basado en su id $id";
        //seleccionar el bootcamp por id
        $bootcamp = Bootcamp::find($id);
        //actualizarlo
        $bootcamp->update(
            $request->all()
        );
        //hacer response, llevarlo desde el api hasta postman

        return response()->json(["success"=>true,
                                    "data"=>$bootcamp],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "Aqui se va a eliminar el bootcamp cuyo id es $id";

        //Seleccionas el bootcamp
        $bootcamp = Bootcamp::find($id);
        //eliminar ese bootcamp
        $bootcamp->delete();

        return response()->json([ "success"=>true,
                                    "message" => "bootcamp eliminado", 
                                    "data" =>$bootcamp->$id], 200);
    }
}
