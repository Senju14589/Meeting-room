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
            ->select('addrooms.*', 'users.name')->paginate(10);


        return view('Meeting.index', compact('meeting'));
    }

    public function store(Request $request)
    {
        //ตรวจสอบข้อมูล
        $dataDetail = Addroom::where('nameroom', $request->nameroom)
            ->where('dateroom', $request->dateroom)
            ->where('timeroom', '<=', $request->endtimeroom)
            ->where('endtimeroom', '>=', $request->timeroom)->first();

        if ($dataDetail) {
            return redirect()->route('meeting')->with('error', "ห้องนี้ในวันนี้เวลานี้ มีคนจองแล้วครับ");
        } else {
            $data = array();
            $data["nameroom"] = $request->nameroom;
            $data["dateroom"] = $request->dateroom;
            $data["timeroom"] = $request->timeroom;
            $data["endtimeroom"] = $request->endtimeroom;
            $data["user_id"] = Auth::user()->id;

            DB::table("addrooms")->insert($data);
            return redirect()->route('meeting')->with('success', "บันทึกข้อมูลเรียบร้อย");
        }
    }

    public function edit($id)
    {
        $meeting = Addroom::find($id);
        return view('meeting.edit', compact('meeting'));
    }

    public function update(Request $request, $id)
    {
        $dataDetail = Addroom::where('nameroom', $request->nameroom)
            ->where('dateroom', $request->dateroom)
            ->where('timeroom', '<=', $request->endtimeroom)
            ->where('endtimeroom', '>=', $request->timeroom)->first();
        if ($dataDetail) {
            return redirect()->route('meeting')->with('error', "ห้องนี้ในวันนี้เวลานี้ มีคนจองแล้วครับ");
        } else {
            $update = Addroom::find($id)->update([
                'nameroom' => $request->nameroom,
                'dateroom' => $request->dateroom,
                'timeroom' => $request->timeroom,
                'endtimeroom' => $request->endtimeroom,
                'USer_id' => Auth::user()->id
            ]);
            return redirect()->route('meeting')->with('success', "บันทึกข้อมูลเรียบร้อย");
        }
    }

    public function delete($id)
    {
        $delete = Addroom::find($id)->forcedelete();
        return redirect()->back()->with('success', "ลบข้อมูลถาวรเรียบร้อย");
    }
}