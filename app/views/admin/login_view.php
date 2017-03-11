<?
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<form class="form-horizontal" role="form" method="POST" action="/admin">
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Логин</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="login" name="login" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="pass" class="col-sm-2 control-label">Пароль</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <a href="">Забыли пароль?</a>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Войти</button>
        </div>
    </div>
</form>