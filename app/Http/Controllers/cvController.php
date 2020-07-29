<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Etat_Civil;
use App\Models\Exptask;
use App\Models\Formation;
use App\Models\Interet;
use App\Models\Langue;
use App\Models\Skills;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cvController extends Controller
{
    public function index(){
        $user = Auth::user();
        $etat_civil = Etat_Civil::find($user->id);
        $competences = Competence::where('etat_civil_id', $user->id)->get();
        $langues = Langue::where('etat_civil_id', $user->id)->get();
        $skills = Skills::where('etat_civil_id', $user->id)->get();
        $taches = Tache::where('etat_civil_id', $user->id)->get();
        $interets = Interet::where('etat_civil_id', $user->id)->get();
        $formations = Formation::where('etat_civil_id', $user->id)->get();

        return view('0 CV.index', compact('etat_civil', 'user', 'competences', 'formations', 'langues', 'skills', 'taches', 'interets'));
    }

    public function export_cv_to_pdf(){
        $user = Auth::user();
        $etat_civil = Etat_Civil::find($user->id);
        $competences = Competence::where('etat_civil_id', $user->id)->get();
        $langues = Langue::where('etat_civil_id', $user->id)->get();
        $skills = Skills::where('etat_civil_id', $user->id)->get();
        $taches = Tache::where('etat_civil_id', $user->id)->get();
        $interets = Interet::where('etat_civil_id', $user->id)->get();
        $formations = Formation::where('etat_civil_id', $user->id)->get();

        $data = array(
           "etat_civil"     => $etat_civil,
            "competences"   => $competences,
            "langues"       => $langues,
            "skills"        => $skills,
            "taches"        => $taches,
            "interets"      => $interets,
            "formations"
            => $formations,
        );

        $pdf = \PDF::loadView('0 CV.index', $data);
        return $pdf->stream();
        // return $pdf->download('invoice.pdf');
    }
}
