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

  makeLogin(nick, pass) {
    return axios({
      method: 'POST',
      url: `${config.apiUrl}/login`,
      data: {
        nick,
        pass
      }
    });
  }
}

export default new LginServices();
