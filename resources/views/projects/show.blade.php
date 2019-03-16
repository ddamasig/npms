@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $project->name }}</h3>
                    <p class="panel-subtitle">{{ $project->client }} | {{ $project->manager->full_name }} | {{
                        $project->contact->full_name }}</p>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <!-- Module List -->
                        <div class="col-md-3">
                            <h3 class="panel-title" style="padding-bottom: 20px;">
                                <span>Module List</span>
                                <span style="float: right;">
                                    <a href="#" data-toggle="modal" data-target="#module-form-modal" class="lnr lnr-plus-circle"></a>
                                </span>
                            </h3>
                            @if($project->modules->count() > 0)
                            <module-list :project="{{$project}}"></module-list>
                            @endif
                        </div>

                        <!-- Tasks and Comments Tab -->
                        <div class="col-md-9">
                            <h3 class="panel-title" style="padding-bottom: 20px;">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tasks-tab" data-toggle="tab" href="#tasks" role="tab"
                                            aria-controls="tasks" aria-selected="true">Tasks</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab"
                                            aria-controls="comments" aria-selected="false">Comments</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                                        <div class="">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tasks Name</th>
                                                        <th>Developer</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($activeModule)
                                                    @foreach($activeModule->tasks as $task)
                                                    <tr>
                                                        <td>{{ $task->id }}</td>
                                                        <td>
                                                            <a href="/projects/{{ $project->id }}">
                                                                {{ $task->name }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $task->developer->full_name }}</td>
                                                        <td>{{ $task->status }}</td>
                                                        <td>
                                                            <drop-down-button name="Actions" btn-link="false">
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
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                                        Comments Tab Content
                                    </div>
                                </div>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<modal title="Create New Module" id="module-form-modal">
    <module-form modal-id="module-form-modal" default-project-id="{{ $project->id }}"></module-form>
</modal>
@endsection
