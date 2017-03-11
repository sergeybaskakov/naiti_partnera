<section class="profile-page">
    <div class="container">
        <div class="row heading-row">
            <div class="fx-el">
                <?php if (!empty($item['avatar'])) : ?>
                    <span class="row-img"><img src="/uploads/<?= $_SESSION['avatar'];?>" alt="<?= $_SESSION['avatar'];?>"></span>
                <?php else : ?>
                    <span class="row-img no-avatar">
                        <i class="fa fa-user-o fa-3x" aria-hidden="true"></i>
                    </span>
                <?php endif; ?>
                <h1><?= $_SESSION['name'];?></h1>
                <div class="edit-user">
                    <a class="btn-action" href="/profile/edit">Редактировать профиль</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="fx-el info-user">
                <div class="about"><?= $_SESSION['about']; ?></div>
                <p><b>E-mail</b>: <?= $_SESSION['email']; ?></p>
                <p><b>Телефон</b>: +79811520687</p>

            </div>
        </div>
    </div>
</section>
