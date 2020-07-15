<template>
    <form class="container clearfix" action="/api/docs/store" method="POST">
        <div class="row">
            <label class="col-2">Name : </label>
            <input class="col-8" type="text" name="name" />
        </div>
        <div class="row">
            <label class="col-2">path : </label>
            <input class="col-8" type="text" name="path" />
        </div>
        <div class="row">
            <label class="col-2">type : </label>
            <select class="col-4" name="type">
                <option value="md" selected>Markdown</option>
                <option value="rst">reStructuredText</option>
            </select>
        </div>
        <div class="row btn-toolbar float-right" role="toolbar">
            <input type="submit" class="btn btn-outline-dark btn-sm" value="Regist" /> 
        </div>
    </form>
</template>

<script>
    export default {
        async mounted() {
        },
        data() {
            return {
            };
        },
    }
</script>
