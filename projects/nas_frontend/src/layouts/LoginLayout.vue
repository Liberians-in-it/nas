<template>
  <q-layout view="lHh Lpr lFf">
    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

function onClick () {
  console.log('you clicked me')
}

export default defineComponent({
  name: 'LoginLayout',
  setup () {
    return {
      onClick
    }
  }
})
</script>
