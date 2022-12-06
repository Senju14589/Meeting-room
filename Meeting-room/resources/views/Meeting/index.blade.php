<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         สวัสดี : {{Auth::user()->name }}
      </h2>

   </x-slot>

   <div class="py-12">
      <div class="container">
         <div class="row">

            <div class="col">
               <div class="card">
                  @if(session("success"))
                  <div class="alert alert-success">{{session("success")}}</div>
                  @endif
                  <div class="card">
                     <div class="card-header">ตารางข้อมูลการจองห้องประชุม</div>
                     <table class="table table-bordered">
                        <thead class="table-dark">
                           <tr>
                              <th scope="col">ลำดับ</th>
                              <th scope="col">ชื่อห้องที่จอง</th>
                              <th scope="col">วันที่จอง</th>
                              <th scope="col">เวลาที่จอง</th>
                              <th scope="col">คนที่จอง</th>
                              <th scope="col">แก้ไข</th>
                              <th scope="col">ลบ</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php($i=1)
                           @foreach($meeting as $row)
                           <tr>
                              <th>{{$meeting->firstItem()+$loop->index}}</th>
                              <td>{{$row->nameroom}}</td>
                              <td>{{$row->dateroom}}</td>
                              <td>{{$row->timeroom}}</td>
                              <td>{{$row->name}}</td>
                              <td>
                                 <a href="{{url('/meeting/edit/'.$row->id)}}" class="btn btn-warning">แก้ไข</a>
                              </td>
                              <td>
                                 <a href="" class="btn btn-danger">ลบข้อมูล</a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


</x-app-layout>