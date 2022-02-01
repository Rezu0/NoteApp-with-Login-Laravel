<div class="row d-flex justify-content-center mt-5">
    <div class="col-md-4">
        <div class="kotak-login">
            <h3 class="fw-bolder">{{ $title }}</h3>
            @if (session()->has('msgRegisSuccess'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('msgRegisSuccess') }}
                    </div>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('loginError') }}
                    </div>
                </div>
            @endif

            @if (session()->has('doneLogout'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('doneLogout') }}
                    </div>
                </div>
            @endif
            <form action="/login" method="post" class="mt-5 mb-4">
                @csrf

                <label for="{{ $email }}" class="d-block fs-6 fw-bolder mb-2">{{ Str::ucfirst($email) }}</label>
                <input type="{{ $email }}" name="{{ $email }}" id="{{ $email }}" class="inputTextRegisLogin mb-3 @error('email') is-invalid @enderror" placeholder="{{ Str::ucfirst($email) }}..." autofocus autocomplete="off" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="{{ $password }}" class="d-block fs-6 fw-bolder mb-2">{{ Str::ucfirst($password) }}</label>
                <input type="{{ $password }}" name="{{ $password }}" id="{{ $password }}" class="inputTextRegisLogin mb-3 @error('password') is-invalid @enderror" placeholder="{{ Str::ucfirst($password) }}..." autofocus autocomplete="off" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn btn-primary w-100">Register!</button>
                Not Registered? <a href="/register" class="text-decoration-none">Register Now!</a>
            </form>
        </div>
    </div>
</div>