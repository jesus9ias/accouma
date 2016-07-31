import * as actions from '../allTypes';


export default {
  loading: () => (dispatch) => {
    dispatch({ type: actions.LOADING, data: true });
  }
};
