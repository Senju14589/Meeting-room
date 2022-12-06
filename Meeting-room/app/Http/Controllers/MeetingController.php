<?php

namespace App\Http\Controllers;

use App\Models\Addroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function index()
    {

        //เชื่อมตารางแบบ Query Builder แบบ 1:1

        $meeting = DB::table('addrooms')
            ->join('users', 'addrooms.user_id', 'users.id')->where('user_id', Auth::user()->id)
            ->select('addrooms.*', 'users.name')->paginate(5);


        return view('Meeting.index', compact('meeting'));
    }

    public function store(Request $request)
    {
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'nameroom' => 'required',
                'dateroom' => 'required',
                'timeroom' => 'required'
            ],
            [
                'nameroom.required' => "กรุณาระบุห้องที่ต้องการจองด้วยครับ",
                'dateroom.required' => "กรุณาระบุวันที่ต้องการจองด้วยครับ",
                'timeroom.required' => "กรุณาระบุเวลาที่ต้องการจองด้วยครับ"
            ]
        );

        //บันทึกข้อมูลแบบ Query Builder
        $data = array();
        $data["nameroom"] = $request->nameroom;
        $data["dateroom"] = $request->dateroom;
        $data["timeroom"] = $request->timeroom;
        $data["user_id"] = Auth::user()->id;
        //Query Builder
        DB::table('addrooms')->insert($data);

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");
    }

    public function edit($id)
    {
        $meeting = Addroom::find($id);
        return view('meeting.edit', compact('meeting'));
    }
}