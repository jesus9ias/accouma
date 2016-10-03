import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';
import VoidState from '../../common/VoidState';
import UsersLoader from './UsersLoader';

class Users extends React.Component {
  constructor(props) {
    super(props);
  }

  componentWillMount() {
    this.props.getAllUsers();
  }

  render() {
    return (
      <div className="general-block">
        {this.props.new}
        <div className="cards">
          <Row>
            {
              this.props.users.map(
                (user, i) => (
                  <Col key={i} s={12} m={4}>
                    <Card
                      className=" darken-1 card"
                      textClassName="white-text"
                      title={user.names}
                      actions={[
                        <Link
                          key={1}
                          className="general-cardicon-button waves-effect btn-flat"
                          to={`/users/${user.id}`}
                        >
                          <i className="material-icons">mode_edit</i>
                        </Link>,
                        <Link
                          key={2}
                          className="general-cardicon-button waves-effect btn-flat"
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
                )
              )
            }
            <VoidState show={this.props.voidState} message="There is no users">
              <Link
                to={'/users/new'}
                className="btn-large waves-effect waves-light red"
              >
                Add one User
              </Link>
            </VoidState>
          </Row>
          <Link
            to={'/users/new'}
            className="button button-add btn-floating btn-large waves-effect waves-light red"
          >
            <i className="material-icons">add</i>
          </Link>
        </div>
        {this.props.edit}
        <UsersLoader />
      </div>
    );
  }
}

Users.propTypes = {
  getAllUsers: React.PropTypes.func.isRequired,
  voidState: React.PropTypes.bool.isRequired,
  new: React.PropTypes.element,
  edit: React.PropTypes.element,
  users: React.PropTypes.array
};

export default Users;
