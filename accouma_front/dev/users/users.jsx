import React from 'react'
import {Link} from 'react-router'
import { connect } from 'react-redux'

import {Row, Col, Card} from 'react-materialize'

import {getAll} from '../redux/actions/usersActions'

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
            <Row>
              {
                this.props.listado.map((user, i) => {
                  return (
                    <Col key={i} s={12} m={4}>
                      <Card className='blue-grey darken-1 general-card' textClassName='white-text' title={user.names} actions={[
                          <Link key={1} className="general-cardIconButton waves-effect btn-flat" to={'/users'}><MdEdit size={30} /></Link>,
                          <Link key={2} className="general-cardIconButton waves-effect btn-flat" to={'/users'}><MdDelete size={30} /></Link>
                        ]}>
                        <span className="card-content">
                          Hola
                        </span>
                      </Card>
                    </Col>
                  )
                })
              }
            </Row>
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
