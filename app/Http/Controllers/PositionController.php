<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Position::get();

    }


    public function create(Request $request)
    {
        try{
            $request->validate([
                'name'=> 'required|string',
                'sport_id' => 'exists:sport,id'
            ]);
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        $position = Position::create([
            'name' => $request->name,
            'sport_id' => $request->sport_id
        ]);

        return $position;
    }


    public function show(Int $id)
    {
        $position=Position::find($id);
        return response()->json($position);
    }



    public function update(Request $request, Int $id)
    {
        try{
            $request->validate([
                'name'=> 'required|string',
                'sport_id' => 'exists:sport,id'
            ]);
            $position=Position::findOrFail($id);
            $position->name=$request->name;
            $position->sport_id=$request->sport_id;
            $position->save();
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return $position;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return 'eliminado con exito';
    }
}
