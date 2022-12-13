<x-guest-layout>
   <x-jet-authentication-card>
      <x-slot name="logo">
      </x-slot>

      <x-jet-validation-errors class="mb-4" />

      @if (session('status'))
      <div class="mb-4 font-medium text-sm text-green-600">
         {{ session('status') }}
      </div>
      @endif

      <div class="card mb-3" style="max-width: 540px;">
         <div class="row g-0">
            <div class="col-md-4">
               <img src="{{url('image/met.jpg')}}" class="img-fluid rounded-start" alt="..." width="600" height="">
            </div>
            <div class="col-md-8">
               <div class="card-body">
                  <h1 class="card-title text-center mt-4">ระบบจองห้องประชุม</h1>
                  <form method="POST" action="{{ route('login') }}">
                     @csrf

                     <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                           :value="old('email')" required autofocus />
                     </div>

                     <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                           autocomplete="current-password" />
                     </div>

                     <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                           <x-jet-checkbox id="remember_me" name="remember" />
                           <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                     </div>

                     <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                           href="{{ route('password.request') }}">
                           {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <x-jet-button class="ml-4">
                           {{ __('Log in') }}
                        </x-jet-button>
                        <x-jet-button class="ml-4">
                           <a href="{{ route('register') }}">Register</a>
                        </x-jet-button>
                     </div>
                     <div class="flex items-center justify-end mt-4 align-middle ">
                        <a href="{{ route('auth.google') }}">
                           <img
                              src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                              style="margin-left: 3em;">
                        </a>
                        <a class="ml-1 btn btn-primary" href="{{ url('auth/facebook') }}"
                           style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;"
                           id="btn-fblogin">
                           <i class="fa fa-facebook-square" aria-hidden="true"></i>Facebook
                        </a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </x-jet-authentication-card>
</x-guest-layout>