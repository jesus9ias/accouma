import React from 'react'
import {Link} from 'react-router'
import {Navbar, NavItem, Row, Col, Dropdown, Button} from 'react-materialize'

class NavBar extends React.Component {

  render() {
    return (
      <nav className="navbar">
        <div className="navbar-icon-container">
          <i className="material-icons large">more_horiz</i>
        </div>
        <div className="navbar-title-container">
          <Link to={'/'}><h1 className="navbar-title">Accouma</h1></Link>
        </div>
        <div className="navbar-options-container">
          <Dropdown className="navbar-icon navbar-menu" overorigin={false} trigger={
            <a><i className="material-icons">add</i></a>
          }>
            <NavItem>User</NavItem>
            <NavItem href="accounts/new">Account</NavItem>
          </Dropdown>
          <Link className="navbar-icon" to={'/me'}><i className="material-icons">face</i></Link>
        </div>
      </nav>
    )
  }
}

export default NavBar
