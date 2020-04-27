
<h1>新規投稿</h1>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('投稿一覧'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('新規投稿') ?></legend>
            <?= $this->Form->control('title'); ?>
            <?= $this->Form->control('content'); ?>
            <?= $this->Form->hidden('user_id', ['value'=>$user_id]); ?>
    </fieldset>
    <?= $this->Form->button(__('送信！')) ?>
    <?= $this->Form->end() ?>
</div>
