import { VIEW_ALL, DELETE_ONE, ADD_ONE } from '../actionTypes/usersTypes'
import * as IS from '../INITIAL_STATE'

const initialState = {
  users: IS.users
}

function myUsers(state = initialState, action) {
  switch (action.type) {
    case ADD_ONE:
      action.data.id = state.users.length + 1;
      return Object.assign({}, state, {
        users: [
          ...state.users,
          action.data
        ]
      })
    case DELETE_ONE:
      return Object.assign({}, state, {
        users: state.users.map((p) => {
          if(p.id === action.index) {
            return Object.assign({}, p, {
              status: 2
            })
          }
          return p
        })
      })
    default:
      return state
  }
}


export default myUsers;
