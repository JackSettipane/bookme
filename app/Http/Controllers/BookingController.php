<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class BookingController extends Controller

{

    public function showCheckoutForm(Request $request, $celebrity)
    {

        $celebrity = User::role('talent')->where('slug', $celebrity)->first();
        return view('frontend.pages.checkout', [
        'celebrity' => $celebrity

        ]);

    }

}

