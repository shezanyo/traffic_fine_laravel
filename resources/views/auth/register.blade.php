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
    <form action="{{route('register.Post')}}"  method="post">
        @csrf
        <div class="title">Signup</div>
        <input id="text" type="text" name="email" placeholder=" Email" required><br><br>
        <input id="text" type="text" name="name" placeholder="Username" required><br><br>
        <input id="text" type="text" name="phoneNumber" placeholder="Phone" required><br><br>
        <input id="text" type="password" name="password" placeholder="Password" required><br><br>

        <input  id="button"type="submit" value="Signup"><br><br>
        <a href="login.html">Login</a>
    </form>
</div>
@endsection