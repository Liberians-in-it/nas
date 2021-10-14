import { boot } from 'quasar/wrappers'
import axios, { AxiosInstance } from 'axios'

declare module '@vue/runtime-core' {
  interface ComponentCustomProperties {
    $axios: AxiosInstance;
  }
}

// Be careful when using SSR for cross-request state pollution
// due to creating a Singleton instance here;
// If any client changes this (global) instance, it might be a
// good idea to move this instance creation inside of the
// "export default () => {}" function below (which runs individually
// for each client)

// get api host
const hostElement = document.getElementsByName('api_host')
let domain = ''
if (hostElement) {
  domain = (hostElement[0] as HTMLMetaElement).content
}
domain += 'api/v1'

// get api token
const apiTokenElement = document.getElementsByName('api_token')
let apiToken = ''
if (apiTokenElement) {
  apiToken = (apiTokenElement[0] as HTMLMetaElement).content
}

const api = axios.create({
  baseURL: domain,
  headers: {
    Accept: 'application/json',
    Authorization: `Bearer ${apiToken}`
  }
})

export default boot(({ app }) => {
  // for use inside Vue files (Options API) through this.$axios and this.$api

  app.config.globalProperties.$axios = axios
  // ^ ^ ^ this will allow you to use this.$axios (for Vue Options API form)
  //       so you won't necessarily have to import axios in each vue file

  app.config.globalProperties.$api = api
  // ^ ^ ^ this will allow you to use this.$api (for Vue Options API form)
  //       so you can easily perform requests against your app's API
})

export { api }
