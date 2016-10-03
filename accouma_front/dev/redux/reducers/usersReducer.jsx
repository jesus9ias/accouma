import { Map, fromJS } from 'immutable';
import * as actions from '../allTypes';
import * as IS from '../INITIAL_STATE';

const initialState = Map({
  users: IS.users,
  user: {},
  loading: false
});

export default (state = initialState, action) => {
  switch (action.type) {
    case actions.LOADING_USERS:
      return state.update('loading', value => action.loading);
    case actions.GET_ALL_USERS:
      return state.update('users', value => action.users);
    case actions.GET_ONE_USER:
      return state.update('user', value => action.user);
    case actions.UPDATE_ONE_USER:
      return state.update('users', (value) => {
        let users = state.get('users');
        users.forEach( (usr, index) => {
          if (users[index].id == action.user.id) {
            users[index] = action.user;
          }
        });
        return users;
      });
    default:
      return state;
  }
};
