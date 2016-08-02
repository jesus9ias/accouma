import Accounts from './Accounts';
import { connect } from 'react-redux';
import { accountsActions } from '../../redux/actions';

const allActions = Object.assign({}, accountsActions);

function mapStateToProps(state, ownProps) {
  return {
    accounts: state.accounts.accounts
  };
}

const AccountsContainer = connect(mapStateToProps, allActions)(Accounts);
AccountsContainer.displayName = 'accounts';
export default AccountsContainer;
