<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="hidden" name="role" value="employee">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">

    <button>Login</button>
</form>