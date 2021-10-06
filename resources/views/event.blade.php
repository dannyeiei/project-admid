@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (session("success"))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="card">
                <div class="card-header" align="center">ตารางข้อมูลเทศกาล</div>
         
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">รหัส</th>
                            <th scope="col">ชื่อเทศกาล</th>
                            <th scope="col">เริ่มต้นเทศกาล</th>
                            <th scope="col">สิ้นสุดเทศกาล</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($events as $row)
                        <tr>
                            <th>{{$row->id}}</th>
                            <td>{{$row->event_name}}</td>
                            <td>{{$row->begin_event}}</td>
                            <td>{{$row->end_event}}</td>
                            <td>
                                <a href="{{url('/event/editevent'.$row->id)}}" class="btn btn-success">แก้ไข</a>
                            </td>
                            <td>
                            <a href="{{url('/event/delete/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูล {{$row->event_name}} หรือไม่?')">ลบ</a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                
            </div>
        </div>



        <div class="col-md-4">
            <div class="card">
                <div class="card-header" align="center">เพิ่มข้อมูลเทศกาล</div>
                <div class="card-body">
                    <form action="{{route('addEvent')}}" method="post">
                        @csrf
                        <label for="event_name">ชื่อเทศกาล</label>
                        <input type="text" class="form-control" name="event_name">
                        @error('event_name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="begin_event">วันเริ่มต้นเทศกาล</label>
                        <input type="date" class="form-control" name="begin_event"><br>

                        <label for="end_event">วันสิ้นสุดเทศกาล</label>
                        <input type="date" class="form-control" name="end_event"><br>

                        <center><input type="submit" value="บันทึก" class="btn btn-primary"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection