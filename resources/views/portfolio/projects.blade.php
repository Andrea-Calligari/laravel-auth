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
  @foreach($projects as $proj)
  <tbody>
    <tr>
    <th scope="row">{{$proj->project_name}}</th>
    <td>{{$proj->description}}</td>
    <td>{{$proj->working_hours}}</td>
    <td>{{$proj->co_workers}}</td>

    </tr>

  </tbody>

  @endforeach
</table>

@endsection