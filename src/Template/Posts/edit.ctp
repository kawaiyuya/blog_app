<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<h1 class="title">投稿編集</h1>
<nav>
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('削除'),
                ['action' => 'delete', $post->id],
                ['confirm' => __('この投稿を削除しますか?', $post->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('投稿一覧'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('Edit Post') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('更新！')) ?>
    <?= $this->Form->end() ?>
</div>

