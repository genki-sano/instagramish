<template>
    <div>
        <header>
            <Navbar />
        </header>
        <main>
            <div class="container">
                <Message />
                <RouterView />
            </div>
        </main>
        <Footer />
    </div>
</template>
<script>
    import { NOT_FOUND, UNAUTHORIZED, INTERNAL_SERVER_ERROR } from './util'
    import Message from './components/Message.vue'
    import Navbar from './components/Navbar.vue'
    import Footer from './components/Footer.vue'

    export default {
        components: {
            Message,
            Navbar,
            Footer
        },
        computed: {
            errorCode() {
                return this.$store.store.error.code;
            }
        },
        watch: {
            errorCode: {
                async handler(val) {
                    if (val === INTERNAL_SERVER_ERROR) {
                        this.$router.path('/500');
                    } else if (val === UNAUTHORIZED) {
                        // トークンをリフレッシュ
                        await axios.get('/api/refresh-token');
                        // ストアのuserをクリア
                        this.$store.commit('auth/setUser', null);
                        // ログイン画面へ
                        this.$router.push('/login');
                    } else if (val === NOT_FOUND) {
                        this.$router.push('/not-found')
                    }
                },
                immediate: true
            },
            $route() {
                this.$store.commit('error/setCode', null);
            }
        }
    }
</script>
