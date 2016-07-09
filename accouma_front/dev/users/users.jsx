import React from 'react';
import { Link } from 'react-router';
import { connect } from 'react-redux';
import { Row,
  Col,
  Card
} from 'react-materialize';
import { getAll } from '../redux/actions/usersActions';
import UsersServices from '../services/UsersServices';

class Users extends React.Component {
  constructor(props) {
    super(props);
    this.getUsers();
  }

  getUsers() {
    UsersServices.getUsers().then((response) => {
      console.log(response);
      this.props.getAllUsers(response.data.result.rows);
    }).catch((error) => {

    });
  }

  render() {
    return (
      <div className="general-block">
        <div className="cards">
          <Row>
            {
              this.props.listado.map((user, i) => {
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
                )
              })
            }
          </Row>
        </div>
      </div>
    )
  }
}

function mapStateToProps(state){
  return {
    listado: state.myUsers.users
  };
}

const mapDispatchToProps = (dispatch) => {
  return {
    getAllUsers: (data) => {
      dispatch(getAll(data));
    }
  };
};

const UsersContainer = connect(mapStateToProps, mapDispatchToProps)(Users);
UsersContainer.displayName = 'Users';
export default UsersContainer;
