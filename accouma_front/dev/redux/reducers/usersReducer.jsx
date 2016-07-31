import * as actions from '../allTypes'
import * as IS from '../INITIAL_STATE'

const initialState = {
  users: IS.users
}

export default (state = initialState, action) => {
  switch (action.type) {
    case actions.ADD_ONE_USER:
      action.data.id = state.users.length + 1;
      return Object.assign({}, state, {
        users: [
          ...state.users,
          action.data
        ]
      })
    case actions.DELETE_ONE_USER:
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
    case actions.GET_ALL_USERS:
      return {
        users: action.data
      }
    default:
      return state
  }
};
