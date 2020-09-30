<template>

<div class="p-cards__wrap">

  <section v-if="searchNotFlg" >
    <p class="u-font__sub">
    該当の情報が見つかりません。条件や単語を変えてお試しください。
    </p>
  </section>
  <div v-for="project in getItems">
    <project-item
    :project="project"
    :user="project.user"
    :url = "url"
    :non-display="false"
    :all="false"
    ></project-item>
  </div>

</div>
</template>

<script>
export default {
  props: ['getItems','searchNotFlg','url', 'user'],
    mounted() {
        console.log('Project mounted.')
    }
}
</script>
