@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<?php
$sql = "SELECT * FROM types";
$con = mysqli_connect("localhost", "root", "", "project-admin");
$query = mysqli_query($con, $sql);
?>

<?php
$sql = "SELECT * FROM events";
$query1 = mysqli_query($con, $sql)
?>

<?php
$sql =  "SELECT * FROM provinces";
$query_province = mysqli_query($con, $sql)
?>




<?php
$sql =  "SELECT * FROM amphures WHERE province_id = 73";
$query_amphures = mysqli_query($con, $sql)
?>

<?php
$sql =  "SELECT * FROM districts where zip_code=93110";
$query_districts = mysqli_query($con, $sql)
?>





<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session("success"))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="card">
                <div class="card-header" align="center">แบบฟอร์มเพิ่มข้อมูลสถานที่ท่องเที่ยว</div>
                <div class="card-body">
                    <form action="{{route('addPlace')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="place_name">ชื่อสถานที่</label>
                        <input type="text" class="form-control" name="place_name">
                        @error('place_name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="name">ประเภท</label><br>
                        <div class="row>">
                            <!-- <input type="checkbox" class="name" name="name"> -->
                            @php($i=1)

                            <?php foreach ($query as $value) { ?>

                                <div class="form-check">
                                    <label class="form-check-label" for="name">

                                        <input class="form-check-input" type="checkbox" value="name" id="name" name="name">

                                        <option value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                    </label>

                                </div>

                            <?php }
                            ?>

                            <script type="text/javascript">
                                $('#name').change(function() {
                                    var name = $(this).val();
                                    console.log(name);

                                });
                            </script>



                        </div>
                        @error('name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror


                        <br>



                        <label for="event_name">เทศกาล/วันสำคัญ</label><br>
                        <div class="row>">
                            <!-- <input type="checkbox" class="" name="event_name"> -->
                            <?php foreach ($query1 as $value) { ?>

                                <div class="form-check">
                                    <label class="form-check-label" for="event_name">

                                        <input class="form-check-input" type="checkbox" value="event_name" id="event_name">


                                        <option value="<?= $value['event_name'] ?>"><?= $value['event_name'] ?></option>
                                    </label>
                                </div>

                            <?php } ?>

                            <script type="text/javascript">
                                $('#event_name').change(function() {
                                    var event_name = $(this).val();
                                    console.log(event_name);

                                });
                            </script>
                        </div>

                        @error('event_name')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <label for="des_place">รายละเอียดสถานที่</label>
                        <input type="text" class="form-control" name="des_place">
                        @error('des_place')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>

                        <div class="row>">


                            <label for="time">เวลาเปิด</label>
                            <input type="time" class="form-control timepicker" name="time">
                            @error('time')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>

                            <label for="time2">เวลาปิด</label>
                            <input type="time" class="form-control timepicker" name="time2">
                            @error('time')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>

                        </div>
                        <br>





                        <label for="tel">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" placeholder="000-000-0000" maxlength="10" name="tel">
                        @error('tel')
                        <span class="text-danger py-2">{{$message}}</span><br>
                        @enderror
                        <br>




                        <div class="form-group">
                            <label for="provinces">จังหวัด</label>
                            <select class="form-control" name="provinces" id="provinces">
                                <option value="province" selected disabled>กรุณาเลือกข้อมูลจังหวัด</option>

                                <?php foreach ($query_province as $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name_th'] ?></option>
                                <?php } ?>

                            </select>
                            <br>
                            {{csrf_field()}}


                            <script type="text/javascript">
                                $('#provinces').change(function() {
                                    var provinces = $(this).val();
                                    var _token=$('input[name="_token"]').val();
                                    
                                    $.ajax({
                                        url: "{{route('dropdown.fetch')}}",
                                        method:"POST",
                                        date:{provinces:provinces,_token:_token},
                                        success:function(result){

                                        }
                                    })

                                });
                            </script>


                            @error('provinces')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>



                            <label for="amphures">อำเภอ</label>
                            <select class="form-control" name="amphures" id="amphures">
                                <option value="amphures" selected disabled>กรุณาเลือกข้อมูลอำเภอ</option>

                                <?php foreach ($query_amphures as $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name_th'] ?></option>
                                <?php } ?>
                            </select>

                            <script type="text/javascript">
                                $('#amphures').change(function() {
                                    var amphures = $(this).val();
                                    console.log(amphures);
                                });
                            </script>

                            @error('amphures')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>



                            <label for="districts">ตำบล</label>
                            <select class="form-control" name="districts" id="districts">
                                <option value="districts" selected disabled>กรุณาเลือกข้อมูลตำบล</option>
                                <?php foreach ($query_districts as $value) { ?>
                                    <option value="<?= $value['name_th'] ?>"><?= $value['name_th'] ?></option>
                                <?php } ?>


                            </select>
                            <script type="text/javascript">
                                $('#districts').change(function() {
                                    var districts = $(this).val();
                                    console.log(districts);
                                });
                            </script>


                            @error('districts')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>



                            <div class="form-group">
                                <label for="lat">ละติจูด</label>
                                <input type="text" class="form-control" name="lat">
                            </div>
                            @error('latitude')

                            <span class="text-danger my-2">{{$message}}</span>
                            @enderror

                            <div class="form-group">
                                <label for="lng">ลองติจูด</label>
                                <input type="text" class="form-control" name="lng">
                            </div>
                            @error('longitude')

                            <span class="text-danger my-2">{{$message}}</span>
                            @enderror

                            <br>













                            <label for="place_image">รูปภาพที่ 1</label>
                            <input type="file" class="" name="place_image">
                            @error('place_image')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>

                            <label for="place_image2">รูปภาพที่ 2</label>
                            <input type="file" class="" name="place_image2">
                            @error('$place_image2')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>

                            <label for="place_image3">รูปภาพที่ 3</label>
                            <input type="file" class="" name="place_image3">
                            @error('$place_image3')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>

                            <label for="place_image4">รูปภาพที่ 4</label>
                            <input type="file" class="" name="place_image4">
                            @error('$place_image4')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>

                            <label for="place_image5">รูปภาพที่ 5</label>
                            <input type="file" class="" name="place_image5">
                            @error('$place_image5')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>

                            <label for="place_image6">รูปภาพที่ 6</label>
                            <input type="file" class="" name="place_image6">
                            @error('$place_image6')
                            <span class="text-danger py-2">{{$message}}</span><br>
                            @enderror
                            <br>







                            <center><input type="submit" value="บันทึก" class="btn btn-primary"></center>
                    </form>

                </div>


            </div>

            <br>
        </div>


        <div class="col-md-12">
            @if (session("success"))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="card">
                <div class="card-header" align="center">ตารางข้อมูลสถานที่ท่องเที่ยว</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">รหัส</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">รูปภาพ</th>
                            <th scope="col">ประเภท</th>
                            <th scope="col">เทศกาล</th>
                            <th scope="col">รายละเอียดสถานที่</th>
                            <th scope="col">เวลาเปิด</th>
                            <th scope="col">เบอร์โทร</th>
                            <th scope="col">จังหวัด</th>
                            <th scope="col">อำเภอ</th>
                            <th scope="col">ตำบล</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($places as $row)
                        <tr>
                            <th>{{$row->id}}</th>
                            <td>{{$row->place_name}}</td>
                            <td>
                                <img src="{{asset($row->place_image)}}" alt="" width="70px" height="70px">
                            </td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->event_name}}</td>
                            <td>{{$row->des_place}}</td>
                            <td>{{$row->time}}</td>
                            <td>{{$row->tel}}</td>
                            <td>{{$row->province}}</td>
                            <td>{{$row->district}}</td>
                            <td>{{$row->sub_district}}</td>
                            <td>
                                <a href="{{url('/place/editplace'.$row->id)}}" class="btn btn-success">แก้ไข</a>
                            </td>
                            <td>
                                <a href="{{url('/place/delete/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูล {{$row->place_name}} หรือไม่?')">ลบ</a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
</body>



@endsection