import { combineReducers } from 'redux'
import myUsers from './usersReducer';

const theApp = combineReducers({
  myUsers
})

export default theApp
