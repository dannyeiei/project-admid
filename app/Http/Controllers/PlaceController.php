<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class PlaceController extends Controller
{
    public function place()
    {
        $places = Place::paginate(5);
        
        return view('place', \compact('places'));
    }


    public function edit($id)
    {
        $place = Place::find($id);
        return view('editplace', compact('place'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'place_name' => 'required|max:255',
                'place_image' => 'mimes:jpg,jpeg,png'
            ],
            [
                'place_name.required' => "กรุณาป้อนชื่อสถานที่ท่องเที่ยว",
                'place_name.max' => "กรุณาป้อนชื่อสถานที่ท่องเที่ยวอีกครั้ง"
            ]
        );



        $place_image = $request->file('place_image');
        $place_image2 = $request->file('place_image2');

        if ($place_image) {
            $name_gen = hexdec(uniqid());

            $img_ext = strtolower($place_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;

            $upload_location = 'image/places/';
            $full_path = $upload_location . $img_name;


        
        





            Place::find($id)->update([
                'place_name' => $request->place_name,
                'name' => $request->name,
                'event_name' => $request->event_name,
                'des_place' => $request->des_place,
                'time' => $request->time,
                'tel' => $request->tel,
                'provinces' => $request->province,
                'amphures' => $request->district,
                'district' => $request->sub_district,
                'place_image' => $full_path,
            ]);

            $old_image = $request->old_image;
            unlink($old_image);

            $place_image->move($upload_location, $img_name);
            return redirect()->route('addPlace')->with('success', "แก้ไขข้อมูลเรียบร้อย");
        } else {
            Place::find($id)->update([
                'place_name' => $request->place_name,
                'place_image' => $request->place_image,
                'name' => $request->name,
                'event_name' => $request->event_name,
                'des_name' => $request->des_name,
                'time' => $request->time,
                'time2' => $request->time2,               
                'tel' => $request->tel,
                'province' => $request->province,
                'amphures' => $request->districts,
                'districts' => $request->sub_district,
                'lat' => $request->lat,
                'lng' =>$request->log

            ]);
            return redirect()->route('addPlace')->with('success', "แก้ไขข้อมูลเรียบร้อย");
        }

        
    }

    public function type()
    {
        return $this->hasOne(Event::class, 'id', 'name');
    }


    public function insert(Request $request)
    {
        $request->validate(
            [
                'place_name' => 'required|unique:places|max:255',
                'place_image' => 'required|unique:places',
                'place_image2' => 'required|unique:places',
                'place_image3' => 'required|unique:places',
                'place_image4' => 'required|unique:places',
                'place_image5' => 'required|unique:places',
                'place_image6' => 'required|unique:places',
                'name' => 'required|unique:places|max:255',
                'event_name' => 'required|unique:places',
                'des_place' => 'required|unique:places',
                'tel' => 'required|unique:places',
                'time' => 'required|unique:places',
                'province' => 'required|unique:places',
                'amphures' => 'required|unique:places',
                'districts' => 'required|unique:places'


            ],
            [
                'place_name.required' => "กรุณาป้อนชื่อสถานที่ท่องเที่ยว",
                'place_name.max' => "กรุณาป้อนชื่อสถานที่อีกครั้ง",
                'place_name.unique' => "มีข้อมูลชื่อสถานที่ท่องนี้ในฐานข้อมูลแล้ว",
                'place_image.required' => "กรุณาเพิ่มรูปภาพสถานที่",
                'place_image2.required' => "กรุณาเพิ่มรูปภาพสถานที่",
                'place_image3.required' => "กรุณาเพิ่มรูปภาพสถานที่",
                'place_image4.required' => "กรุณาเพิ่มรูปภาพสถานที่",
                'place_image5.required' => "กรุณาเพิ่มรูปภาพสถานที่",
                'place_image6.required' => "กรุณาเพิ่มรูปภาพสถานที่",
                'name.required' => "กรุณาเลือกประเภทสถานที่ท่องเที่ยว",
                'event_name.required' => "กรุณาเลือกเทศกาลสถานที่ท่องเที่ยว",
                'tel.required' => "กรุณาป้อนข้อมูลการติดต่อสถานที่ท่องเที่ยว",
                'des_place.required' => "กรุณาป้อนรายละเอียดสถานที่ท่องเที่ยว",
                'time.required' => "กรุณาป้อนข้อมูลเวลาเปิดของสถานที่ท่องเที่ยว",
                'time2.required' => "กรุณาป้อนข้อมูลเวลาเปิดของสถานที่ท่องเที่ยว",

                'province.required' => "กรุณาเลือกจังหวัดสถานที่ท่องเที่ยว",
                'amphures.required' => "กรุณาเลือกอำเภอสถานที่ท่องเที่ยว",
                'districts.required' => "กรุณาเลือกตำบลสถานที่ท่องเที่ยว"

            ]
        );
        $place_image = $request->file('place_image');
        $name_gen = hexdec(uniqid());

        $place_image1 = $request->file('place_image1');
        $name_gen = hexdec(uniqid());

        $place_image2 = $request->file('place_image2');
        $name_gen = hexdec(uniqid());

        $place_image3 = $request->file('place_image3');
        $name_gen = hexdec(uniqid());

        $place_image4 = $request->file('place_image4');
        $name_gen = hexdec(uniqid());
        $place_image5 = $request->file('place_image5');
        $name_gen = hexdec(uniqid());
        $place_image6 = $request->file('place_image6');
        $name_gen = hexdec(uniqid());



        $img_ext = strtolower($place_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;

        $img_ext = strtolower($place_image2->getClientOriginalExtension());
        $img_name2 = $name_gen . '.' . $img_ext;

        $img_ext = strtolower($place_image3->getClientOriginalExtension());
        $img_name3 = $name_gen . '.' . $img_ext;

        $img_ext = strtolower($place_image4->getClientOriginalExtension());
        $img_name4 = $name_gen . '.' . $img_ext;

        $img_ext = strtolower($place_image5->getClientOriginalExtension());
        $img_name5 = $name_gen . '.' . $img_ext;

        $img_ext = strtolower($place_image6->getClientOriginalExtension());
        $img_name6 = $name_gen . '.' . $img_ext;

        $upload_location = 'image/places/';
        $full_path = $upload_location . $img_name;

        $upload_location = 'image/places/';
        $full_path = $upload_location . $img_name2;

        $upload_location = 'image/places/';
        $full_path = $upload_location . $img_name3;

        $upload_location = 'image/places/';
        $full_path = $upload_location . $img_name4;

        $upload_location = 'image/places/';
        $full_path = $upload_location . $img_name5;

        $upload_location = 'image/places/';
        $full_path = $upload_location . $img_name6;

        $d = new place();


        $loop = $request->input("name");  
        var_dump($loop[0]);   
        if (count($loop) == 1)  {
            $d->type_name1 = $loop[0];
            $d->type_name2 = "-";
            $d->type_name3 = "-";
            $d->type_name4 = "-";
            $d->type_name5 = "-";
        }
        if (count($loop) == 2)  {            
            $d->type_name1 = $loop[0];
            $d->type_name2 = $loop[1];
            $d->type_name3 = "-";
            $d->type_name4 = "-";
            $d->type_name5 = "-";
        }            
        if (count($loop) == 3)  {            
            $d->type_name1 = $loop[0];
            $d->type_name2 = $loop[1];
            $d->type_name3 = $loop[2];
            $d->type_name4 = "-";
            $d->type_name5 = "-";
        } 
        if (count($loop) == 4)  {            
            $d->type_name1 = $loop[0];
            $d->type_name2 = $loop[1];
            $d->type_name3 = $loop[2];
            $d->type_name4 = $loop[3];
            $d->type_name5 = "-";
        }  
        if (count($loop) == 5)  {            
            $d->type_name1 = $loop[0];
            $d->type_name2 = $loop[1];
            $d->type_name3 = $loop[2];
            $d->type_name4 = $loop[3];
            $d->type_name5 = $loop[4];
        }  

        $loop = $request->input("event_name");  
        var_dump($loop[0]);   
        if (count($loop) == 1)  {
            $d->evnet_name1 = $loop[0];
            $d->event_name2 = "-";
            $d->event_name3 = "-";
            $d->event_name4 = "-";
            $d->event_name5 = "-";
        }
        if (count($loop) == 2)  {            
            $d->event_name1 = $loop[0];
            $d->event_name2 = $loop[1];
            $d->event_name3 = "-";
            $d->event_name4 = "-";
            $d->event_name5 = "-";
        }            
        if (count($loop) == 3)  {            
            $d->event_name1 = $loop[0];
            $d->event_name2 = $loop[1];
            $d->event_name3 = $loop[2];
            $d->event_name4 = "-";
            $d->event_name5 = "-";
        } 
        if (count($loop) == 4)  {            
            $d->event_name1 = $loop[0];
            $d->event_name2 = $loop[1];
            $d->event_name3 = $loop[2];
            $d->event_name4 = $loop[3];
            $d->event_name5 = "-";
        }  
        if (count($loop) == 5)  {            
            $d->event_name1 = $loop[0];
            $d->event_name2 = $loop[1];
            $d->event_name3 = $loop[2];
            $d->event_name4 = $loop[3];
            $d->event_name5 = $loop[4];
        }  





        Place::insert([
            'place_name' => $request->place_name,
            'name' => $request->name,
            'event_name' => $request->event_name,
            'des_place' => $request->des_place,
            'time' => $request->time,
            'time2' => $request->time2,
            'tel' => $request->tel,


            'provinces' => $request->province,


            'amphures' => $request->districts,
            'districts' => $request->sub_district,
            'place_image' => $full_path,
            'place_image2' => $full_path,
            'place_image3' => $full_path,
            'place_image4' => $full_path,
            'place_image5' => $full_path,
            'place_image6' => $full_path,
            'lat' => $request->lat,
            'lng' =>$request->log,


            'created_at' => Carbon::now()
        ]);

        $place_image->move($upload_location, $img_name);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

        $place_image2->move($upload_location, $img_name2);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

        $place_image3->move($upload_location, $img_name3);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

        $place_image4->move($upload_location, $img_name4);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

        $place_image5->move($upload_location, $img_name5);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");

        $place_image6->move($upload_location, $img_name6);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");
    }
    
    public function delete($id)
    {
        $img = Place::find($id)->place_image;
        unlink($img);

        $delete = Place::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }

    public function add()
    {
        $datatype=type::orderBy('name')->get();      
        return view('place.add', compact('datatype'));  
    }

    public function fetch(Request $request){
        echo $request->get('provinces');
    }
}
