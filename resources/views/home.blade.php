@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard - Submit details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('err'))
                <div class="alert alert-danger">
                    {{ session()->get('err') }}
                </div>
                @endif

                <form method="POST" action="{{ route('user-details', ['user_id'=> Auth::user()->user_id ]) }}" enctype="multipart/form-data" aria-label="{{ __('Register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" name="name" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" value="{{ $user->phone }}" class="form-control @error('phone') is-invalid @enderror" name="phone" required>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Dob') }}</label>

                        <div class="col-md-6">
                            <input id="dob" type="date" value="{{ $user->dob }}" class="form-control @error('dob') is-invalid @enderror" name="dob" required>

                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                        <div class="col-md-6">
                            <label class="radio-inline"><input type="radio" name="gender" value="Male" {{ $user->gender == 'Male' ? 'checked' : '' }}  required>Male</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="Female" {{ $user->gender == 'Female' ? 'checked' : '' }} >Female</label>
                        </div>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="qualification" class="col-md-4 col-form-label text-md-right">{{ __('Qualification') }}</label>
                        <div class="col-md-6">
                            <select class="form-control" id="qualification" name="qualification" required>
                                <option value="BTech" {{ $user->qualification == 'BTech' ? 'selected' : '' }} >B.Tech</option>
                                <option value="MTech" {{ $user->qualification == 'MTech' ? 'selected' : '' }} >M.Tech</option>
                                <option value="Bsc" {{ $user->qualification == 'Bsc' ? 'selected' : '' }} >B.Sc</option>
                                <option value="others" {{ $user->qualification == 'others' ? 'selected' : '' }} >Others</option>
                            </select>
                            @error('qualification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="languages" class="col-md-4 col-form-label text-md-right">{{ __('Languages') }}</label>
                        <div class="col-md-6">

                            <label class="checkbox-inline"><input type="checkbox" value="English" name="languages[]" @if($user->languages != null) @if(in_array("English", $user->languages)) {{ "checked" }} @endif @endif>English</label>
                            <label class="checkbox-inline"><input type="checkbox" value="Telugu" name="languages[]" @if($user->languages != null) @if(in_array("Telugu", $user->languages)) {{ "checked" }} @endif @endif>Telugu</label>
                            <label class="checkbox-inline"><input type="checkbox" value="Tamil" name="languages[]" @if($user->languages != null) @if(in_array("Tamil", $user->languages)) {{ "checked" }} @endif @endif>Tamil</label>
                            <label class="checkbox-inline"><input type="checkbox" value="Malayalam" name="languages[]" @if($user->languages != null) @if(in_array("Malayalam", $user->languages)) {{ "checked" }} @endif @endif>Malayalam</label>
                        </div>
                        @error('languages')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-6">
                            <textarea class="form-control" rows="1" id="address" name="address">{{ $user->address }}</textarea>
                        </div>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="photo" name="photo" required>
                        </div>
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-5">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection