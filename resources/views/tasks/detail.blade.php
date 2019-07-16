@extends('layouts.app')
@section('content')
    <?php /* @var \App\Task $task */ ?>

    <form method="post" action="{{route('task.store')}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id" value="{{$task->id}}"/>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$task->name}}"/>
        </div>
        <div class="form-group">
            <label for="description">Beschreibung</label>
            <textarea class="form-control" name="description" id="description">{{$task->description}}</textarea>
        </div>
        <button class="btn btn-success" type="submit">Speichern</button>
    </form>
    @if ($errors->any())
        <div id="errors">
            @foreach($errors as $error)
                <p style="color:red">{{$error}}</p>
            @endforeach
        </div>
    @endif
@endsection