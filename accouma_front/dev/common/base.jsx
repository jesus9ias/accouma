import React from 'react'
import {AppBar, RaisedButton} from 'material-ui';
import SideNav from '../common/sideNav'

class Base extends React.Component {

  constructor(props) {
    super(props);
    this.state = {isSideNavOpen: false};
  }

  toggleSideNav(){
    alert('ok');
    //this.setState({isSideNavOpen: !this.state.isSideNavOpen});
  }

  handleTouchTap(){
    alert('yes');
  }

  render() {
    return (
      <section className={this.props.section}>
        <AppBar title="Accouma" onLeftIconButtonTouchTap={this.toggleSideNav.bind(this)} onTitleTouchTap={this.handleTouchTap} iconClassNameRight="muidocs-icon-navigation-expand-more"></AppBar>
        <SideNav isSideNavOpen={this.state.isSideNavOpen} toggleSideNav={this.toggleSideNav.bind(this)} />
        <section className="content">
          {this.props.children}
        </section>
      </section>
    )
  }
}

export default Base
