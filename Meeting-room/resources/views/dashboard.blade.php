<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('หน้าแรก') }}
      </h2>

   </x-slot>

   <div class="py-12">
      <div class="container">
         <div class="row">

            <div class="col-md-6">
               <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="container mt-3">
                     <div class="card mb-3">
                        <div class="row">
                           <div class="col">
                              <img src="{{url('image/1.jpg')}}" class="img-fluid" alt="...">
                           </div>
                        </div>
                        <button type="button" class="float-end btn btn-warning mt-3" data-bs-toggle="modal"
                           data-bs-target="#staticBackdrop">
                           จองห้องประชุม
                        </button>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-md-6">
               <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="container mt-3">
                     <div class="card mb-3">
                        <div class="row">
                           <div class="col">
                              <img src="{{url('image/2.jpg')}}" class="img-fluid" alt="...">
                           </div>
                        </div>
                        <a href="{{route('meeting')}}" class="btn btn-success mt-3">ค้นหา</a>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>

   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">แบบฟอร์มการจองห้องประชุม</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card">
               <div class="card-body">
                  <form action="{{ route('addMeeting') }}" method="post">
                     @csrf
                     <div class="form-group">
                        <label for="nameroom">ชื่อห้องที่จอง</label>
                        <div class="input-group mb-3">
                           <select class="form-select" name="nameroom">
                              <option selected value="">เลือกห้องประชุม</option>
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
                           <input type="date" class="form-control" name="dateroom">
                        </div>
                        <br>
                        @error('dateroom')
                        <div class="my-1">
                           <span class="text-danger">{{$message}}</span>
                        </div>
                        @enderror
                        <div class="form-group">
                           <label for="timeroom">เวลาที่จอง</label>
                           <input type="time" class="form-control" name="timeroom">
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