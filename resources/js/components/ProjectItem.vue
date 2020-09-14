<template>

<li class="">
  ProjectItem
  {{ project.id }}:
  {{ project.project_title }}
  <a :href="'/projects/'+project.user_id+'/profile'" >{{ project.user_id }}</a>
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
