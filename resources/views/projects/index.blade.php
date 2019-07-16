@extends('layouts.app')
@section('meta_tags')
@endsection
@section('content')
    <?php /* @var \App\Project[] $projects */ ?>
    @foreach ($projects as $project)
        <p><a href="{{route('project.index.id', $project->id)}}">{{$project->name}}</a></p>
    @endforeach
@endsection