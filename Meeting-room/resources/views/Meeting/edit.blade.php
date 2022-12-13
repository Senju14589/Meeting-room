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
                           <select class="form-select" name="nameroom">
                              <option selected value="{{$meeting->nameroom}}">{{$meeting->nameroom}}</option>
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
                        <div class="input-group">
                           <label for="timeroom" class="input-group-text">เวลาที่จอง</label>
                           <input type="time" class="form-control" name="timeroom" value="{{$meeting->timeroom}}">
                           <span class="input-group-text">ถึง</span>
                           <input type="time" class="form-control" name="endtimeroom" value="{{$meeting->endtimeroom}}">
                        </div>
                        @error('timeroom')
                        <div class="my-1">
                           <span class="text-danger">{{$message}}</span>
                        </div>
                        @enderror
                        <br>
                        @if(session("error"))
                        <div class="alert alert-danger">{{session("error")}}</div>
                        @endif
                        <input type="submit" value="บันทึก" class="btn btn-success">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

</x-app-layout>