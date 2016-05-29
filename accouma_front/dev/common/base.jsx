import React from 'react'

import NavBar from '../navBar/NavBar'
import SideBar from '../sideBar/SideBar'

class Base extends React.Component {

  render() {
    return (
      <section className={this.props.section}>
        <NavBar />
        <div className="general-section">
          <SideBar />
          <section className="general-content">
            {this.props.children}
          </section>
        </div>
      </section>
    )
  }
}

export default Base
