@extends('layouts.navadmin')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
    <h2 style="margin-bottom:30px">Edit Team</h2>
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4xj0iSqUrByq6k1TGf6Z8AoRg1tGXUujma2RKRTpBkWzEGXRdn1RvvSgKOJGPvDIQgJc&usqp=CAU" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h6 >Nom  : {{ $user->name }}</h6>
            						<p class="text-muted font-size-sm">ID  : {{ $user->id }}</p>
									<a href="{{ route('users.show',$user->id) }}"><button class="btn btn-outline-primary">More info</button></a>
								</div>
							</div>
							<hr class="my-4">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Email : </h6>
									<span class="text-secondary">{{ $user->email }}</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Type :</h6>
									<span class="text-secondary">{{ $user->role }}</span>
								</li>


							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-8">
                <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">ID team</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" name="id" value="{{ $user->id }}" class="form-control" placeholder="Enter full name">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0" style="  color:red; font-style: italic;">Nom*(obligatoire)</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter full name">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0" style="  color:red; font-style: italic;">Email*(obligatoire)</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Enter email-adress">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0" style="  color:red; font-style: italic; ">Mot de passe*(obligatoire)</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="password" name="password" value="{{ $user->password }}" class="form-control" placeholder="Enter password">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0" style="  color:red; font-style: italic; ">Confirmation*(obligatoire)</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="password" name="remember_token" value="{{ $user->remember_token }}" class="form-control" placeholder="Enter password">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Type</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <select  class="form-control"value="{{ $user->role }}" name="role">
                                        <option value="">--Choose a role--</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Dev">Dev</option>
                                            <option value="UxDesign">UxDesign</option>
                                </select>
                                </div>
							</div>



							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-success" value="Save Changes">
                                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
								</div>
							</div>
						</div>
					</div>

				</div>

            </div>
		</div>
	</div>
    </form>

    <style>
        body{
    background: #f7f7ff;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}

    </style>
@endsection
