<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>

<h1 class="title">投稿詳細</h1>
<nav>
    <ul>
        <li><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('投稿一覧'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('新規投稿'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="posts view large-9 medium-8 columns content">
    <h3><?= h($post->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Content') ?></th>
            <td><?= h($post->content) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('投稿日') ?></th>
            <td><?= h($post->created) ?></td>
        </tr>
        <tr>
            <td><?= $this->Form->postLink(__('削除'), ['action' => 'delete', $post->id], ['confirm' => __('この投稿を削除しますか?', $post->id)]) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $this->Html->link(__('編集'), ['action' => 'edit', $post->id]) ?>
            </td>
        </tr>
    </table>

</div>
