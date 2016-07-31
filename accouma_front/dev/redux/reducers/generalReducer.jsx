import * as actions from '../allTypes'
import * as IS from '../INITIAL_STATE'

const initialState = {
  loading: IS.loading
}

export default (state = initialState, action) => {
  switch (action.type) {
    case actions.LOADING:
      return {
        loading: action.data
      }
    default:
      return state
  }
};
