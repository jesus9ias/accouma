import React from 'react'
import {Link} from 'react-router'
import { connect } from 'react-redux'

import {getAll} from '../redux/actions/usersActions'

import {Card, TextInput, Button} from 'Belle'
import MdArrowForward from 'react-icons/lib/md/arrow-forward'
import MdEdit from 'react-icons/lib/md/edit'
import MdDelete from 'react-icons/lib/md/delete'

import Base from '../common/base'
import UsersServices from '../services/UsersServices'
import {InputP, CardP} from '../common/styleProperties'

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
    let CardS = CardP();
    return (
      <Base section="users" >
        <div className="general-block">
          <p>Users</p>
          <div className="general-cards">
            {
              this.props.listado.map((user, i) => {
                return (
                  <Card key={i} className="general-card" style={CardS}>
                    <h2 className="general-cardTitle">{user.names}</h2>
                    <Link className="general-cardLink" to={'/users'}><MdEdit /></Link>
                    <Link className="general-cardLink" to={'/users'}><MdDelete /></Link>
                  </Card>
                )
              })
            }
          </div>
        </div>
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
