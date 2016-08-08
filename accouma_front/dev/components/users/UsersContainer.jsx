import Users from './Users';
import { connect } from 'react-redux';
import { usersActions } from '../../redux/actions';

const allActions = Object.assign({}, usersActions);

allActions.getAllUsers();

function mapStateToProps(state, ownProps) {
  return {
    users: state.users.users
  };
}

const UsersContainer = connect(mapStateToProps, allActions)(Users);
UsersContainer.displayName = 'users';
export default UsersContainer;
