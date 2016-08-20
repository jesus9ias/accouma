import * as actions from '../allTypes';
import UsersServices from '../../services/UsersServices';

export default {
  getAllUsers: () => (dispatch) => {
    dispatch({ type: actions.LOADING, data: true });
    UsersServices.getUsers().then((response) => {
      dispatch({ type: actions.GET_ALL_USERS, data: response.data.result.rows });
      dispatch({ type: actions.LOADING, data: false });
    }).catch((error) => {

    });
  },
  cretaeUser: (userData) => (dispatch) => {
    dispatch({ type: actions.LOADING, data: true });
    UsersServices.cretaeUser(userData).then((response) => {
      //dispatch({ type: actions.GET_ALL_USERS, data: response.data.result.rows });
      dispatch({ type: actions.LOADING, data: false });
    }).catch((error) => {

    });
  }
};
