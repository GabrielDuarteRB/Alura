<template>
  <div class="projetos">
    <h1 class="title">Projetos</h1>
  </div>
  <div class="projetos">
    <RouterView/>
  </div>
</template>

<script lang="ts">

import { defineComponent } from 'vue';

export default defineComponent({
  name: 'Projetos'
})

</script>

<style>
  .projetos {
    padding: 1.25rem;
  }
  </style>