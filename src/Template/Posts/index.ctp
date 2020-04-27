<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
    echo $this->fetch('meta');
    echo $this->Html->css('Posts/index.css');
    echo $this->fetch('css');
    echo $this->fetch('script');
?>

<title>投稿一覧</title>

<h1 class="title">投稿一覧</h1>
<nav>
    <ul>
        <li><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('新規投稿'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('新規登録'), ['controller'=>'Users','action' => 'signup']) ?></li>
        <li><?= $this->Html->link(__('ユーザー詳細'),['controller'=>'Users','action'=>'view']) ?></li>
    </ul>
</nav>

<?php foreach ($posts as $post): ?>
    <tr>
        <!-- <td><?= $this->Number->format($post->id) ?></td> -->
        <td><?= h($post->title) ?></td>
        <td><?= $post->has('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
        <td>
            <?= $this->Html->link(__('投稿詳細'), ['action' => 'view', $post->id]) ?>
            <!-- 管理者権限者のみ削除可能 -->
            <?= $this->Html->link(__('編集'), ['action' => 'edit', $post->id]) ?>
            <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?><br>
        </td>
    </tr>
<?php endforeach; ?>

