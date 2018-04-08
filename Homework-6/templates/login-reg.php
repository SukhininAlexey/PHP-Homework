<?=$message?>

<h3>Вход на сайт</h3>
<form action="" enctype="multipart/form-data" method="post">
    <p>Логин: <input type="text" name="login"></p>
    <p>Пароль: <input type="password" name="password"></p>
    <input type="submit" name="log-reg" value="Login">
</form>

<h3>Регистрация</h3>
<form action="" enctype="multipart/form-data" method="post">
    <p>Логин: <input type="text" name="login"></p>
    <p>Пароль: <input type="password" name="password"></p>
    
    <p>Тип пользователя: <select name="userType">
            <option value="Admin">Админимтратор</option>
            <option value="User">Пользователь</option>
    </select></p>
    
    <input type="submit" name="log-reg" value="Register">
</form>