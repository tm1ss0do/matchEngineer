<template>

<div class="card-body">

  <section v-if="searchNotFlg" >
    <p>
    該当の情報が見つかりません。条件や単語を変えてお試しください。
    </p>
  </section>
  <div v-for="project in getItems">
    <project-item
    :project="project"
    :url = "url"
    :non-display="false"
    ></project-item>
  </div>

</div>
</template>

<script>
export default {
  props: ['getItems','searchNotFlg','url'],
    mounted() {
        console.log('Project mounted.')
    }
}
</script>
