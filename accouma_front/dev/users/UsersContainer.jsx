import Users from './Users';
import { connect } from 'react-redux';
import { usersActions } from '../redux/actions';

const allActions = Object.assign({}, usersActions);

function mapStateToProps(state, ownProps) {
  return {
    users: state.users.users
  };
}

const UsersContainer = connect(mapStateToProps, allActions)(Users);
export default UsersContainer;
