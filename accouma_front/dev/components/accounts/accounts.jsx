import React from 'react';
import { Link } from 'react-router';
import { connect } from 'react-redux';
import {
  Row,
  Col,
  Card
} from 'react-materialize';
import { getAll } from '../../redux/actions/accountsActions';
import AccountsServices from '../../services/AccountsServices';

class Accounts extends React.Component {
  constructor(props) {
    super(props);
    this.getAccounts();
  }

  getAccounts() {
    AccountsServices.getAccounts().then((response) => {
      console.log(response);
      this.props.getAllAccounts(response.data.result.rows);
    }).catch((error) => {

    });
  }

  render() {
    const currentChild = (this.props.children != null) ?
      this.props.children.type.displayName
    :
      'undefined';
    return (
      <div className="general-block">
        <div>
          {currentChild === 'NewRegister' ? this.props.children : null}
        </div>
        <div className="general-cards">
          <Row>
            {
              this.props.listado.map((account, i) => {
                return (
                  <Col key={i} s={12} m={4}>
                    <Card
                      className="blue-grey darken-1 general-card"
                      textClassName="white-text"
                      title={account.name}
                      actions={[
                        <Link
                          key={1}
                          className="general-cardIconButton waves-effect btn-flat"
                          to={'/accounts/${account.id}'}
                        >
                          <i className="material-icons">mode_edit</i>
                        </Link>,
                        <Link
                          key={2}
                          className="general-cardIconButton waves-effect btn-flat"
                          to={'/accounts'}
                        >
                          <i className="material-icons">delete</i>
                        </Link>
                      ]}
                    >
                      <span className="card-content">Hi!</span>
                    </Card>
                  </Col>
                );
              })
            }
          </Row>
        </div>
        <div>
          {currentChild === 'Registers' ? this.props.children : null}
        </div>
      </div>
    );
  }
}

function mapStateToProps(state) {
  return {
    listado: state.myAccounts.accounts
  };
}

const mapDispatchToProps = (dispatch) => {
  return {
    getAllAccounts: (data) => {
      dispatch(getAll(data));
    }
  };
};

const AccountsContainer = connect(mapStateToProps, mapDispatchToProps)(Accounts);
AccountsContainer.displayName = 'Accounts';
export default AccountsContainer;
