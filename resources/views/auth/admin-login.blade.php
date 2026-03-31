<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="hidden" name="role" value="admin">
    <input type="email" name="email" placeholder="Admin Email">
    <input type="password" name="password" placeholder="Password">

    <button type="submit">Login</button>
</form>