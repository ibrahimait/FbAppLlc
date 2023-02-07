@extends('layouts.navadmin')
 
 @section('content')
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Liste des posts de groupes</h2> 
                 <br>
             </div>
             <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('postgroupes.create') }}"> Ajouter</a>
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
                 <th scope="col">ID</th>
                 <th scope="col">ID Compagne</th>
                 <th scope="col">Lien</th>
                 <th scope="col">Statut Scrappe</th>
                 <th scope="col">Titre</th>
                 <th scope="col">Type de Média</th>
                 <th scope="col">Légende</th>
                 <th scope="col">Hashtag</th>
                 <th width="150px"></th>
             </tr>
             </thead>
             @foreach ($data as $key => $value)
             <tr>
                 <th  scope="row">{{ $value->id_post }}</th> 
                 <th  scope="row">{{ $value->id_campagne }}</th>
                 <td  style="color : blue"><a href="{{ $value->lien }}">URL</a></td>
                 <td>{{ $value->stascra }}</td>
                 <td>{{ $value->titre }}</td>
                 <td>{{ $value->typemedia }}</td>
                 <td>{{ $value->legende }}</td>
                 <td>{{ $value->hashtag }}</td>
                 <td>
                     <form action="{{ route('postgroupes.destroy',$value->id_post) }}" method="POST">  
                     <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-info" href="{{ route('postgroupes.show',$value->id_post) }}"><i style="color : black" class="fas fa-info"></i></a>    
                         <a style="background-color : #fafafa ; border : #fafafa" class="btn btn-primary" href="{{ route('postgroupes.edit',$value->id_post) }}"><i style="color : black"  class="fas fa-edit"></i></a>   
                         @csrf
                         @method('DELETE')      
                         <button  style="background-color : #fafafa ; border : #fafafa"  type="submit" class="btn btn-danger"><i style="color : black"   class="fas fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach
         </table>  
     </div>
         {!! $data->links() !!}      
     @endsection