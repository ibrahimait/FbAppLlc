@extends('layouts.navadmin')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des posts mères</h2>
                <br>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('postmeres.create') }}"> Ajouter</a>
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
                <th>N°</th>
                <th scope ="col">@sortablelink('id_post')</th>
                <th>ID Campagne</th>
                <th>Lien</th>
                <th>@sortablelink('statut_scrappe')</th>
                <th>@sortablelink('titre')</th>
                <th>@sortablelink('hashtag')</th>
                <th>@sortablelink('portee')</th>
                <th>@sortablelink('interaction')</th>
                <th></th>
            </tr>
            </thead>
            @if($postmeres->count())
            @foreach ($postmeres as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <th  scope="row">{{ $value->id_post }}</th>
                <th  scope="row">{{ $value->id_campagne }}</th>
                <td  style="color : blue"><a href="<?php $value->url_post ?>">URL</a></td>
                <td>{{ $value->statut_scrappe }}</td>
                <td>{{ $value->titre }}</td>
                <td>{{ $value->hashtag }}</td>
                <td>{{ $value->portee }}</td>
                <td>{{ $value->interaction }}</td>
                <td>
                    <form action="{{ route('postmeres.destroy',$value->id_post) }}" method="POST">  
                    <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-info" href="{{ route('postmeres.show',$value->id_post) }}"><i style="color : black" class="fas fa-info"></i></a>    
                        <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-primary" href="{{ route('postmeres.edit',$value->id_post) }}"><i style="color : black"  class="fas fa-edit"></i></a>   
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
        {!! $postmeres->links() !!}      
    @endsection