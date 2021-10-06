@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-4">
        <div class="card">
                <div class="card-header" align="center">แบบฟอร์มแก้ไขข้อมูลเทศกาล</div>
                <div class="card-body">
                    <form action="{{url('/event/update'.$event->id)}}" method="post">
                        @csrf
                        <label for="event_name">ชื่อเทศกาล/วันสำคัญ</label>
                        <input type="text" class="form-control" name="event_name" value="{{$event->event_name}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        <label for="begin_event">วันเริ่มต้นเทศกาล</label>
                        <input type="date" class="form-control" name="begin_event" value="{{$event->begin_event}}"><br>

                        <label for="end_event">วันสิ้นสุดเทศกาล</label>
                        <input type="date" class="form-control" name="end_event" value="{{$event->end_event}}"><br>
                        <center><input type="submit" value="อัพเดต" class="btn btn-primary"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
</div>

@endsection