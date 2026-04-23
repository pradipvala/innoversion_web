<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Digital_Vcard;

class VisitingCardController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->id;

        $card = Digital_Vcard::where(['id' => $id])->first();

        return view('frontend.vising_card.show_digital_vising_card', compact('card'));
    }
}
