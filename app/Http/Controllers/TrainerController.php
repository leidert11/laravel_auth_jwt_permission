<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trainer::get();
    }


    public function create(Request $request)
    {
        try{
            $request->validate([
                'name'=> 'required|string',
                'last_name' => 'required|string',
                'age' => 'required|integer',
                'birthday' => 'required|date'

            ]);
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        $trainer = Trainer::create([
            'name'=> $request->name,
            'last_name'=>$request->last_name,
            'age'=>$request->age,
            'birthday'=>$request->birthday,
        ]);
        return $trainer;
    }


    public function show(Int $id)
    {
        $trainer=Trainer::find($id);
        return response()->json($trainer);
    }




    public function update(Request $request, Int $id)
    {
        try{
            $request->validate([
                'name'=> 'required|string',
                'last_name' => 'required|string',
                'age' => 'required|integer',
                'birthday' => 'required|date'
            ]);
            $trainer=Trainer::findOrFail($id);
            $trainer->name=$request->name;
            $trainer->description=$request->description;
            $trainer->save();
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return $trainer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();

        return 'eliminado con exito';
    }
}
