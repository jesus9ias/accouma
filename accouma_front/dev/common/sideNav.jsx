import React from 'react'
import {LeftNav} from 'material-ui';

class SideNav extends React.Component {

  constructor(props) {
    super(props);
    this.state = {open: false};
  }

  handleToggle(){
    this.setState({open: !this.state.open});
  }

  handleClose(){
    this.setState({open: false});
  }

  render() {
    return (
      <LeftNav docked={true} width={200} open={this.props.isSideNavOpen} >
        <p>SideNav</p>
      </LeftNav>
    )
  }
}

export default SideNav
