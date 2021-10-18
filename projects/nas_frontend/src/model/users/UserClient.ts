import { api } from 'boot/axios'
import { UserType } from './type'

class UsersClient {
  public getMe (): Promise<UserType> {
    return new Promise<UserType>((resolve, reject) => {
      api.get('user')
        .then((response) => {
          resolve(response.data as UserType)
        })
        .catch((error) => {
          reject(error)
        })
    })
  }
}

export const client = new UsersClient()
