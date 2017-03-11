<?php $request_uri = explode('/', $_SERVER['REQUEST_URI']);?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title><?php if(isset($data['title'])) echo $data['title']; else echo 'Упс, кажется 404 ...'; ?></title>
</head>
<body>
<header>
    <div class="container">
        <div class="row top-header">
            <div class="fx-el">
                <a class="btn-action" href="#">Подать объявление</a>
            </div>
            <div class="fx-el">
                <a href=""><img src="/images/logo.jpg" alt=""></a>
            </div>
            <div class="fx-el">
                <?php if (isset($_SESSION['user_auth'])) : ?>
                    <a href="/profile">
                        <span class="name-user"><?= $_SESSION['name']; ?></span>
                        <?php if (!empty($_SESSION['avatar'])) : ?>
                            <span class="small-avatar">
                                <img src="/uploads/<?= $_SESSION['avatar']; ?>" alt="<?= $_SESSION['avatar']; ?>">
                            </span>
                        <?php else : ?>
                            <span class="small-avatar no-avatar">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                <?php else : ?>
                    <a href="/profile/login">
                        <span class="name-user">Вход/Регистрация</span>
                        <span class="small-avatar no-avatar">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="fx-el">
                <nav>
                    <ul>
                        <li><a href="/">Главная</a></li>
                        <li><a href="/dancers/page/1" <?php if($request_uri[1] =='dancers') echo 'class="current"' ?>>Объявления</a></li>
                        <li><a href="">Публикации</a></li>
                        <li><a href="">Новости</a></li>
                        <li><a href="">О проекте</a></li>
                        <li><a href="">Связаться с нами</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="content">
    <?php include 'app/views/'.$content_view; ?>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="fx-el">
                <p>&copy; <?= date('Y');?> NAITI-PARTNERA.RU</p>
            </div>
            <div class="fx-el">
                <p>
                    <a href="">Политика конфиденциальности</a>
                    <a href="">Поддержка</a>
                </p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>