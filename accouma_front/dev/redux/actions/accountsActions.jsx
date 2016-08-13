import * as actions from '../allTypes';
import AccountsServices from '../../services/AccountsServices';

export default {
  getAllAccounts: () => (dispatch) => {
    dispatch({ type: actions.LOADING, data: true });
    AccountsServices.getAccounts().then((response) => {
      dispatch({ type: actions.GET_ALL_ACCOUNTS, data: response.data.result.rows });
      dispatch({ type: actions.LOADING, data: false });
    }).catch((error) => {

    });
  }
};
