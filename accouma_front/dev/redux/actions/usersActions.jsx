import * as actions from '../allTypes';
import UsersServices from '../../services/UsersServices';

export default {
  getAllUsers: () => (dispatch) => {
    dispatch({ type: actions.LOADING_USERS, loading: true });
    UsersServices.getUsers().then((response) => {
      dispatch({ type: actions.GET_ALL_USERS, users: response.data.result.rows });
      dispatch({ type: actions.LOADING_USERS, loading: false });
    }).catch((error) => {

    });
  },
  getOneUser: (id) => (dispatch) => {
    //dispatch({ type: actions.LOADING_USERS, loading: true });
    UsersServices.getUser(id).then((response) => {
      dispatch({ type: actions.GET_ONE_USER, user: response.data.result.row });
      //dispatch({ type: actions.LOADING_USERS, loading: false });
    }).catch((error) => {

    });
  },
  updateOneUser: (id, user) => (dispatch) => {
    UsersServices.updateUser(id, user).then((response) => {
      console.log(response);
      dispatch({ type: actions.UPDATE_ONE_USER });
    }).catch((error) => {

    });
  },
  cretaeUser: (userData) => (dispatch) => {
    dispatch({ type: actions.LOADING_USERS, loading: true });
    UsersServices.cretaeUser(userData).then((response) => {
      //dispatch({ type: actions.GET_ALL_USERS, data: response.data.result.rows });
      dispatch({ type: actions.LOADING_USERS, loading: false });
    }).catch((error) => {

    });
  }
};
