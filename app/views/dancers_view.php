<section class="dancers-page">
    <div class="container">
        <div class="row heading-row">
            <div class="fx-el">
                <ul>
                    <li><a href="/dancers/page/1" <?php if($request_uri[2] == 'page') echo 'class="active"'; ?>>Все партнеры</a></li>
                    <li><a href="/dancers/man/1" <?php if($request_uri[2] == 'man') echo 'class="active"'; ?>>Партнеры</a></li>
                    <li><a href="/dancers/woman/1" <?php if($request_uri[2] == 'woman') echo 'class="active"'; ?>>Партнерши</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="dancers">
                <?php foreach ($data['users'] as $item) : ?>
                    <div class="fx-el">
                        <?php if (!empty($item['avatar'])) : ?>
                            <div class="avatar-user">
                                <a href="/dancers/view/<?= $item['id'] ?>"><img src="/uploads/<?= $item['avatar'] ?>" alt="avatar-user"></a>
                            </div>
                        <?php else : ?>
                            <div class="avatar-user no-avatar">
                                <a href="/dancers/view/<?= $item['id'] ?>"><i class="fa fa-user-o fa-3x" aria-hidden="true"></i></a>
                            </div>
                        <?php endif; ?>
                        <div class="main-info">
                            <p class="name-user">
                                <a href="/dancers/view/<?= $item['id'] ?>"><?= $item['name']; ?></a>
                            </p>
                        </div>
                        <div class="info-user">
                            <ul>
                                <li><span>Год рождения:</span> <?= $item['year']; ?></li>
                                <li><span>Рост:</span> 170</li>
                            </ul>
                        </div>
                        <div class="additional-info">
                            <ul>
                                <li><span>Город:</span> <?= $item['town']; ?></li>
                                <li><span>Клуб:</span> <?= $item['club']; ?></li>

                            </ul>
                        </div>
                        <div class="social-user">
                            <p>
                                <?php if ($item['status'] == 1) : ?>
                                    <span class="badge online">online</span>
                                <?php else: ?>
                                    <span class="badge">offline</span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
            <ul class="pagination">
                Страницы
                <?php foreach ($data['pagination'] as $pagination) :?>
                    <?php if($request_uri[3] == $pagination) : ?>
                        <li class="current"><?php echo $pagination;?></li>
                    <?php else : ?>
                        <li><a href="/<?php echo $request_uri[1]?>/<?php echo $request_uri[2]?>/<?php echo $pagination;?>"><?php echo $pagination;?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
