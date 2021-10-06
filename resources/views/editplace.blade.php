@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session("success"))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="card">
                <div class="card-header" align="center">แบบฟอร์มแก้ไขข้อมูลสถานที่ท่องเที่ยว</div>
                <div class="card-body">
                    <form action="{{url('/place/update'.$place->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="place_name">ชื่อสถานที่</label>
                        <input type="text" class="form-control" name="place_name" value="{{$place->place_name}}">
                        @error('place_name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="name">ประเภท</label>
                        <!-- <select class="form-control" name="name"></select> -->
                        <input type="text" class="form-control" name="name" value="{{$place->name}}">
                        @error('name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>



                        <label for="event_name">เทศกาล/วันสำคัญ</label>
                        <input type="text" class="form-control" name="event_name"  value="{{$place->event_name}}">
                        <!-- <select class="form-control" name="event_name"></select> -->
                        @error('event_name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="des_place">รายละเอียดสถานที่</label>
                        <input type="text" class="form-control" name="des_place"  value="{{$place->des_place}}">
                        @error('des_place')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="time">เวลาเปิด</label>
                        <input type="time" class="form-control" name="time"  value="{{$place->time}}">
                        @error('time')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="tel">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" name="tel"  value="{{$place->tel}}">
                        @error('tel')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="province">จังหวัด</label>
                        <input type="text" class="form-control" name="province"  value="{{$place->province}}">
                        <!-- <select class="form-control" name="province"></select> -->
                        @error('name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="district">อำเภอ</label>
                        <input type="text" class="form-control" name="district"  value="{{$place->district}}">
                        <!-- <select class="form-control" name="district"></select> -->
                        @error('name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="sub_district">ตำบล</label>
                        <input type="text" class="form-control" name="sub_district"  value="{{$place->sub_district}}">
                        <!-- <select class="form-control" name="sub_district"></select> -->
                        @error('name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>










                        <label for="place_image">รูปภาพ</label>

                        <input type="file" class="" name="place_image">

                        <input type="hidden" name="old_image" value="{{$place->place_image}}">
                        <img src="{{asset($place->place_image)}}" alt="">
                        <br>
                        @error('place_image')
                        <br>
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>







                        <center><input type="submit" value="อัพเดต" class="btn btn-primary"></center>
                    </form>
                  
                </div>

              
            </div>
            
@endsection