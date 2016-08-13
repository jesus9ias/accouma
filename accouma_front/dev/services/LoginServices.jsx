import axios from 'axios';
import storage from 'key-storage';
import config from '../config.json';

class LginServices {
  isLogued() {
    const token = storage.get('token');
    if (token === null) {
      return axios();
    } else {
      return axios({
        method: 'GET',
        url: `${config.apiUrl}/login?token=${token}`,
        data: {}
      });
    }
  }

  makeLogin(usr, pass) {
    return axios({
      method: 'POST',
      url: `${config.apiUrl}/login`,
      data: {
        usr,
        pass
      }
    });
  }
}

export default new LginServices();
