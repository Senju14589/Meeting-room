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
                        <a href="#" class="btn btn-success mt-3">ค้นหา</a>
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
                        <a href="#" class="btn btn-success mt-3">ค้นหา</a>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
</x-app-layout>