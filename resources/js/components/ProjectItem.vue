<template>

<li class="">
  ProjectItem
  {{ project.id }}:
  {{ project.project_title }}
  <a :href="'/project/'+project.user_id" >{{ project.user_id }}</a>
</li>
</template>

<script>
export default {
    props: ['project','url'],
    mounted() {
        console.log('ProjectItem mounted.')
    }
}
</script>
