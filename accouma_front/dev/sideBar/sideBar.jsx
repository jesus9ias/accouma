import React from 'react'
import {Link} from 'react-router'
import {Navbar, NavItem, Row, Col} from 'react-materialize'

class SideBar extends React.Component {

  render() {
    return (
      <aside className="sideBar">
        <Link className="sideBar-icon" to={'/users'}><i className="material-icons">group</i></Link>
        <Link className="sideBar-icon" to={'/accounts'}><i className="material-icons">attach_money</i></Link>
        <Link className="sideBar-icon" to={'/registers'}><i className="material-icons">event_note</i></Link>
      </aside>
    )
  }
}

export default SideBar
