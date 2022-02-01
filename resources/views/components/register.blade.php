<div class="row d-flex justify-content-center mt-5">
    <div class="col-md-4">
        <div class="kotak-login">
            <h3 class="fw-bolder">{{ $title }}</h3>
            <form action="/register" method="post" class="mt-5 mb-4">
                @csrf
                
                <label for="{{ $username }}" class="d-block fs-6 fw-bolder mb-2 ">{{ Str::ucfirst($username) }}</label>
                <input type="text" name="{{ $username }}" id="{{ $username }}" class="inputTextRegisLogin mb-3 @error('username') is-invalid @enderror" placeholder="{{ Str::ucfirst($username) }}..." autofocus autocomplete="off" required value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="{{ $email }}" class="d-block fs-6 fw-bolder mb-2">{{ Str::ucfirst($email) }}</label>
                <input type="{{ $email }}" name="{{ $email }}" id="{{ $email }}" class="inputTextRegisLogin mb-3 @error('email') is-invalid @enderror" placeholder="{{ Str::ucfirst($email) }}..." autofocus autocomplete="off" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="{{ $password }}" class="d-block fs-6 fw-bolder mb-2">{{ Str::ucfirst($password) }}</label>
                <input type="{{ $password }}" name="{{ $password }}" id="{{ $password }}" class="inputTextRegisLogin mb-3 @error('password') is-invalid @enderror" placeholder="{{ Str::ucfirst($password) }}..." autofocus autocomplete="off" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn btn-primary w-100">Register!</button>
                Have Account? <a href="/login" class="text-decoration-none">Login Now!</a>
            </form>
        </div>
    </div>
</div>