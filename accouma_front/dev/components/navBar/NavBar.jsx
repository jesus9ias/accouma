import React from 'react';
import { Link } from 'react-router';
import {
  Navbar,
  NavItem,
  Row,
  Col,
  Dropdown,
  Button
} from 'react-materialize';
import { MegaSidenav } from 'react-mega-sidenav';

class NavBar extends React.Component {

  constructor(props) {
    super(props);
    this.state = {
      isOpenSidenav: false
    }
    this.openSidenav = this.openSidenav.bind(this);
    this.closeSidenav = this.closeSidenav.bind(this);
  }

  openSidenav() {
    this.setState({isOpenSidenav: true});
  }

  closeSidenav() {
    this.setState({isOpenSidenav: false});
  }

  render() {
    return (
      <nav className="navbar">
        <div className="navbar-icon-container">
          <a onClick={this.openSidenav}><i className="material-icons large">more_horiz</i></a>
          <MegaSidenav
            title="Accouma"
            items={[]}
            open={this.state.isOpenSidenav}
            close={this.closeSidenav}
            useClose={true}
            backdrop={true}
            orientation={'left'}
            headStyles={{color: 'black'}}
          >
            <Link
              className="sidebar-icon"
              to={'/users'}
            >
              <p><i className="material-icons">group</i> Users</p>
            </Link>
            <Link
              className="sidebar-icon"
              to={'/accounts'}
            >
              <p><i className="material-icons">attach_money</i></p>
            </Link>
            <Link
              className="sidebar-icon"
              to={'/registers'}
            >
              <p><i className="material-icons">event_note</i></p>
            </Link>
          </MegaSidenav>
        </div>
        <div className="navbar-title-container">
          <Link to={'/'}><h1 className="navbar-title">Accouma</h1></Link>
        </div>
        <div className="navbar-options-container">
          <a><i className="material-icons">add</i></a>
          <Link
            className="navbar-icon"
            to={'/me'}
          >
            <p><i className="material-icons">face</i>
          </Link>
        </div>
      </nav>
    );
  }
}

export default NavBar;
