import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import Login from './pages/Login.vue'
import PhotoList from './pages/PhotoList.vue'
import PhotoDetail from './pages/PhotoDetail.vue'
import NotFound from './pages/errors/NotFound.vue'
import SystemError from './pages/errors/System.vue'

// ログイン状態の確認用にストアを取得
import store from './store'

// VueRouterプラグインを使用
Vue.use(VueRouter);

// パスとコンポーネントのマッピング
const routes = [
    {
        path: '/',
        component: PhotoList,
        props: route => {
            const page = route.query.page;
            return { page: /^[1-9][0-9]*$/.test(page) ? page : 1 };
        }
    },
    {
        path: '/photos/:id',
        component: PhotoDetail,
        props: true
    },
    {
        path: '/login',
        component: Login,
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next('/')
            } else {
                next()
            }
        }
    },
    {
        path: '/500',
        component: SystemError
    },
    {
        path: '*',
        component: NotFound
    }
];

// VueRouterインスタンスを作成
const router = new VueRouter({
    mode: 'history',
    scrollBehavior() {
        return {x: 0, y: 0}
    },
    routes
});

// VueRouterインスタンスをエクスポート
export default router
