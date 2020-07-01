<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Etat_Civil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cvController extends Controller
{
    public function index(){
        $user = Auth::user();
        $etat_civil = Etat_Civil::find($user->id);
        $competences = Competence::find($user->id);

        return view('0 CV.index', compact('etat_civil', 'user', 'competences'));
    }

    public function export_cv_to_pdf(){

    }
}
