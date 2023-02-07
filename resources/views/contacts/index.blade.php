@extends('layouts.navadmin')

@section('content')
    <div class="row">
        <div class="col-lg-12" style="margin-bottom : 30px">
            <div class="pull-left">
                <h2>Liste des contacts</h2>
            </div>
            <!-- Recherche multicritère -->
            <section class="search-sec" style="margin : 20px ; font-size : 13px">
                <div class="container" style="margin-left : 0">
                    <h6>Recherche multicritère</h6>
                    <form action="/multisearch" method="get" novalidate="novalidate">
                        <div class="row">
                            <div class="col-lg-40">
                                <div class="row">

                                    <div class="col-lg-2 col-md-2 col-sm-30 p-0">
                                        <input class="form-control" type="text" name="multisearchnom" id="nom"
                                            placeholder="Nom">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-30 p-0">
                                        <input class="form-control" type="text" name="multisearchmail" id="mail"
                                            placeholder="Mail">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-30 p-0">
                                        <input class="form-control" type="text" name="multisearchtel" id="tel"
                                            placeholder="Tel">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-30 p-0">
                                        <select data-trigger="" name="multisearchstat" class="form-control">
                                            <option disabled selected>Statut </option>
                                            <option>Nouveau client</option>
                                            <option>Hors cible</option>
                                            <option>demandée</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-2 col-sm-30 p-0">
                                        <button type="submit" class="btn btn-success wrn-btn"
                                            style="margin-left : 5px">Search</button>
                                        <button type="button" class="btn btn-danger wrn-btn"><a
                                                href="{{ route('contacts.index') }}">Reset</a></button>
                                    </div>

                                </div>
                            </div>
                            <div style="margin-top : 20px">
                                <label for="perPage" style="font-size : 14px; font-weight : 500">Nombre de Lignes</label>
                                <select data-trigger="" name="perPage" id="perPage" style="width : 50px" onchange="this.form.submit();">
                                    {{--  <option>{{$clients->perPage()}} </option>  --}}
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                    <option>250</option>
                                </select>
                            </div>

                        </div>
                    </form>
                </div>
            </section>
            <!-- Recherche Multicritères FIN -->

            <!-- Filtres groupes -->

            
            <!-- Filtres FIN -->

        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table">

        <form method="post">
            @csrf
            @method('DELETE')
            <button type="submit" formaction="/deleteall_g" class="btn btn-danger" style="margin-bottom : 14px"
                onclick="return confirm('Are you sure you want to delete ?')"><i class="fas fa-trash"
                    style="margin-right : 40px"></i><i class="fas fa-arrow-down"></i></button>
            <a class="btn btn-success" href="{{ route('contacts.create') }}" style="margin-bottom : 14px "> Ajouter</a>
            <br>
            

            <table class="table">
                <thead class="thead" style="background:#cccccc">
                    <tr>
                        <th scope="col"><input type="checkbox" class="selectall"></th>
                        <th>N°</th>
                        <th>ID</th>
                        <th>@sortablelink('nom')</th>
                        <th>@sortablelink('prenom')</th>
                        <th>@sortablelink('tel')</th>
                        <th>@sortablelink('email')</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                    @foreach ($contacts as $key => $value)
                        <tr>
                            <th scope="row"><input type="checkbox" name="ids[]" class="selectbox"
                                    value="{{ $value->id_contact }}"></th>
                            <td>{{ $loop->index + 1 }}</td>
             <td> <a href="{{ \Str::limit($value->id_contact)}}"target="_blank">{{ $value->id_contact }}</a></td>
                            <td>{{ \Str::limit($value->nom, 45) }}</td>
                            <td>
                                {{ \Str::limit($value->prenom, 45) }}
                            </td>
                            <td>{{ $value->tel }}</td>
                            <td>{{ $value->email }}</td>
                            <td>
                                <a style="background-color : #fff ; border : #fff" class="btn btn-info"
                                    href="{{ route('contacts.show', $value->id_contact) }}"><i style="color : #4d94ff"
                                        class="fas fa-eye"></i></a>
                                <a style="background-color : #fff ; border : #fff" class="btn btn-primary"
                                    href="{{ route('contacts.edit', $value->id_contact) }}"><i style="color : #e6ac00"
                                        class="fas fa-edit"></i></a>
                                <button formaction="{{ route('contacts.destroy', $value->id_contact) }}"
                                    style="background-color : #fff ; border : #fff" type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete ?')"><i
                                        style="color : #cc3300" class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                
            </table>


        </form>

    </div>

    
@endsection