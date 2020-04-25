<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
    echo $this->fetch('meta');
    // echo $this->Html->css('Posts/index.css');
    echo $this->fetch('css');
    echo $this->fetch('script');
?>
<title>ユーザー一覧</title>
<h1 class="title">ユーザー一覧（管理者権限者画面）</h1>

<?php foreach ($users as $user): ?>
    <tr>
        <td><?= $this->Number->format($user->id) ?></td>
        <td><?= h($user->name) ?></td>
        <td>
            <?= $this->Html->link(__('詳細'), ['action' => 'view', $user->id]) ?>
            <?= $this->Html->link(__('編集'), ['action' => 'edit', $user->id]) ?>
            <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?><br>
        </td>
    </tr>
<?php endforeach; ?>

