<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Offer;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        //$offers = Offer::where('id', $user_id)->orderBy('id','desc')->get();
        $user = User::find($user_id);

        return view('profile.index')->withOffers( $user->offers )->withAssignments( $user->assignments );
    }
}