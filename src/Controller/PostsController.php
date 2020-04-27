<?php
namespace App\Controller;

use App\Controller\AppController;


class PostsController extends AppController
{

    // indexアクション(メソッド)
    public function index()
    {
        $this->viewBuilder()->setLayout('sample');
        // すべての投稿を検索
        $posts = $this->Posts->find('all');
        // 'posts'に$postsの値をセット
        // $this->set('posts', $posts); と同じ
        $this->set(compact('posts'));

    }

    // 詳細表示アクション(メソッド)デフォルト値に $id = null
    public function view($id = null)
    {

        $this->viewBuilder()->setLayout('sample');

        // idからユーザー情報に紐づく投稿を検索
        $post = $this->Posts->get($id, [
            'contain' => ['Users'],
        ]);
        // 'post'に$postをセット
        $this->set('post', $post);
    }

    // 新規投稿アクション
    public function add()
    {
        $this->viewBuilder()->setLayout('sample');

        // 新しいエンティティの作成
        $post = $this->Posts->newEntity();
        // requestされメソッドが、postの場合True
        if ($this->request->is('post')) {
            // requestで送られたデータを上で作成したエンティティにpatchEntityでぶち込む
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            // 保存できたかの確認
            if ($this->Posts->save($post)) {
                // 投稿完了メッセージ
                $this->Flash->success(__('投稿完了'));
                // indexアクションにリダイレクト
                return $this->redirect(['action' => 'index']);
            }
            // 投稿失敗時のエラーメッセージ
            $this->Flash->error(__('投稿できませんでした。もう一度試してください。'));
        }
        $user_id= $this->Auth->user('id');
        $this->set(compact('user_id'));
        $this->set(compact('post'));
    }

    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('sample');

        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('編集が保存されました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('エラーが発生して保存できませんでした。'));
        }
        $this->set(compact('post'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('投稿を削除しました。'));
        } else {
            $this->Flash->error(__('削除できませんでした。もう一度試してください。'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
