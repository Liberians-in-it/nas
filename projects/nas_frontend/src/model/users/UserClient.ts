import { api } from 'boot/axios'
import { UserType } from './type'

class UsersClient {

  public getMe (): Promise<UserType | null> {
    return new Promise<UserType | null>((resolve, reject) => {
      api.get('user')
        .then((response) => {
          resolve(response.data as UserType)
        })
        .catch(() => {
          reject(null)
        })
    })
  }
}

export const client = new UsersClient()
