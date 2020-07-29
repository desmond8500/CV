@extends('0 CV.layout')

@section('content')
    <div class="banner">
        <div class="profil text-white">
            <table class="table">
                <tr>
                    <td>
                        <div class="name">
                            {{ Str::upper($etat_civil->firstname) }} <br>
                            {{ Str::upper($etat_civil->lastname) }} <br>
                        </div>
                        <div class="fonction">
                            {{ Str::upper($etat_civil->function) }}
                        </div>
                    </td>
                    <td class="civil text-right">
                        {{ $etat_civil->tel }} <i class="fa fa-phone"></i> <br>
                        {{ $etat_civil->address }} <i class="fa fa-map-marker"></i> <br>
                        {{ $etat_civil->email }} <i class="fa fa-envelope"></i>
                    </td>
                </tr>
            </table>
        </div>
        <div class="description">
            {{ $etat_civil->description }}
        </div>
    </div>

    <div class="competences">
        <h3 class="title">COMPETENCES ET LANGUES</h3>
        <table class="table">
            <tr>
                <td>
                @foreach ($competences as $competence)
                    <li class="ml-4">
                        {{ $competence->name}}
                    </li>
                @endforeach
                </td>
                <td>
                @foreach ($langues as $langue)
                    <li>
                        {{ $langue->name}}
                    </li>
                @endforeach
                </td>
            </tr>
        </table>

    </div>
    <div class="competences">
        <h3 class="title">FORMATION</h3>
        <table class="table">
            @foreach ($formations as $formation)
                <tr class="tr">
                    <td>
                        <div class="date">{{ $formation->start }} - {{ $formation->end }} </div>
                        <div class="lieu">{{ $formation->lieu }}</div>
                    </td>
                    <td>
                        <span class="titre2">{{ $formation->diplome }}</span> <br>
                        <span class="titre3">{{ $formation->school }}</span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="competences">
        <h3 class="title">EXPERIENCE PROFESSIONELLE</h3>
        <table class="table">
            @foreach ($skills as $skill)
                <tr class="tr">
                    <td>
                        <div class="date">{{ $skill->start }} - {{ $skill->end }}</div>
                        <div class="lieu">{{ $skill->lieu }}</div>
                    </td>
                    <td>
                        <div class="titre2">{{ $skill->function }}</div>
                        @php
                            $tasks = App\Models\Exptask::where('exp_id', $skill->id)->get();
                        @endphp
                        <div class="titre3 text-bold text-underline">Taches effectuées</div>
                        @foreach ($tasks as $task)
                            <li class="ml-4 titre3">{{ $task->name }} </li>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="competences">
        <h3 class="title">CENTRES D'INTERET</h3>
        <ul>
            @foreach ($interets as $interet)
                <li>
                    {{ $interet->name}}
                </li>
            @endforeach
        </ul>
    </div>

    {{-- <a href="{{ route('cv_to_pdf')}}">PDF</a> --}}

@endsection

