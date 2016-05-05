import React from 'react'
import { connect } from 'react-redux';
import Base from '../common/base'
import {getAll} from '../redux/actions/usersActions';
import {ajax} from '../common/ajax'

class Users extends React.Component {
  constructor(props) {
    super(props);
    this.getUsers();
  }

  getUsers(){
    ajax('http://localhost:8000/api/v1/users', 'GET', {}, function(data) {
      console.log(data);
      this.props.getAllUsers(data.result.rows);
    }.bind(this), function(xhr, status, err){
      console.error(xhr);
    }.bind(this));
  }

  render() {
    return (
      <Base section="users" >
        <p>Users</p>
        {
          this.props.listado.map((user, i) => {
            return (<p key={i}>{user.names}</p>)
          })
        }
      </Base>
    )
  }
}

function mapStateToProps(state){
  return {
    listado: state.myUsers.users
  }
}

const mapDispatchToProps = (dispatch) => {
  return {
    getAllUsers: (data) => {
      dispatch(getAll(data))
    }
  }
}

let UsersContainer = connect( mapStateToProps , mapDispatchToProps )(Users);
UsersContainer.displayName = "Users";
export default UsersContainer;
