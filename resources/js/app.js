// CSRF対策
import './bootstrap'

import Vue from 'vue'
// ルーティングの定義をインポート
import router from './router'
// ストアの定義をインポート
import store from './store'
// ルートコンポーネントをインポート
import App from './App.vue'

const createApp = async () => {
    // ログインチェック
    await store.dispatch('auth/currentUser');

    new Vue({
        el: '#app',
        router, // ルーティングの定義を読み込む
        store, // ストアの定義を読み込む
        components: {App}, // ルートコンポーネントの使用を宣言
        template: '<App />' // ルートコンポーネントを描画
    });
};

createApp();
