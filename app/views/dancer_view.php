<section class="profile-page">
    <div class="container">
        <?php foreach ($data['user'] as $item) : ?>
            <?php if($item['id'] == 1) header('Location: /dancers'); ?>
            <div class="row heading-row">
                <div class="fx-el">
                    <?php if (!empty($item['avatar'])) : ?>
                        <span class="row-img">
                            <img src="/uploads/<?= $item['avatar'];?>" alt="<?= $item['avatar'];?>">
                        </span>
                    <?php else : ?>
                        <span class="row-img no-avatar">
                            <i class="fa fa-user-o fa-3x" aria-hidden="true"></i>
                        </span>
                    <?php endif; ?>
                    <h1><?= $item['name'];?></h1>
                </div>
            </div>
            <div class="row">
                <div class="fx-el info-user">
                    <div class="about"><?= $item['about']; ?></div>
                    <p><b>E-mail</b>: <?= $item['email']; ?></p>
                    <p><b>Телефон</b>: +79811520687</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
