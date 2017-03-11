<h1>services</h1>
<? if (!empty($data)) : ?>
    <ul>
        <? foreach ($data as $item) : ?>
            <li>#: <?= $item['id']; ?></li>
            <li>Name: <?= $item['name']; ?></li>
        <? endforeach; ?>
    </ul>
<? endif; ?>