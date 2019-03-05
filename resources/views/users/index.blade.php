@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- TABLE HOVER -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Manage Users</h3>
                </div>
                <div class="panel-body">
                    <!-- Search Bar -->
                    <form method="GET" action="/user">
                        <div class="input-group">
                            <input name="query" class="form-control" placeholder="Enter user keywords" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    <span class="fa fa-search"></span>
                                    Search
                                </button>
                            </span>
                        </div>
                    </form>
                    <br>
                    <div class="">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="/user/{{ $user->id }}">
                                            {{ $user->full_name }}
                                        </a>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <drop-down-button name="Actions">
                                            <drop-down-item icon="lnr lnr-pencil" href="/user/{{ $user->id }}/edit">
                                                Edit
                                            </drop-down-item>
                                            <form method="POST" action="/user/{{ $user->id }}">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <drop-down-item type="button" icon="lnr lnr-trash" href="/user/{{ $user->id }}">
                                                    Delete
                                                </drop-down-item>
                                            </form>
                                        </drop-down-button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
            <!-- END TABLE HOVER -->
        </div>
    </div>
</div>
@endsection
