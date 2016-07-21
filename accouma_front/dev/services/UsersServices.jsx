import axios from 'axios';
import storage from 'key-storage';
import config from '../config.json';

class UsersServices {
  getUsers() {
    const token = storage.get('token');
    if(token === null){
      return axios();
    }else{
      return axios({
        method: 'GET',
        url: config.apiUrl + '/users?token=' + token,
        data: {}
      });
    }
  }
}

export default new UsersServices();
