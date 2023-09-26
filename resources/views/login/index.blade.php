<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>BIOTROP</title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    
                    <!-------Image-------->
                    <div class="text">
                        <p> 
                            Human Resource
                            Information 
                            System</p>
                    </div>
                </div>

                <div class="col-md-6 right">
                    <div class="input-box">
                        <img src="{{ asset("img/logo-biotrop.png") }}">
                        
                        @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        
                        <form action="/" method="POST">
                            @csrf
                            <div class="login-form">
                                <div>
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text " id="basic-addon1"><i
                                                class="fa-solid fa-envelope"></i></span>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid
                                        @enderror" id="email" placeholder="Email" required autofocus value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password" class="form-label mt-3">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-key"></i></span>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password" required>
                                    </div>
                                </div>

                                <div class=" d-grid mt-4">
                                    <button type="submit" class="btn btn-success">Login</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>