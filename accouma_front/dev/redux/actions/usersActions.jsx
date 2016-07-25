import { VIEW_ALL, DELETE_ONE, ADD_ONE, GET_ALL } from '../actionTypes/usersTypes';
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
  getAll: () => (dispatch) => {
    UsersServices.getUsers().then((response) => {
      dispatch({ type: GET_ALL, data: response.data.result.rows });
    }).catch((error) => {

    });
  }
};
