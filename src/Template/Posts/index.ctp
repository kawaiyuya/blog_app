<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
?>

<h1>投稿一覧</h1>
<?php foreach ($posts as $post): ?>
    <tr>
        <td><?= $this->Number->format($post->id) ?></td>
        <td><?= h($post->title) ?></td>
        <td><?= $post->has('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
        <td><?= h($post->created) ?></td>
        <td><?= h($post->modified) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $post->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
        </td>
    </tr>
<?php endforeach; ?>

