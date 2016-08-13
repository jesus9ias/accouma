import * as actions from '../allTypes';
import * as IS from '../INITIAL_STATE';

const initialState = {
  accounts: IS.accounts
};

export default (state = initialState, action) => {
  switch (action.type) {
    case actions.GET_ALL_ACCOUNTS:
      return {
        accounts: action.data
      };
    default:
      return state;
  }
}
