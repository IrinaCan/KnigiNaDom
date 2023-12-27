<x-layout>
    @include('header')

<div class="createLoginForm">
<form method="POST" action="/login">
@csrf



<x-form.input name="email" title="Почта" 
required/>
<br>


<x-form.input name="login" title="Логин" 
required/>
<br>


<x-form.input name="password" title="Пароль" 
 required/><br>

<button type="submit">Войти</button>


</form>
</div>
</x-layout>