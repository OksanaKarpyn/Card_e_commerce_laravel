<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Rule;

class CardController extends Controller
{
    public function welcome()
{
    $cards = Card::all();
    return view('welcome', compact('cards'));
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();
        $user = Auth::user();
        $cards = Card::where('user_id', $user->id)->get();
        // dd($cards);
        return view('dashboard', compact('user', 'cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('card.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //dd('Store method called');
       $validate_data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description'=>['required', 'string'],
            'photo' =>['image', 'max:2048', 'nullable'],
            'price' => ['string', 'max:10', 'required'],
        ]);
         // Carica  immagine
        if($request->hasFile('photo')){
            $path_img = Storage::disk('public')->put('folderPhoto', $request->photo);
            $validate_data['photo'] = $path_img;
            //dd($path_img);
            
        }
        $new_card = new Card();
        $validate_data['user_id']= Auth::user()->id;
        $new_card->fill($validate_data);
        $new_card->save();
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $singleCard = Card::findOrFail($id);
        return view('card.show', compact('singleCard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $card = Card::find($id);
        return view('card.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        $validate_data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description'=>['required', 'string'],
            'photo' =>['image', 'max:2048', 'nullable'],
            'price' => ['string', 'max:10', 'required'],
        ]);

         // Verifica se è stata caricata una nuova immagine
        if ($request->hasFile('photo')) {
            // Elimina l'immagine precedente se esiste
            Storage::disk('public')->delete($card->photo);
        
            // Carica la nuova immagine
            $path_img = Storage::disk('public')->put('folderPhoto', $request->photo);
            $validate_data['photo'] = $path_img;
        }
        $validate_data['user_id']= Auth::user()->id;
        $card->fill($validate_data);
        $card->update();

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $card = Card::find($id);
        $card->delete();
        return redirect()->route('dashboard');
    }
}