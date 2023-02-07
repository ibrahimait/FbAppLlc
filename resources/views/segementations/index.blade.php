
@extends('layouts.navadmin')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des segmentations</h2>
            </div>

<!-- Filtres groupes -->
<div class="container" style="font-size : 12px ; margin-top : 35px ; margin-bottom : 20px">
	<div class="row">
    <ul class="ds-btn" style="list-style : none ; display : flex">
        <li style="margin-right : 15px ">

               <a class="btn btn-lg btn-dark" href="{{ route('groupesanssegments.index') }}"  style=" font-size : 15px">
            <i class="glyphicon glyphicon-dashboard pull-left"></i>
                    <span>Groupe sans segments<br><small>
                    <?php
                    use Illuminate\Support\Facades\DB;  
                    $countt=DB::connection('mysql')->table('groupes')
                        ->select('groupes.nom')
                        ->leftjoin('ambassadeur_groupe','groupes.id_groupe' , '=' , 'ambassadeur_groupe.id_groupe')
                        ->leftjoin('utilisateur','ambassadeur_groupe.id_ambassadeur' , '=' , 'utilisateur.id_utilisateur')
                        ->leftjoin('segment_groupe','groupes.id_groupe' , '=' , 'segment_groupe.id_groupe')
                        ->leftjoin('segements','segment_groupe.id_segment' , '=' , 'segements.id_segment')
                        ->whereNull('segements.id_segment')->distinct()-> count('groupes.id_groupe'); 
                    echo ($countt);
                ?>   Groupes
                    </small></span>
            </a>
        </li>
    </ul>
	</div>
</div>
<!-- Filtres FIN -->
            <div class="pull-right" style="margin-bottom : 30px">
                <a class="btn btn-success" href="{{ route('segementations.create') }}"> Ajouter</a>
            </div>
 <p> Il y'a :<?php $countt = DB::connection('mysql')->table('segementations')


                                        ->count('segementations.id_segmentation');
                                    echo $countt;
                                    ?> segementations</p>
        </div>
    </div>
   <br><br>
    @if ($message = Session::get('success'))S
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table">
        <table class="table">
            <thead class="thead" style="background:#bfbfbf">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Critères</th>
                <th scope="col">Description</th>
                <th scope="col">Groupe</th>
                <th width="150px"></th>
            </tr>
            </thead>
            @foreach ($segementations as $segementation)

            <tbody>
            <tr>
                <th  scope="row">{{ $segementation->id_segmentation }}</th>
                <td>{{ $segementation->nom_segmentation }}</td>
                <td>{{ $segementation->criteres }}</td>
                <td>{{ $segementation->description }}</td>
                <td> <?php

                                                $aaaa = $segementation->nom_segmentation;
                                                $countt = DB::connection('mysql')->table('groupes')
                                                    ->leftJoin('ambassadeur_groupe', 'groupes.id_groupe',
                                                    '=', 'ambassadeur_groupe.id_groupe')
                                                    ->leftJoin('utilisateur', 'ambassadeur_groupe.id_ambassadeur',
                                                     '=', 'utilisateur.id_utilisateur')
                                                    ->leftJoin('segment_groupe', 'groupes.id_groupe',
                                                     '=', 'segment_groupe.id_groupe')
                                                    ->leftJoin('segements', 'segment_groupe.id_segment',
                                                     '=', 'segements.id_segment')
                                                    ->leftJoin('segementations', 'segements.nom_segmentation',
                                                     '=', 'segementations.nom_segmentation')
                                                    ->where('segementations.nom_segmentation', $aaaa)
                                                    ->count('groupes.id_groupe');
                                                echo $countt;


                                                ?> </td>
                 <td>
                    <form action="" method="POST">
                                                                {{--  <a style="background-color : #fff ; border : #fff" class="btn btn-primary" href="{{ \Illuminate\Support\Facades\URL::route('segements.edit',['segements' => $segement->id_segment] ) }}"><i style="color : #e6ac00"  class="fas fa-edit"></i></a>  --}}

                    <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-info" href="{{ route('segementations.show',$segementation->id_segmentation) }}"><i style="color : black" class="fas fa-info"></i></a>
                        <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-primary" href="{{ route('segementations.edit',$segementation->id_segmentation) }}"><i style="color : black"  class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button formaction="{{ route('segementations.destroy',$segementation->id_segmentation) }}"  style="background-color : #fff ; border : #fff"  type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')"><i style="color : #cc3300"   class="fas fa-trash"></i></button>
                      {{--  <a style="background-color : #fff ; border : #fff" class="btn btn-info"
                                href="{{ route('segementations.showgrpseg',$segementation->id_segmentation) }}"><i
                                    style="color : #4d94ff" class="fas fa-info"></i></a>  --}}
                    </form>
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @endsection
