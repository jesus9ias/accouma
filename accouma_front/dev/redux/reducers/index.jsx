import { combineReducers } from 'redux';
import general from './generalReducer';
import users from './usersReducer';
import accounts from './accountsReducer';

export default combineReducers({
  general,
  users,
  accounts
});
