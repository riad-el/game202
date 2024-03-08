<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function start(Request $req)
    {
        $name = $req->input("nom");
        $rand = random_int(1, 99);
        $game = Game::create(["nom" => $name, "rand" => $rand]);
        session()->put("cmpt", 1);
        session()->put("id", $game->id);
        session()->put("mess", "");
        return redirect()->route("showForm");
    }
    public function play(Request $req)
    {
        $nmbr = $req->input("nbr");
        $id = session()->get("id");
        $game = Game::find($id);
        $rand = $game->rand;
        $mess = session()->get("mess");
        $cmpt = session()->get("cmpt");
       
        switch ($cmpt) {
            case 1:
                $game->nbr1 = $nmbr;
                $cmpt++;
                break;
            case 2:
                $game->nbr2 = $nmbr;
                $cmpt++;
                break;
            case 3:
                $game->nbr3 = $nmbr;
                $cmpt++;
                break;
            case 4:
                $game->nbr4 = $nmbr;
                $cmpt++;
                break;
         
            default: return view("result",compact("mess"));
        }
        $game->save();
        session()->put("cmpt",$cmpt);
        $mess .= "Vous Avez Coisi " . $nmbr;
        if ($rand > $nmbr) {
            $mess .= " UP </br>";
        } elseif ($rand < $nmbr) {
            $mess .= " DOWN </br>";
        } else $mess .= "BRAVo!!!! </br>";
        session()->put("mess",$mess);
        return view("play",compact("mess"));
    }
}
