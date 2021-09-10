<template>
  <q-page class="row items-center justify-evenly">
    <div class="row">
      <div class="col-12">
        <q-input type="text" label="Email" v-model="username" />
      </div>
      <div class="col-12 q-mb-md">
        <q-input type="password" label="Password" v-model="password" />
      </div>
     <div class="col-12">
      <div class="row justify-between">
        <q-btn label="Cancel" color="red" @click="clearUsernameAndPassword"/>
        <q-btn label="Login" color="primary" @click="doLogin" />
      </div>
     </div>

    </div>
  </q-page>
</template>

<script lang="ts">

import { defineComponent, ref } from 'vue'

export default defineComponent({
  name: 'LoginPage',
  setup () {
    const username = ref<string>()
    const password = ref<string>()

    const clearUsernameAndPassword = () => {
      username.value = ''
      password.value = ''
    }

    const doLogin = () => {
      console.log('logging in user credentials', {
        username: username.value,
        password: password.value
      })
    }

    return {
      username,
      password,
      clearUsernameAndPassword,
      doLogin
    }
  }
})
</script>
