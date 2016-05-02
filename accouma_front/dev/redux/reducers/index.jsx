import { combineReducers } from 'redux'
import users from './usersReducer';

const theApp = combineReducers({
  users
})

export default theApp
