@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (session("success"))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="card">
                <div class="card-header" align="center">ตารางข้อมูลประเภทสถานที่ท่องเที่ยว</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">รหัส</th>
                            <th scope="col">ชื่อประเภทสถานที่ท่องเที่ยว</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $row)
                        <tr>
                            <th>{{$row->id}}</th>
                            <td>{{$row->name}}</td>
                            <td>
                                <a href="{{url('/type/edit/'.$row->id)}}" class="btn btn-success">แก้ไข</a>
                            </td>
                            <td>
                            <a href="{{url('/type/delete/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูล {{$row->name}} หรือไม่?')">ลบ</a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>



        <div class="col-md-4">
            <div class="card">
                <div class="card-header" align="center">เพิ่มประเภทสถานที่ท่องเที่ยว</div>
                <div class="card-body">
                    <form action="{{route('addType')}}" method="post">
                        @csrf
                        <center><label for="name">ชื่อประเภทสถานที่ท่องเที่ยว</label></center>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        <center><input type="submit" value="บันทึก" class="btn btn-primary"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection