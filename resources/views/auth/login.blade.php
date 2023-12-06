
@extends('auth.layouts.app')

@section('content')

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic">
					<img src="{{asset('assets/login/img/logo.png')}}" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf

					<div class="login-title-container">
						<span class="login100-form-title">
							Ingresa a Los Archivos del Duque
						</span>
					</div>

					<div class="mb-4">

						<div class="wrap-input100 @error('nickname') is-invalid @enderror">

							<input class="input100 @error('nickname') is-invalid @enderror" type="text"  name="nickname" value="{{ old('nickname') }}" autocomplete="nickname" placeholder="Nombre de usuario" autofocus>

							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>

						</div>

						@error('nickname')

						<span class="invalid-feedback" role="alert">
							<strong>
								<i class="fa-solid fa-circle-exclamation me-1"></i>
								{{ $message }}
							</strong>
						</span>

						@enderror

					</div>

                    <div>
                        <div class="wrap-input100 @error('password') is-invalid my-1 @enderror">
                            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" autocomplete="current-password" placeholder="Contraseña">

                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>

                        </div>

                        @error('password')

                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>
                                    {{ $message }}
                                </strong>
                            </span>

                        @enderror
                    </div>




					<!-- <div class="row mb-3">
						<div class="col-md-6 offset-md-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

								<label class="form-check-label" for="remember">
									{{ __('Remember Me') }}
								</label>
							</div>
						</div>
					</div> -->

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Ingresar
						</button>

					</div>

					{{-- <div class="text-center ">
						@if (Route::has('password.request'))
							<a class="sign-up-btn" href="{{ route('password.request') }}">
								{{ __('Forgot Your Password?') }}
							</a>
						@endif
					</div> --}}

					<div class="text-center mt-2">
						<a class="sign-up-btn" href="{{ route('register') }}">
							Crear cuenta nueva
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




@endsection
