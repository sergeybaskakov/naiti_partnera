<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/app/lib/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/app/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/src/style.css">
    <title>Вход</title>
</head>
<body>
<div class="container login-container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading center-block">
                    <h1 class="panel-title">Для входа необходимо авторизоваться</h1>
                </div>
                <div class="panel-body">
                    <? require_once 'app/views/admin/'.$content_view; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>