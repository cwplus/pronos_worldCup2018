
@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
         {{ session('status') }}
    </div>
@endif

<div class="jumbotron "  id="accueil">
    <h1 class="text-center">Pronos-Potos <br>
        <img src = "img/country/Russie.png" >
        Edition : coupe du monde 2018
        <img src = "img/country/Russie.png" >
    </h1>
</div>

<!-- PROCHAINS MATCHS -->
<div class="row"><br>
    <div class="col-12 col-md-5 d-block " >
        <div class="card ">
            <div class="card-header text-center text-white bg-info ">Prochains matchs<br>
            </div>
            <div class="card-body"  style="height:250px;">
                <div class="row">
                    <div class=" col-12 "></div>

                    <table class="table  table-sm">
                        <tbody>

                        {{Jenssegers\Date\Date::setLocale('fr')}}

                        @if (count($matchs_prono) === 0)
                            <tr><td colspan="3" class = "text-center">Aucun match à pronostiquer.</td></tr>
                        @else
                        @foreach ($matchs_prono as $match_prono)
                        <tr>
                            <td>Le {{ Jenssegers\Date\Date::parse($match_prono->date_match)->format('d/m à H:i')}} </td>
                        <td style= "vertical-align:middle;">
                            <img  src = "/img/country/{{$match_prono->equipe1}}.png" style="vertical-align : -3px;">
                            <span class = "text-center">{{$match_prono->equipe1 }}-{{$match_prono->equipe2 }}</span>
                            <img  src = "img/country/{{$match_prono->equipe2 }}.png" style="vertical-align : -3px;" >
                        </td>
                        <td class="text-center" style= "vertical-align:middle;" ><img  src = "img/chaine/{{$match_prono->chaine_TV}}.png" ></td>
                         </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-offset-1 col-md-5 offset-md-2 d-block " >
        <div class="card">
            <div class="card-header text-center text-white bg-info ">Derniers résultats<br>
            </div>
            <div class="card-body"  style="height:250px;">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-12 "></div>

                    <table class="table  table-sm">
                        <tbody>

                        {{Jenssegers\Date\Date::setLocale('fr')}}
                        @if (count($matchs_end) === 0)
                            <tr><td colspan="3" class = "text-center">Aucun match commencé</td></tr>
                        @else
                        @foreach ($matchs_end as $match_end)
                            <tr>
                                <td>Le {{ Jenssegers\Date\Date::parse($match_end->date_match)->format('d/m')}} </td>
                                <!-- <td style= "vertical-align:middle;"> Le '.date_format($date,'d/m').' à '.$heure.'</td>-->
                                <td style= "vertical-align:middle;">
                                    <img  src = "/img/country/{{$match_end->equipe1}}.png" style="vertical-align : -3px;">
                                    <span class = "text-center">{{$match_end->equipe1 }}-{{$match_end->equipe2 }}</span>
                                    <img  src = "img/country/{{$match_end->equipe2 }}.png" style="vertical-align : -3px;" >
                                </td>
                                <td>
                                    <span class = "text-center">{{$match_end->resultat1 }}-{{$match_end->resultat2 }}</span>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection