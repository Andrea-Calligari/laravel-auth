@extends('layouts.app')

@section('content')

<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Working-hours</th>
      <th scope="col">Co-workers</th>
    </tr>
  </thead>
  @foreach($projects as $project)
  <tbody>
    <tr>
    <th scope="row"> <a href="{{route('admin.portfolios.show',$project)}}">{{$project->project_name}}</a></th>
    <td>{{$project->description}}</td>
    <td>{{$project->working_hours}}</td>
    <td>{{$project->co_workers}}</td>

    </tr>

  </tbody>

  @endforeach
</table>

@endsection