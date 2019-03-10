@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Crea Project Panel -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Create New Project</h3>
                    <p class="panel-subtitle">All fields are required</p>
                </div>
                <div class="panel-body">
                    <form method="POST" action="/projects">
                        @csrf
                        {{ method_field('POST') }}

                        {{--Project Name field--}}
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Project Name</label>
                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('name') }}</small>
                                </span>
                                @endif
                            </div>
                            <label for="client" class="col-md-2 col-form-label text-md-right">Client</label>
                            <div class="col-md-4">
                                <input id="client" type="text" class="form-control{{ $errors->has('client') ? ' is-invalid' : '' }}"
                                    name="client" value="{{ old('client') }}" required autofocus>

                                @if ($errors->has('client'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('client') }}</small>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="manager_id" class="col-md-2 col-form-label text-md-right">Manager</label>
                            <div class="col-md-4">
                                <select-search url="/api/users" name="manager_id" text-key="full_name" value-key="id"></select-search>

                                @if ($errors->has('manager_id'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('manager_id') }}</small>
                                </span>
                                @endif
                            </div>
                            <label for="contact_id" class="col-md-2 col-form-label text-md-right">Contact Person</label>
                            <div class="col-md-4">
                                <select-search url="/api/users" name="contact_id" text-key="full_name" value-key="id"></select-search>

                                @if ($errors->has('contact_id'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('contact_id') }}</small>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>
                            <div class="col-md-10">
                                <textarea rows="8" id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    name="description" value="{{ old('description') }}" required autofocus>
                                </textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <small class="text-danger mt-1">{{ $errors->first('description') }}</small>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Edit Account Panel -->
        </div>
    </div>
</div>
@endsection
