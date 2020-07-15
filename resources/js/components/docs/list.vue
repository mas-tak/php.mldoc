<template>
    <div class="container">
        <vue-loading v-show="loading" type="barsCylon" color="#333" :size="{ width: '50px', height: '50px' }"></vue-loading>
        <div v-show="!loading" class="list-group">
            <!-- {{ route('docs.show', ['id' => $doc->id]) }} -->
            <div v-for="doc in docs" :key="doc.id" class="ribbon-wrapper">
                <div class="ribbon-content">
                    <span class="ribbon">{{ doc.type.toUpperCase() }}</span>
                </div>
                <a :href="'/docs/' + doc.id" class="list-group-item list-group-item-action">{{ doc.name }}</a>
            </div>
        </div>
    </div>
</template>

<script>
    import { VueLoading } from 'vue-loading-template'
    export default {
        async mounted() {
            const ret = await window.axios.get("/api/docs").then(response => {
                this.docs = response.data;
                this.$emit('loaded')
                setTimeout((() => {
                    this.loading = false;
                }).bind(this), 500) //TODO: transition not work ?
            })
        },
        data() {
            return {
                docs: window.data,
                loading: true,
            };
        },
        props: {
        },
        methods: {
            loadingHide() {
            },
            loadingShow() {
            },
        },
        components: {
            VueLoading
        },
    }
</script>
