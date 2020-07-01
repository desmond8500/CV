@extends('0 CV.layout')

@section('content')
    <div class="banner">
        <div class="profil">
            <table class="table">
                <tr>
                    <td class="name">
                        {{ Str::upper($etat_civil->firstname) }} <br>
                        {{ Str::upper($etat_civil->lastname) }}
                    </td>
                    <td class="civil">
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
        <ul>
            @foreach ($competences as $competence)
                <li>
                    {{ $competence->name}}
                </li>

            @endforeach
        </ul>

    </div>

    <div class="formation">

    </div>
@endsection

