<template>
    <div class="container">
        <transition-group>
            <div class="mb-1 clearfix" v-show="!loading" key="1">
                <div class="btn-toolbar float-right" role="toolbar">
                    <div class="btn-group mr-2" role="group">
                    </div>
                    <div class="btn-group mr-3" role="group">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#Modal">New</button>
                    </div>
                </div>
            </div>
            <docs-list @loaded="loaded" key="2"></docs-list>
        </transition-group>
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
            <!--以下modal-dialogのCSSの部分で modal-lgやmodal-smを追加するとモーダルのサイズを変更することができる-->
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modal">Regist New Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <docs-store></docs-store>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { VueLoading } from 'vue-loading-template'
    export default {
        async mounted() {
            const ret = await window.axios.get("/api/docs")
            this.docs = ret.data;
        },
        data() {
            return {
                docs: window.data,
                loading: true,
            };
        },
        methods: {
            loaded() {
                this.loading = false;
            }
        },
        components: {
            VueLoading
        },
    }
</script>

<style scoped>
.v-enter-active {
  transition: all .8s ease;
}

.v-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.v-enter, .v-leave-to {
  transform: translateX(10px);
  opacity: 0;
}
</style>