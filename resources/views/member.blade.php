@extends('layouts.app')

@section('content')

<div class="container">
<div class="card-header" align="center">ตารางข้อมูลสมาชิก</div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">รหัส</th>
        <th scope="col">ชื่อสมาชิก</th>
        <th scope="col">อีเมล</th>
        <th scope="col">สถานะ</th>
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