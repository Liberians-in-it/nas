<template>
  <q-page class="row items-center justify-evenly">
    <h1>You are logged in!!!</h1>
  </q-page>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { axiosHasCredential } from 'boot/axios'
import { useRouter } from 'vue-router'

export default defineComponent({
  name: 'PageIndex',
  setup () {
    if (!axiosHasCredential()) {
      void useRouter().replace({
        name: 'login'
      })
    }
    return {}
  }
})
</script>
