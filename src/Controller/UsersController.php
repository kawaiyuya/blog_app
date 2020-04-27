<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{

    public function index(){
        // レイアウトの設定
        $this->viewBuilder()->setLayout('sample');
        
        $users = $this->Users->find('all');

        $this->set(compact('users'));
    }

    public function view($id = null){
        // レイアウトの設定
        $this->viewBuilder()->setLayout('sample');
        
        // idからユーザー情報に紐づく投稿を検索
        $user = $this->Users->get($id, [
            'contain' => ['Posts']
        ]);
        // 'user'に$postをセット
        $this->set('user', $user);

        // idからユーザー情報に紐づく投稿を検索
        // $post = $this->Posts->get($id, [
        //     'contain' => ['Users']
        // ]);
        // // 'post'に$postをセット
        // $this->set('post', $post);
    }


    // 新規登録アクション
    public function signup()
    {
        // レイアウトの設定
        $this->viewBuilder()->setLayout('sample');
        // 新しいエンティティの作成
        $user = $this->Users->newEntity();
        // requestされメソッドが、postの場合True
        if ($this->request->is('post')) {
            // requestで送られたデータを上で作成したエンティティにpatchEntityでぶち込む
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // 保存できたかの確認
            if ($this->Users->save($user)) {
                // 登録完了メッセージ
                $this->Flash->success(__('新規登録ができました'));
                // Postsのindexアクションにリダイレクト
                return $this->redirect(['controller'=>'Users','action' => 'login']);
            }
            // 登録失敗時のエラーメッセージ
            $this->Flash->error(__('新規登録ができませんでした。もう一度試してください。'));
        }
        $this->set(compact('user'));
    }

    public function login()
    {
        // レイアウトの設定
        $this->viewBuilder()->setLayout('sample');
        // Post送信かの判定
        if($this->request->is('post')){
            // ユーザー情報の取得
            $user = $this->Auth->identify();
            // ユーザー情報を取得できたら
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('ログインに失敗しました、もう一度トライしてください。'));
        }

    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }



    // public function edit($id = null)
    // {
    //     $post = $this->Posts->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $post = $this->Posts->patchEntity($post, $this->request->getData());
    //         if ($this->Posts->save($post)) {
    //             $this->Flash->success(__('編集が保存されました。'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('エラーが発生して保存できませんでした。'));
    //     }
    //     $users = $this->Posts->Users->find('list', ['limit' => 200]);
    //     $this->set(compact('post', 'users'));
    // }

    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $post = $this->Posts->get($id);
    //     if ($this->Posts->delete($post)) {
    //         $this->Flash->success(__('投稿を削除しました。'));
    //     } else {
    //         $this->Flash->error(__('削除できませんでした。もう一度試してください。'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
