import axios from 'axios';

class UsersServices {
  getUsers(){
    return axios({
      method : 'GET',
      url : 'http://localhost:8000/api/v1/users',
      data : {}
    });
  }
}

export default new UsersServices();
