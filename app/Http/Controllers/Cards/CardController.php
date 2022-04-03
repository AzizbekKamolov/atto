<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PopulationController extends Controller
{
    public function index(Request $request){
            $populations = Cards::all();
        if ($request->card_number){
            $populations = Cards::where('card_number', 'LIKE', "%$request->card_number%")->get();
        }elseif($request->account){
            $populations = Cards::where('account', 'LIKE', "%$request->account%")->get();
        }elseif ($request->account and $request->card_number){
            $populations = Cards::where('account', 'LIKE', "%$request->account%")
                ->where('card_number', 'LIKE', "%$request->card_number%")
                ->get();
        }


        return view('cards.population.index', [
            'populations' => $populations
        ]);
    }
    public function create(){
        $clients = Client::all();
        return view('cards.population.create', [
            'clients' => $clients
        ]);
    }

    public function store(Request $request){
        $val = $request->validate([
            'card_number' => 'required|min:16',
            'expire' => 'required|digits:4',
            'client_id' => 'required',
            'account' => 'required|digits:10',
            'balance' => 'required',
            'status' => 'required|digits:1',
            'state' => 'required',
        ]);
        Cards::create($val);
        return redirect()->route('populationIndex');
    }
    public function show($request){
        $population = Cards::where('id', $request)->first();

        $string = implode(' ', str_split($population->card_number, 4));
        $population->card_number = $string;

        $expire = implode('/', str_split($population->expire, 2));
        $population->expire = $expire;

        return view('cards.population.show1', [
            'population' => $population
        ]);
    }

    public function edit(Request $request){
        $population = Cards::where('id', $request->id)->first();
        return view('cards.population.edit', [
            'population' => $population
        ]);
    }
    public function update(Request $request){
        $val = $request->validate([
            'card_number' => 'required|min:16',
            'expire' => 'required|digits:4',
            'account' => 'required|digits:10',
            'balance' => 'required',
            'status' => 'required|digits:1',
            'state' => 'required',
        ]);
        Cards::where('id', $request->id)->update([
            'card_number' => $request['card_number'],
            'expire' => $request['expire'],
            'account' => $request['account'],
            'balance' => $request['balance'],
            'status' => $request['status'],
            'state' => $request['state'],
        ]);
        return redirect()->route('populationIndex');
    }
    public function delete(Request $request){
        Cards::where('id', $request->id)->delete();
        return redirect()->route('populationIndex');
    }

}
