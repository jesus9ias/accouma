import React from 'react'
import {AppBar, IconButton, RaisedButton, FlatButton, NavigationClose} from 'material-ui';
import SideNav from '../common/sideNav'

class Base extends React.Component {

  constructor(props) {
    super(props);
    this.state = {isSideNavOpen: false};
  }

  toggleSideNav(){
    this.setState({isSideNavOpen: !this.state.isSideNavOpen});
  }

  handleTouchTap(){
    alert('yes');
  }

  render() {
    return (
      <section className={this.props.section}>
        <AppBar title="Accouma" iconElementRight={<FlatButton onClick={this.toggleSideNav.bind(this)} label="SideNav" />} >

        </AppBar>
        <IconButton iconClassName="muidocs-icon-navigation-expand-more" onClick={this.toggleSideNav.bind(this)} />
        <SideNav isSideNavOpen={this.state.isSideNavOpen} toggleSideNav={this.toggleSideNav.bind(this)} />
        <section className="content">
          {this.props.children}
        </section>
      </section>
    )
  }
}

export default Base
