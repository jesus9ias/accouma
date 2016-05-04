import React from 'react'
import { connect } from 'react-redux';
import Base from '../common/base'

class Users extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <Base section="users" >
        <p>Users</p>
        <div>{this.props.listado[0].id}</div>
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
  return {}
}

//export default Users

//export {Users}
//export const UsersContainer = connect( mapStateToProps , mapDispatchToProps )(Users);


let UsersContainer = connect( mapStateToProps , mapDispatchToProps )(Users);
UsersContainer.displayName = "Users";
export default UsersContainer;
