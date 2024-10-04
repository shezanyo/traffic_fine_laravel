@extends("layouts.default")
@section("title","Signup")
@push("styles")
    <style>
        /* Overall Page Styling */
        body {
            background-color: #f0f8ff;
            font-family: "Arial", sans-serif;
        }

        /* Signup Box Styling */
        #box {
            background-color: #ffffff;
            width: 350px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Title Styling */
        .title {
            font-size: 35px;
            margin-bottom: 30px;
            color: #0044cc;
            font-weight: 700;
            text-align: center;
        }

        /* Input Field Styling */
        #text {
            height: 40px;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: solid thin #aaa;
            box-shadow: inset 2px 2px 5px rgb(219, 199, 219);
            margin-bottom: 20px;
            font-size: 16px;
            transition: box-shadow 0.3s ease;
        }

        #text:focus {
            box-shadow: 0 0 5px #0044cc;
            border-color: #0044cc;
            outline: none;
        }

        /* Button Styling */
        #button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            color: white;
            background-color: #0044cc;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #button:hover {
            background-color: #003399;
        }

        /* Login Button Styling */
        #login-button {
            margin-top: 15px;
            padding: 12px;
            font-size: 18px;
            color: #0044cc;
            background-color: transparent;
            border: none;
            cursor: pointer;
            text-decoration: underline;
            transition: color 0.3s ease;
        }

        #login-button:hover {
            color: #003399;
        }

        /* Message Alerts */
        .alert {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Animation for Box */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            #box {
                width: 90%;
                padding: 20px;
            }

            .title {
                font-size: 30px;
            }

            #button {
                font-size: 16px;
            }

            #login-button {
                font-size: 16px;
            }
        }
    </style>
@endpush

@section("content")
    <!-- Success and Error Messages -->
    @if (session()->has("success"))
        <div class="alert alert-success">
            {{ session()->get("success") }}
        </div>
    @endif

    @if (session()->has("error"))
        <div class="alert alert-error">
            {{ session()->get("error") }}
        </div>
    @endif

    <!-- Signup Form -->
    <div id="box">
        <form action="{{ route("register.Post") }}" method="post">
            @csrf
            <div class="title">Signup</div>
            <input id="text" type="text" name="email" placeholder="Email" required><br>
            <input id="text" type="text" name="name" placeholder="Username" required><br>
            <input id="text" type="text" name="phoneNumber" placeholder="Phone" required><br>
            <input id="text" type="password" name="password" placeholder="Password" required><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <!-- Login Button -->
            <button id="login-button" type="button" onclick="window.location="{{ route("login") }}"">
                Already have an account? Login here
            </button>
        </form>
    </div>
@endsection
