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
    return (
      <div className="general-block">
        {this.props.new}
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
                );
              })
            }
          </Row>
        </div>
        <div>
          {this.props.edit}
        </div>
      </div>
    );
  }
};

export default Accounts;
