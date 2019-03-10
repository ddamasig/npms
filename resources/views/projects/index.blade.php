@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- TABLE HOVER -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Manage projects</h3>
                </div>
                <div class="panel-body">
                    <!-- Search Bar -->
                    <form method="GET" action="/projects">
                        <div class="input-group">
                            <input name="query" class="form-control" placeholder="Enter projects keywords" type="text">
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
                                    <th>Project Name</th>
                                    <th>Manager</th>
                                    <th>Client</th>
                                    <th>Contact Person</th>
                                    <th>Progress</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>
                                        <a href="/projects/{{ $project->id }}">
                                            {{ $project->name }}
                                        </a>
                                    </td>
                                    <td>{{ $project->manager->full_name }}</td>
                                    <td>{{ $project->client }}</td>
                                    <td>{{ $project->contact->full_name }}</td>
                                    <td>
                                        <drop-down-button name="Actions">
                                            <drop-down-item icon="lnr lnr-pencil" href="/projects/{{ $project->id }}/edit">
                                                Edit
                                            </drop-down-item>
                                            <form method="POST" action="/projects/{{ $project->id }}">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <drop-down-item type="submit" icon="lnr lnr-trash">
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
                    <!-- Pagination -->
                    {{ $projects->links() }}
                </div>
            </div>
            <!-- END TABLE HOVER -->
        </div>
    </div>
</div>
@endsection
