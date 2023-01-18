<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Player::get();
    }

    public function create(Request $request)
    {
        try{
            $request->validate([
                'name'=> 'required|string',
                'last_name'=> 'required|string',
                'score'=> 'required|integer',
                'team_id'=> 'exists:team,id',
            ]);
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        $player = Player::create([
            'name' => $request->name,
            'last_name'=>$request->last_name,
            'score'=>$request->score,
            'team_id'=> $request-> team_id
        ]);

        return $player;
    }

    public function show(Int $id)
    {
        $player=Player::find($id);
        return response()->json($player);
    }



    public function update(Request $request, Int $id)
    {
        try{
            $request->validate([
                'name'=> 'required|string',
                'team_id' => 'exists:team,id'
            ]);
            $player=Player::findOrFail($id);
            $player->name=$request->name;
            $player->last_name=$request->last_name;
            $player->score=$request->score;
            $player->sport_id=$request->sport_id;
            $player->save();
        }catch(\Illuminate\Validation\ValidationException $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return $player;
    }


    public function destroy(Int $id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return 'eliminado con exito';
    }
}
