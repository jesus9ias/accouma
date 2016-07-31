import { combineReducers } from 'redux'
import general from './generalReducer';
import users from './usersReducer';
import accounts from './accountsReducer';

const theApp = combineReducers({
  general,
  users,
  accounts
})

export default theApp
