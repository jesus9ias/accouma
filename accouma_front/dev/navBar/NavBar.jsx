import React from 'react'
import {Link} from 'react-router'
import {Navbar, NavItem, Row, Col, Dropdown, Button} from 'react-materialize'

class NavBar extends React.Component {

  render() {
    return (
      <nav className="navBar">
        <div className="navBar-iconContainer">
          <i className="material-icons large">more_horiz</i>
        </div>
        <div className="navBar-titleContainer">
          <Link to={'/'}><h1 className="navBar-title">Accouma</h1></Link>
        </div>
        <div className="navBar-optionsContainer">
          <Dropdown className="navBar-icon navBar-menu" overorigin={false} trigger={
            <a><i className="material-icons">add</i></a>
          }>
            <NavItem>User</NavItem>
            <NavItem href="accounts/new">Account</NavItem>
          </Dropdown>
          <Link className="navBar-icon" to={'/me'}><i className="material-icons">face</i></Link>
        </div>
      </nav>
    )
  }
}

export default NavBar
