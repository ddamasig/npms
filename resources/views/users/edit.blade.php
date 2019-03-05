@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Edit Account Panel -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Account Information</h3>
                    <p class="panel-subtitle">All fields are required</p>
                </div>
                <div class="panel-body">
                    <form method="POST" action="/user/{{ $user->id }}/account">
                        @csrf
                        {{ method_field('PATCH') }}

                        {{--Username field--}}
                        <div class="form-group row">
                            <label for="username" class="col-md-2 col-form-label text-md-right">Username</label>

                            <div class="col-md-10">
                                <input id="username" value="{{ $user->username }}" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                    name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('username') }}</small>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--Password field--}}
                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" placeholder="Password is hidden" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password">

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('password') }}</small>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--Confirm Password field--}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-10">
                                <input id="password-confirm" placeholder="Confirm new password" type="password" class="form-control"
                                    name="password_confirmation">
                            </div>
                        </div>

                        {{--Confirm Button for Account--}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Apply Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Edit Account Panel -->

            <!-- Edit User Information Panel -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">User Information</h3>
                    <p class="panel-subtitle">All fields are required</p>
                </div>
                <div class="panel-body">
                    <form method="POST" action="/user/{{ $user->id }}">
                        @csrf
                        {{ method_field('PATCH') }}

                        {{--First Name field--}}
                        <div class="form-group row">
                            <label for="first_name" class="col-md-2 col-form-label text-md-right">First Name</label>

                            <div class="col-md-10">
                                <input id="first_name" value="{{ $user->first_name }}" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                    name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('first_name') }}</small>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--Middle Name field--}}
                        <div class="form-group row">
                            <label for="middle_name" class="col-md-2 col-form-label text-md-right">Middle Name</label>

                            <div class="col-md-10">
                                <input id="middle_name" value="{{ $user->middle_name }}" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}"
                                    name="middle_name" value="{{ old('middle_name') }}" required autofocus>

                                @if ($errors->has('middle_name'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('middle_name') }}</small>
                                </span>
                                @endif
                            </div>
                        </div>


                        {{--Last Name field--}}
                        <div class="form-group row">
                            <label for="last_name" class="col-md-2 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-10">
                                <input id="last_name" value="{{ $user->last_name }}" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                    name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('last_name') }}</small>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--Email field--}}
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-10">
                                <input id="email" value="{{ $user->email }}" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('email') }}</small>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Apply Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of User Information Panel -->

            <!-- Edit User Privilege Panel -->
            <privilege-panel 
                :user="{{ json_encode($user) }}"
                :privilege-groups="{{ $privilegeGroups }}"
                >
            </privilege-panel>
            <!-- End of User Privilege Panel -->
        </div>
    </div>
</div>
@endsection
