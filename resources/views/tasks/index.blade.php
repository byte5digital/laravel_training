@extends('layouts.app')
@section('content')
    <?php /* @var \App\Task[] $tasks */ ?>
    @foreach ($tasks as $task)
        <p>{{$task->name}}</p>
        @if ($task->user instanceof \App\User)
        <p style="padding-left: 20px">{{$task->user->name}}</p>
        @endif
    @endforeach
@endsection