<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\User;
use DB;

class OfferController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function latest()
    {
            $offers =  Offer::all()->sortByDesc('id')->take(3);
            return view('welcome')->withOffers( $offers );
    }

    public function index()
    {
        $offers =  Offer::all()->sortByDesc('id');

        return view('offers.index')->withOffers($offers);
    }


    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {
        $offer = new Offer();
        $offer->title = $request->title;
        $offer->owner = auth()->user()->id;
        $offer->description = $request->description;
        $offer->deadline = $request->deadline;
        $offer->maxSalary = $request->maxSalary;
        $offer->save();

        return redirect()->route('profile.index');
    }


    public function show(Offer $offer)
    {
        $user = User::find($offer->owner);
        return view('offers.show')->withOffer($offer)->withUser($user);
    }


    public function edit(Offer $offer)
    {
        return view( 'offers.edit')->withOffer($offer);
    }


    public function update(Request $request, Offer $offer)
    {

        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->deadline = $request->deadline;
        $offer->maxSalary = $request->maxSalary;
        $offer->save();
        return redirect()->route('offers.show', $offer );
    }


    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index');
    }
}
