<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Team::get();

    }


    public function create(Request $request)
    {
        try{
            $request->validate([
                'name'=> 'required|string',
                'description' => 'required|string',
                'average'=> 'required|double',
                'sport_id' => 'exists:sport,id',
                'trainer_id'=> 'exists:trainer,id'
            ]);
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        $team = Team::create([
            'name' => $request->name,
            'description' => $request->description,
            'average'=> $request->average,
            'sport_id'=> $request->sport_id,
            'trainer_id'=> $request->trainer_id,
        ]);

        return $team;
    }


    public function show(Int $id)
    {
        $team=Team::find($id);
        return response()->json($team);
    }


    public function update(Request $request, Int $id)
    {
        try{
            $request->validate([
                'name'=> 'required|string',
                'sport_id' => 'exists:sport,id'
            ]);
            $team=Team::findOrFail($id);
            $team->name=$request->name;
            $team->description=$request->description;
            $team->average=$request->average;
            $team->sport_id=$request->sport_id;
            $team->trainer_id=$request->trainer_id;

            $team->save();
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return $team;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return 'eliminado con exito';
    }
}
