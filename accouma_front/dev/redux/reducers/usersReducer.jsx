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
    default:
      return state;
  }
};
