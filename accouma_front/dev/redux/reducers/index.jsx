import { combineReducers } from 'redux'
import users from './usersReducer';
import myAccounts from './accountsReducer';

const theApp = combineReducers({
  users,
  myAccounts
})

export default theApp
