<template>

<div class="card-body">
  Project Compoent.

  <ul v-for="project in data">
    <li>
      {{ project.id }}:
      {{ project.name }}
    </li>
  </ul>

</div>
</template>

<script>
export default {
  props: ['data'],
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
