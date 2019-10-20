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
    import { INTERNAL_SERVER_ERROR } from './util'

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
                handler(val) {
                    if (val === INTERNAL_SERVER_ERROR) {
                        this.$router.path('/500');
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
