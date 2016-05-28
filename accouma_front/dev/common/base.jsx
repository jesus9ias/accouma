import React from 'react'

import NavBar from '../navBar/NavBar'

class Base extends React.Component {

  render() {
    return (
      <section className={this.props.section}>
        <NavBar />
        <section className="general-content">
          {this.props.children}
        </section>
      </section>
    )
  }
}

export default Base
