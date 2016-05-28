import React from 'react'
import {Navbar, NavItem, Row, Col} from 'react-materialize'

import MdMenu from 'react-icons/lib/md/menu'

class NavBar extends React.Component {

  render() {
    return (
      <nav className="navBar">
        <div className="navBar-iconContainer">
          <MdMenu size={30} />
        </div>
        <div className="navBar-titleContainer">
          <h1 className="navBar-title">Accouma</h1>
        </div>
        <div className="navBar-optionsContainer">
          <img src="" />
        </div>
      </nav>
    )
  }
}

export default NavBar
