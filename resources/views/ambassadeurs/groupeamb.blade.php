@extends('layouts.navadmin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

                <h2>Liste des ambassadeurs groupe </h2>

                <br>

                <p> Il y'a : {{ $ambassadeurGroupes->total() }} Groupes</p>
            </div>



        </div>
    </div>
    <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table">
        <table class="table">
            <thead class="thead" style="background:#bfbfbf">
                <?php

                // On attache les valeurs
                ?>
                <tr>
                    {{-- <th>N°</th> --}}
                    <th>@sortablelink('id ambassadeur')</th>
                    <th>@sortablelink('id groupe') </th>
                    <th>@sortablelink('statut adhesion')</th>
                    <th>@sortablelink('date adhesion')</th>
                    <th>@sortablelink('notifications')</th>
                    <th>@sortablelink('traitement')</th>
                    <th>@sortablelink('statut releve')</th>
                    <th width="150px"></th>
                </tr>
            </thead>
            @if ($ambassadeurGroupes->count())
                @foreach ($ambassadeurGroupes as $key => $value)
                    <tr>
                        {{-- <td>{{ $loop->index+1}}</td> --}}
                        <th scope="row">{{ $value->id_ambassadeur }}</th>
                        <td>{{ \Str::limit($value->id_groupe, 40) }}</td>
                        <td>{{ $value->statut_adhesion }}</td>
                        <td>{{ $value->date_adhesion }}</td>
                        <td>{{ $value->notifications }}</td>
                        <td>{{ $value->traitement }}</td>
                        <td>{{ $value->statut_releve }}</td>
                        <td>
                            {{-- <form action="{{ route('AmbassadeurGroupe.destroy',$value->id_ambassadeur) }}" method="POST">
                    <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-info" href="{{ route('AmbassadeurGroupe.show',$value->id_ambassadeur) }}"><i style="color : black" class="fas fa-info"></i></a>
                        <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-primary" href="{{ route('AmbassadeurGroupe.edit',$value->id_ambassadeur) }}"><i style="color : black"  class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')

                        <button  style="background-color : #fafafa ; border : #fafafa"  type="submit" class="btn btn-danger"><i style="color : black"   class="fas fa-trash"></i></button> --}}
                            {{-- <a style="background-color : #fff ; border : #fff" class="btn btn-info" href="{{ route('groupecampagnes.index',$value->id_campagne) }}"><i style="color : #4d94ff" class="fas fa-info"></i></a> --}}
                            {{-- </form>
                </td>
                {{--  <td>
                    <form action="{{ route('deleteAmbassadeur',$ambassadeurGroupe->id_utilisateur) }}" method="POST">
                    <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-info" href="{{ route('AmbassadeurGroupe.show',$ambassadeurGroupe->id_utilisateur) }}"><i style="color : black" class="fas fa-info"></i></a>
                        <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-primary" href="{{ route('AmbassadeurGroupe.edit',$ambassadeurGroupe->id_utilisateur) }}"><i style="color : black"  class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button  style="background-color : #fafafa ; border : #fafafa"  type="submit" class="btn btn-danger"><i style="color : black"   class="fas fa-trash"></i></button>
                    </form>
                </td> --}}
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
    {!! $ambassadeurGroupes->links() !!}
@endsection
