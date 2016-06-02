import { combineReducers } from 'redux'
import myUsers from './usersReducer';
import myAccounts from './accountsReducer';

const theApp = combineReducers({
  myUsers,
  myAccounts
})

export default theApp
