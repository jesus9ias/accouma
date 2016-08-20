import NewUser from './NewUser';
import { connect } from 'react-redux';
import { usersActions } from '../../redux/actions';

const allActions = Object.assign({}, usersActions);

function mapStateToProps(state) {
  return {};
}

const NewUserContainer = connect(mapStateToProps, allActions)(NewUser);
NewUserContainer.displayName = 'newUsers';
export default NewUserContainer;
