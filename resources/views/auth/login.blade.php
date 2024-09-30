@extends("layouts.default")
@section("title","Login")
@section("content")    
@if (session()->has("success"))
<div>
    {{session()->get("success")}}
</div> 
@endif
@if (session()->has("error"))
<div>
    {{session()->get("error")}}
</div> 
@endif
<div id="box">
    <div id="box">
        <form action="{{route('login.Post')}}" method="post">
            @csrf
            <div class="title">Login</div>
            <input id="text" type="text" name="email" placeholder="email" required><br><br>
            <input id="text" type="password" name="password" placeholder="Password" required><br><br>
            
            <input  id="button"type="submit" value="Login"><br><br>
            <a href="register.html">Signup</a>
        </form>
    </div>
@endsection