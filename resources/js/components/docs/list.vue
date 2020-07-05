<template>
    <div class="container">
        <div class="list-group">
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
    export default {
        async mounted() {
            const ret = await window.axios.get("/api/docs")
            this.docs = ret.data;
        },
        data() {
            return {
                docs: window.data
            };
        },
    }
</script>
