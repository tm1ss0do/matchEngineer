<template>

<li class="">
  ProjectItem
  {{ project.id }}:
  {{ project.name }}
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
