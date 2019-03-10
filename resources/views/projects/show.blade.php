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
                                    <a href="#" data-toggle="modal" data-target="#module-modal" class="lnr lnr-plus-circle"></a>
                                </span>
                            </h3>
                            <div class="list-group" style="border-radius: 0px;">
                                @foreach($project->modules as $module)
                                    <module-list-item :module="{{ json_encode($module) }}">
                                    </module-list-item>
                                @endforeach
                            </div>
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
                                    <div class="tab-pane fade show active" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                                        Tasks Tab Content
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
<div style="width: 60%; margin: auto; margin-top: 5%;" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    id="module-modal" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="panel" abindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="panel-heading">
            <h3 class="panel-title">Create Module</h3>
            <div class="right">
                <button type="button" data-dismiss="modal" aria-label="Close"><i class="lnr lnr-cross"></i></button>
            </div>
        </div>
        <div class="panel-body">
            <module-form action="/modules" method="POST" csrf="{{ csrf_token() }}" project-id="{{ $project->id }}"></module-form>
        </div>
    </div>
</div>
@endsection
