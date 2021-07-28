@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header" align="center">แบบฟอร์มแก้ไข</div>
                <div class="card-body">
                    <form action="{{url('/type/update/'.$types ->id)}}" method="post">
                        @csrf
                        <center><label for="name">ชื่อประเภทสถานที่ท่องเที่ยว</label></center>
                        <input type="text" class="form-control" name="name" value="{{$types->name}}">
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