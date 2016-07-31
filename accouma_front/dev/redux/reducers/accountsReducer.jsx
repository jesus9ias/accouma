import * as actions from '../allTypes'
import * as IS from '../INITIAL_STATE'

const initialState = {
  accounts: IS.accounts
}

export default (state = initialState, action) => {
  switch (action.type) {
    case actions.ADD_ONE_ACCOUNT:
      action.data.id = state.accounts.length + 1;
      return Object.assign({}, state, {
        accounts: [
          ...state.accounts,
          action.data
        ]
      })
    case actions.DELETE_ONE_ACCOUNT:
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
    case actions.GET_ALL_ACCOUNTS:
      return {
        accounts: action.data
      }
    default:
      return state
  }
}
