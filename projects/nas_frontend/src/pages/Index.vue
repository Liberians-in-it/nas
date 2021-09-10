<template>
  <q-page class="row items-center justify-evenly">
  </q-page>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { LocalStorage } from 'quasar'
import { LoginInfoType } from '../models/types'
import { useRouter } from 'vue-router'

export default defineComponent({
  name: 'PageIndex',
  setup () {
    LocalStorage.clear()
    const loginInfo = LocalStorage.getItem('nas_login')
    const router = useRouter()

    if (loginInfo && (loginInfo as LoginInfoType).apiToken) {
      void router.replace({
        name: 'dashboard'
      })
    } else {
      console.log('take us to the login page')
      void router.replace({
        name: 'login'
      })
    }
    return { }
  }
})
</script>
