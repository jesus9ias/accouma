import axios from 'axios';
import storage from 'key-storage';
import config from '../config.json';
import { queryString } from '../utils/Utils';

class UsersServices {
  getUsers() {
    const token = storage.get('token');
    if (token === null) {
      return axios();
    } else {
      const query_sring = queryString({
        token: token
      });
      return axios({
        method: 'GET',
        url: `${config.apiUrl}/users?${query_sring}`,
        data: {}
      });
    }
  }

  cretaeUser(userData) {
    const token = storage.get('token');
    if (token === null) {
      return axios();
    } else {
      const query_sring = queryString({
        token: token,
        nick: userData.nick,
        names: userData.names,
        last_names: userData.lastNames,
        email: userData.email
      });
      return axios({
        method: 'POST',
        url: `${config.apiUrl}/users/create?${query_sring}`,
        data: {}
      });
    }
  }
}

export default new UsersServices();
