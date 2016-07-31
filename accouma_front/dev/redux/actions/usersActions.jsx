import * as actions from '../allTypes';
import UsersServices from '../../services/UsersServices';

/*export function viewAll() {
  return {
    type: VIEW_ALL,
    list: []
  }
}

export function deleteOne(index) {
  return {
    type: DELETE_ONE,
    index: index
  }
}

export function addOne(data) {
  return {
    type: ADD_ONE,
    data: data
  }
}*/

export default {
  getAllUsers: () => (dispatch) => {
    dispatch({ type: actions.LOADING, data: true });
    UsersServices.getUsers().then((response) => {
      dispatch({ type: actions.GET_ALL_USERS, data: response.data.result.rows });
      dispatch({ type: actions.LOADING, data: false });
    }).catch((error) => {

    });
  }
};
