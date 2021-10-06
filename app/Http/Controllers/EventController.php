<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function event(){
        $events = Event::all();
        return view('event',\compact('events'));
    }

    public function insert(Request $request){
        $request->validate([
            'event_name' => 'required|unique:events|max:255'
        ],
    [
        'event_name.required'=>"กรุณาป้อนชื่อเทศกาล",
        'event_name.max'=> "กรุณาป้อนชื่อเทศกาลอีกครั้ง",
        'event_name.unique'=> "มีข้อมูลชื่อเทศกาลนี้ในฐานข้อมูลแล้ว"


    ]
);
$event = new Event;
$event->event_name = $request->event_name;
$event->begin_event = $request->begin_event;
$event->end_event = $request->end_event;
$event->save();
return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");


      
    }
    public function edit($id){
        $event = Event::find($id);
        return view('editevent' ,compact('event'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'event_name' => 'required|unique:events|max:255'
        ],
    [
        'event_name.required'=>"กรุณาป้อนชื่อเทศกาล",
        'event_name.max'=> "กรุณาป้อนชื่อเทศกาลอีกครั้ง",
        'event_name.unique'=> "มีข้อมูลชื่อเทศกาลนี้ในฐานข้อมูลแล้ว"


    ]
);
Event::find($id)->update([
    'event_name'=>$request->event_name,
    'begin_event' => $request->begin_event,
    'end_event' => $request->end_event

]);
return redirect()->route('addEvent')->with('success',"แก้ไขข้อมูลเรียบร้อย");

    }
    public function delete($id)
    {
        $delete = Event::find($id)->delete();
        return redirect()->back()->with('success',"ลบข้อมูลเรียบร้อย");

    }
}

