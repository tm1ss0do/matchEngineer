<template>

<div class="card-body">

  <section v-if="searchNotFlg" >
    <p>
    該当の情報が見つかりません。他の単語でお試しください。
    </p>
  </section>
  <ul v-for="project in getItems">
    <project-item
    :project="project"
    ></project-item>
  </ul>

</div>
</template>

<script>
export default {
  props: ['getItems','searchNotFlg'],
    mounted() {
        console.log('Project mounted.')
    }
}
</script>
