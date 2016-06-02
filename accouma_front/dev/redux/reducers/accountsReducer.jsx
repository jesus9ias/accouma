import { VIEW_ALL, DELETE_ONE, ADD_ONE, GET_ALL } from '../actionTypes/accountsTypes'
import * as IS from '../INITIAL_STATE'

const initialState = {
  accounts: IS.accounts
}

function myAccounts(state = initialState, action) {
  switch (action.type) {
    case ADD_ONE:
      action.data.id = state.accounts.length + 1;
      return Object.assign({}, state, {
        accounts: [
          ...state.accounts,
          action.data
        ]
      })
    case DELETE_ONE:
      return Object.assign({}, state, {
        accounts: state.accounts.map((p) => {
          if(p.id === action.index) {
            return Object.assign({}, p, {
              status: 2
            })
          }
          return p
        })
      })
    case GET_ALL:
      return Object.assign({}, state, {
        accounts: action.data
      })
    default:
      return state
  }
}


export default myAccounts;
