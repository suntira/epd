<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Phrase;
use App\Models\User;

class IndexController extends Controller
{
    public function index(Request $request) {
    $phrases = Phrase::inRandomOrder()->paginate(1);
    return view('welcome', [
        "phrases" => $phrases
    ]);
}
}
