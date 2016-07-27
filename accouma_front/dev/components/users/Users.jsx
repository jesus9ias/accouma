import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';

class Users extends React.Component {
  constructor(props) {
    super(props);
  }

  componentWillMount(){
    this.props.getAll();
  }

  render() {
    return (
      <div className="general-block">
        <div className="cards">
          <Row>
            {
              this.props.users.map((user, i) => {
                return (
                  <Col key={i} s={12} m={4}>
                    <Card
                      className="blue-grey darken-1 card"
                      textClassName="white-text"
                      title={user.names}
                      actions={[
                        <Link
                          key={1}
                          className="card-icon-button waves-effect btn-flat"
                          to={'/users'}
                        >
                          <i className="material-icons">mode_edit</i>
                        </Link>,
                        <Link
                          key={2}
                          className="card-icon-button waves-effect btn-flat"
                          to={'/users'}
                        >
                          <i className="material-icons">delete</i>
                        </Link>
                      ]}
                    >
                      <span className="card-content">
                        Hi!
                      </span>
                    </Card>
                  </Col>
                );
              })
            }
          </Row>
        </div>
      </div>
    );
  }
}

export default Users;