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
                                        <div>
                                            <tasks-table></tasks-table>
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
