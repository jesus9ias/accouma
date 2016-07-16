import axios from 'axios';
import storage from 'key-storage';

class UsersServices {
  getUsers() {
    const token = storage.get('token');
    if(token === null){
      return axios();
    }else{
      return axios({
        method: 'GET',
        url: 'http://localhost:8000/api/v1/users?token=' +token,
        data: {}
      });
    }
  }
}

export default new UsersServices();
