@extends('layouts.app')

@section('content')
<div class="container">
  <h2 align="center">ข้อมูลสมาชิก</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
        <th scope="col">E-MAIL</th>
        <th scope="col">is_admin</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $row)
      <tr>
        <th>{{$row->id}}</th>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->is_admin}}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

@endsection