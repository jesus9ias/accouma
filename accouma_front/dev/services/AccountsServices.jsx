import axios from 'axios';

class AccountsServices {
  getAccounts(){
    return axios({
      method : 'GET',
      url : 'http://localhost:8000/api/v1/accounts',
      data : {}
    });
  }
}

export default new AccountsServices();
