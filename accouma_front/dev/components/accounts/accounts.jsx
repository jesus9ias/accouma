import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';
import VoidState from '../../common/VoidState';
import InnerLoader from '../../common/InnerLoader';

class Accounts extends React.Component {
  constructor(props) {
    super(props);
    this.state = { voidState: false };
  }

  componentWillMount() {
    this.props.getAllAccounts();
  }

  componentWillReceiveProps(nextProps) {
    if (nextProps.accounts.length === 0) {
      this.setState({ voidState: true });
    } else {
      this.setState({ voidState: false });
    }
  }

  render() {
    return (
      <div className="general-block">
        {this.props.new}
        <div className="cards">
          <Row>
            {
              this.props.accounts.map(
                (account, i) => (
                  <Col key={i} s={12} m={4}>
                    <Card
                      className="darken-1 general-card"
                      textClassName="white-text"
                      title={account.name}
                      actions={[
                        <Link
                          key={1}
                          className="general-cardicon-button waves-effect btn-flat"
                          to={`/accounts/${account.id}`}
                        >
                          <i className="material-icons">mode_edit</i>
                        </Link>,
                        <Link
                          key={2}
                          className="general-cardicon-button waves-effect btn-flat"
                          to={'/accounts'}
                        >
                          <i className="material-icons">delete</i>
                        </Link>
                      ]}
                    >
                      <span className="card-content">Hi!</span>
                    </Card>
                  </Col>
                )
              )
            }
            <VoidState show={this.state.voidState} message="There is no accounts">
              <Link
                to={'/accounts/new'}
                className="btn-large waves-effect waves-light red"
              >
                Add one Account
              </Link>
            </VoidState>
          </Row>
        </div>
        <div>
          {this.props.edit}
        </div>
        <InnerLoader />
      </div>
    );
  }
}

Accounts.propTypes = {
  getAllAccounts: React.PropTypes.func.isRequired,
  new: React.PropTypes.element,
  edit: React.PropTypes.element,
  accounts: React.PropTypes.array
};

export default Accounts;
