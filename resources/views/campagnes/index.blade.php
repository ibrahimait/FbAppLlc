@extends('layouts.navadmin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des campagnes</h2>
            </div>

<!-- Recherche multicritère -->
<section class="search-sec" style="margin : 20px ; font-size : 13px">
    <div class="container">
        <h6>Recherche multicritère</h6>
        <form action="/multisearch_camp" method="get" novalidate="novalidate">
        <div class="row">
                <div class="col-lg-50">
                    <div class="row">
                        <div class="">
                            <input class="form-control" type="text" name="multisearchnom" id="nom" placeholder="Nom">
                        </div>
                        <div class="">
                                        <select data-trigger="" name="multisearchetat" class="form-control" >
                                            <option disabled selected>Etat </option>
                                            <option>Idée</option>
                                            <option>Planifiée</option>
                                            <option>En cours</option>
                                            <option>Archivée</option>
                                            <option>Terminée</option>
                                        </select>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-success wrn-btn" style="margin-left : 5px">Search</button>
                            <button type="button" class="btn btn-danger wrn-btn"><a href="{{ route('campagnes.index') }}">Reset</a></button>
                        </div>

                    </div>
                </div>

            </div>
            <div  style="margin-top : 20px">
                        <label for="nm" style="font-size : 14px; font-weight : 500">Nombre de Lignes</label>
                        <select data-trigger="" name="nm" style="width : 50px"  onchange="this.form.submit();">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                            <option>250</option>
                        </select>
                </div>
        </form>
    </div>
</section>
<!-- Recherche Multicritères FIN -->
        </div>
    </div>
   <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table">

    <form method="post">
        @csrf
        @method('DELETE')
        <br>
        <button type="submit" formaction="/deleteall_c" class="btn btn-danger" style="margin-bottom : 14px"  onclick="return confirm('Are you sure you want to delete ?')"><i class="fas fa-trash" style="margin-right : 10px"></i><i class="fas fa-arrow-down"></i></button>
        <a class="btn btn-info" href="{{ route('campagnes.create') }}"  style="margin-bottom : 14px "> Ajouter</a>
        <br>
        {{-- <p> Il y'a :         {!! $campagnes->total() !!}  Campagnes</p> --}}

        <table class="table">
            <thead class="thead" style="background:#c1f0f0">
            <tr>
                <th scope="col"><input type="checkbox" class="selectall"></th>
                <th>N°</th>
                <th>ID campagne</th>
                <th>@sortablelink('nom')</th>
                <th>@sortablelink('score')</th>
                <th>@sortablelink('etat')</th>
                <th>@sortablelink('date_debut')</th>
                <th>@sortablelink('date_fin')</th>
                <th>@sortablelink('contexte')</th>
                <th>Action</th>
            </tr>
            </thead>
            @if($campagnes->count())
            @foreach ($campagnes as $key => $value)
            <tr>
                <th scope="row"><input type="checkbox" name="ids[]" class="selectbox" value="{{ $value->id_campagne }}"></th>
                <?php
                $i=0
                ?>
                <td  scope="row">{{ ++$i }}</td>
                <td  scope="row">{{ $value->id_campagne }}</td>
                <td>{{ $value->nom }}</td>
                <td>{{ $value->score }}</td>
                <td>
                @if($value->etat == 'Idée')
                <span style="background :  #ffff80 ; font-weight : 500 ; padding : 3px ; border-radius : 6px ">Idée</span>
                @elseif($value->etat == 'Terminée')
                <span style="background : #99ff99 ; font-weight : 500 ; padding : 3px ; border-radius : 6px ">Terminée</span>
                @elseif($value->etat == 'Planifiée')
                <span style="background : #80bfff ; font-weight : 500 ; padding : 3px ; border-radius : 6px ">Planifiée</span>
                @elseif($value->etat == 'En cours')
                <span style="background : #bb99ff ; font-weight : 500 ; padding : 3px ; border-radius : 6px ">En cours</span>
                @elseif($value->etat == 'Archivée')
                <span style="background : #ffcccc ; font-weight : 500 ; padding : 3px ; border-radius : 6px ">Archivée</span>
                @endif
                </td>
                <td>{{ $value->date_debut }}</td>
                <td>{{ $value->date_fin }}</td>
                <td>{{ \Str::limit($value->contenu_post_mere, 60) }}</td>
                <td>
                        <a style="background-color : #fff ; border : #fff" class="btn btn-info" href="{{ route('groupecampagnes.index',$value->id_campagne) }}"><i style="color : #4d94ff" class="fas fa-eye"></i></a>
                        <a style="background-color : #fff ; border : #fff" class="btn btn-primary" href="{{ route('campagnes.edit',$value->id_campagne) }}"><i style="color : #e6ac00"  class="fas fa-edit"></i></a>
                        <button formaction="{{ route('campagnes.destroy',$value->id_campagne) }}"  style="background-color : #fff ; border : #fff"  type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')"><i style="color : #cc3300"   class="fas fa-trash"></i></button>
                        <a style="background-color : #fff ; border : #fff" class="btn btn-info" id="road" href="{{ route('campagnes.show',$value->id_campagne) }}"><i style="color : #4d94ff" class="fas fa-info"></i></a>

                    </td>
            </tr>
            @endforeach
            @endif
        </table>
    </form>
    </div>
        {!! $campagnes->links() !!}

        <script type="text/javascript">
        $('.selectall').click(function(){
            $('.selectbox').prop('checked',$(this).prop('checked'));
            $('.selectall2').prop('checked',$(this).prop('checked'));
        })
        $('.selectall2').click(function(){
            $('.selectbox').prop('checked',$(this).prop('checked'));
            $('.selectall').prop('checked',$(this).prop('checked'));
        })
        $('.selectbox').change(function(){
            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if(total == number){
                $('.selectall').prop('checked',true);
                $('.selectall2').prop('checked',true);
            } else {
                $('.selectall').prop('checked',false);
                $('.selectall2').prop('checked',false);

            }
        })

    </script>

    @endsection

