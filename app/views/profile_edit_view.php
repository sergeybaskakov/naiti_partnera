<link rel="stylesheet" href="/app/lib/Croppie-master/croppie.css">
<link rel="stylesheet" href="/app/lib/Croppie-master/demo/demo.css">
<section class="profile-page edit-profile">
    <div class="container">
        <form enctype="multipart/form-data" action="" method="POST">
            <?php foreach ($data['user'] as $user) : ?>
            <div class="row heading-row">
                <div class="fx-el">
                    <?php if (!empty($user['avatar'])) : ?>
                        <span class="row-img"><img src="/uploads/<?= $user['avatar'];?>" alt="<?= $user['avatar'];?>"></span>
                    <?php else : ?>
                        <span class="row-img no-avatar">
                            <i class="fa fa-user-o fa-3x" aria-hidden="true"></i>
                        </span>
                    <?php endif; ?>
                    <div class="actions">
                        <a class="btn file-btn">
                            <span>Upload</span>
                            <input type="file" id="upload" value="Choose a file" accept="image/*" />
                        </a>
                        <button class="upload-result">Result</button>
                    </div>
                    <div class="upload-msg">
                        Upload a file to start cropping
                    </div>
                    <div class="upload-demo-wrap">
                        <div id="upload-demo"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="fx-el info-user">
                    <p><label for="user_name">ФИО: </label><input id="user_name" type="text" value="<?= $user['name'];?>"></p>
                    <p><label for="user_email">Email: </label><input id="user_email" type="text" value="<?= $user['email'];?>"></p>
                    <p><label for="user_year">Год рождения: </label><input id="user_year" type="text" value="<?= $user['year'];?>"></p>
                    <p><label for="user_town">Город: </label><input id="user_town" type="text" value="<?= $user['town'];?>"></p>
                    <p><label for="user_club">Клуб: </label><input id="user_club" type="text" value="<?= $user['club'];?>"></p>
                    <p><label for="dance_class">Класс: </label><input id="dance_class" type="text" value="<?= $user['dance_class'];?>"></p>
                    <p><label for="user_about">Несколько слов о себе: </label><textarea name="user_about" id="user_about"><?= $user['dance_class'];?></textarea></p>
                </div>
            </div>
            <?php endforeach; ?>
        </form>
    </div>
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/app/lib/Croppie-master/croppie.js"></script>
<script src="/app/lib/Croppie-master/demo/demo.js"></script>
