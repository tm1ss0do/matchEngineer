<template>

<div class="card-body">

  <section v-if="errored">
    <p>
    該当の情報が見つかりません。他の単語でお試しください。
    </p>
  </section>

  <section v-else>
  Search 
  </section>

</div>
</template>

<script>
    export default {
    props: [],
        data: function() {
            return {
                // projects: [],
                loading: true,
                errored: false,
                // paginate: ['paginate-log'],

            }
        },
        mounted () {

        }

    }
</script>
