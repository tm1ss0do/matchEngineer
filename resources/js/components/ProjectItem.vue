<template>

<li class="">
  ProjectItem
  {{ project.id }}:
  {{ project.project_title }}
</li>
</template>

<script>
export default {
    props: ['project'],
    mounted() {
        console.log('ProjectItem mounted.')
    }
}
</script>
