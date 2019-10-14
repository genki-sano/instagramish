import Vue from 'vue'
// ルーティングの定義をインポート
import router from './router'
// ルートコンポーネントをインポート
import App from './App.vue'

new Vue({
    el: '#app',
    router, // ルーティングの定義を読み込む
    components: { App }, // ルートコンポーネントの使用を宣言
    template: '<App />' // ルートコンポーネントを描画
});
