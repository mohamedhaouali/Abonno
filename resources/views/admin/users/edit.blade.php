@extends('home')
@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier<strong>  {{ $user->name }}</strong></div>
                    <div class="card-body">
                     <form action="{{ route('admin.users.update' ,$user) }}" method="POST">
                         @csrf
                         @method('PATCH')

                         <div class="form-group row">
                             <label for="name" class="col-md-6 col-form-label ">{{ __('Nom ') }}</label>

                             <div class="col-md-12">
                                 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                                 @error('name')
                                 <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="email" class="col-md-6 col-form-label ">{{ __('E-Mail Address') }}</label>

                             <div class="col-md-12">
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email" autofocus>

                                 @error('email')
                                 <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                             </div>
                         </div>


                         <div class="form-group row">
                             <label for="password" class="col-md-6 col-form-label ">{{ __('password') }}</label>

                             <div class="col-md-12">

                                 <input type="password" name="password"  class="form-control"/>
                                 @error('password')
                                 <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                             </div>
                         </div>








                     @foreach($roles as $role)
                             <div class="form-group form-check">
                                 <input type="radio" class="form-radio-input" name="roles[]" value="{{ $role->id }}"
                    id="{{ $role->id }}" @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>


                                 <label for="{{ $role->id }}" class="form-check-label" >{{ $role->name }}</label>


                             </div>

                         @endforeach
                         <div class="form-group row">
                             <label for="agence_id">Agence</label>
                             <select class="form-control form-control-lg" id="agence_id" name="agence_id" >
                                 @foreach($agences as $agence)
                                     @if($user->agence && $user->agence->id == $agence->id)
                                         <option selected value="{{$agence->id}}">{{$agence->nom_fr}}</option>
                                     @else
                                         <option value="{{$agence->id}}">{{$agence->nom_fr}}</option>
                                     @endif

                                 @endforeach
                             </select>
                         </div>




                         <button type="submit" class="btn btn-primary">Modifier les informations</button>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
