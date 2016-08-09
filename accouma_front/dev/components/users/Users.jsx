import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';
import VoidState from '../../common/VoidState';

class Users extends React.Component {
  constructor(props) {
    super(props);
    this.state = {'voidState': false};
  }

  componentWillMount(){
    this.props.getAllUsers();
  }

  componentWillReceiveProps(nextProps){
    if (nextProps.users.length == 0) {
      this.setState({'voidState': true});
    }else{
        this.setState({'voidState': false});
    }
  }

  render() {
    return (
      <div className="general-block">
        {this.props.new}
        <div className="cards">
          <Row>
            {
              this.props.users.map((user, i) => {
                return (
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
                );
              })
            }
            <VoidState show={this.state.voidState} message="There is no users">
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
      </div>
    );
  }
}

export default Users;
