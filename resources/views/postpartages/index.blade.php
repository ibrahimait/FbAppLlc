@extends('layouts.navadmin')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des posts partagés</h2>
                <br>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('postpartages.create') }}"> Ajouter</a>
            </div>
            <br>
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
                <th scope="col">@sortablelink('id_post')</th>
                <th scope="col">ID Groupe</th>
                <th scope="col">@sortablelink('nom')</th>
                <th scope="col">@sortablelink('prenom')</th>
                <th scope="col">@sortablelink('message_personnalise')</th>
                <th scope="col">@sortablelink('statut')</th>
                <th scope="col">@sortablelink('id_utilisateur')</th>
                <th width="150px"></th>
            </tr>
            </thead>
            @if($postpartages->count())
            @foreach ($postpartages as $key => $value)
            <tr>
                <th  scope="row">{{ $value->id_post }}</th>
                <th  scope="row">{{ $value->id_groupe }}</th>
                <td>{{ $value->nom }}</td>
                <td>{{ $value->prenom }}</td>
                <td>{{ $value->message_personnalise }}</td>
                <td>{{ $value->statut }}</td>
                <th  scope="row">{{ $value->id_utilisateur }}</th>
                <td>
                    <form action="{{ route('postpartages.destroy',$value->id_post) }}" method="POST">  
                    <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-info" href="{{ route('postpartages.show',$value->id_post) }}"><i style="color : black" class="fas fa-info"></i></a>    
                        <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-primary" href="{{ route('postpartages.edit',$value->id_post) }}"><i style="color : black"  class="fas fa-edit"></i></a>   
                        @csrf
                        @method('DELETE')      
                        <button  style="background-color : #fafafa ; border : #fafafa"  type="submit" class="btn btn-danger"><i style="color : black"   class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif

        </table>  
    </div>
        {!! $postpartages->links() !!}      
    @endsection