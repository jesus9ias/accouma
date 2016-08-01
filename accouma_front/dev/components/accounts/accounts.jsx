import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';

class Accounts extends React.Component {
  constructor(props) {
    super(props);
  }

  componentWillMount(){
    this.props.getAllAccounts();
  }

  render() {
    const currentChild = (this.props.children != null) ?
      this.props.children.type.displayName
    :
      'undefined';
    return (
      <div className="general-block">
        <div className="cards">
          <Row>
            {
              this.props.accounts.map((account, i) => {
                return (
                  <Col key={i} s={12} m={4}>
                    <Card
                      className="darken-1 general-card"
                      textClassName="white-text"
                      title={account.name}
                      actions={[
                        <Link
                          key={1}
                          className="general-cardicon-button waves-effect btn-flat"
                          to={'/accounts/${account.id}'}
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
};

export default Accounts;
