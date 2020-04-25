<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>

<h1 class="title">ユーザー詳細</h1>
<h2><?= h($user->name)?></h2>
<h2><?= h($user->admin_Flag) ?></h2>

<div class="posts view large-9 medium-8 columns content">
    <table class="vertical-table">
        <?php foreach ($user->posts as $post): ?>
            <tr>
                <th scope="row"><?= __('Title') ?></th>
                <td><?= h($post->title) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Content') ?></th>
                <td><?= h($post->content) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('投稿日') ?></th>
                <td><?= h($post->created) ?></td>
            </tr>
        <?php endforeach ;?>
    </table>

</div>
