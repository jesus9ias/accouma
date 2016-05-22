import React from 'react'
import { connect } from 'react-redux'
import Base from '../common/base'
import {getAll} from '../redux/actions/usersActions'
import UsersServices from '../services/UsersServices'
//import {ajax} from '../common/ajax'

class Users extends React.Component {
  constructor(props) {
    super(props);
    this.getUsers();
  }

  getUsers(){
    UsersServices.getUsers().then((response)=>{
      console.log(response);
      this.props.getAllUsers(response.data.result.rows);
    }).catch((error)=>{

    });
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
