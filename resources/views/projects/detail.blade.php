@extends('layouts.app')

@section('meta_tags')
    <title>{{$project->name}}</title>
@endsection
@section('content')
    <?php /* @var \App\Project $project */ ?>
    <div class="row pb-5">
        <div class="col-6">
            <a class="btn btn-info" href="{{route('project.index')}}">Zurück</a>
            <a class="btn btn-danger" onclick="$('#del_entity').submit();">Löschen</a>
            <form id="del_entity" action="{{route('project.destroy.id', $project->id)}}" method="POST">
                @method('delete')
                @csrf
            </form>
        </div>
    </div>
    <h3>{{$project->name}}</h3>
    <hr/>
    <h5>Neuer Task</h5>
    <form method="POST" action="{{route('task.store')}}">
        @csrf
        <input type="hidden" name="project_id" value="{{$project->id}}" />
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name"/>
        </div>
        <div class="form-group">
            <label for="description">Beschreibung</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <button class="btn btn-success" type="submit">Speichern</button>
    </form>
    <hr/>

    @foreach($project->tasks as $task)
        <p><a href="{{route('task.index.id', $task->id)}}" >{{$task->name}}</a></p>
    @endforeach
@endsection