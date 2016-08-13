import * as actions from '../allTypes';
import * as IS from '../INITIAL_STATE';

const initialState = {
  users: IS.users
};

export default (state = initialState, action) => {
  switch (action.type) {
    case actions.GET_ALL_USERS:
      return {
        users: action.data
      };
    default:
      return state;
  }
};
