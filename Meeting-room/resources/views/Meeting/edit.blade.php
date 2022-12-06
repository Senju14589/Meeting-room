<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         สวัสดี : {{Auth::user()->name }}
      </h2>

   </x-slot>

   <div class="py-12">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
            </div>
            <div class="card" style="max-width: 540px;">
               <div class="card-body">
                  <form action="{{url('/meeting/update/'.$meeting->id)}}" method="post">
                     @csrf
                     <div class="form-group">
                        <label for="nameroom">ชื่อห้องที่จอง</label>
                        <div class="input-group mb-3">
                           <span class="input-group-text" id="basic-addon3">{{$meeting->nameroom}}</span>
                           <select class="form-select" name="nameroom">
                              <option selected value="">เลือกห้องประชุมใหม่</option>
                              <option value="ห้องประชุมที่ 1">ห้องประชุมที่ 1</option>
                              <option value="ห้องประชุมที่ 2">ห้องประชุมที่ 2</option>
                              <option value="ห้องประชุมที่ 3">ห้องประชุมที่ 3</option>
                           </select>
                        </div>
                        @error('nameroom')
                        <div class="my-1">
                           <span class="text-danger">{{$message}}</span>
                        </div>
                        @enderror
                        <div class="form-group">
                           <label for="dateroom">วันที่จอง</label>
                           <input type="date" class="form-control" name="dateroom" value="{{$meeting->dateroom}}">
                        </div>
                        <br>
                        @error('dateroom')
                        <div class="my-1">
                           <span class="text-danger">{{$message}}</span>
                        </div>
                        @enderror
                        <div class="form-group">
                           <label for="timeroom">เวลาที่จอง</label>
                           <input type="time" class="form-control" name="timeroom" value="{{$meeting->timeroom}}">
                        </div>
                        @error('timeroom')
                        <div class="my-1">
                           <span class="text-danger">{{$message}}</span>
                        </div>
                        @enderror
                        <br>
                        <input type="submit" value="บันทึก" class="btn btn-success">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

</x-app-layout>