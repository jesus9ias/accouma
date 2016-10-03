import EditUser from './EditUser';
import { connect } from 'react-redux';
import { usersActions } from '../../redux/actions';

const allActions = Object.assign({}, usersActions);

function mapStateToProps(state) {
  let user = {};
  user = state.users.get('user');

  return {
    user
  };
}

const EditUserContainer = connect(mapStateToProps, allActions)(EditUser);
EditUserContainer.displayName = 'editUser';
export default EditUserContainer;
