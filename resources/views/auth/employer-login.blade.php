<form method="POST" action="/login">
    @csrf
    <input type="hidden" name="role" value="employer">

    <input type="email" name="email" placeholder="Employer Email">
    <input type="password" name="password" placeholder="Password">

    <button>Employer Login</button>
</form>