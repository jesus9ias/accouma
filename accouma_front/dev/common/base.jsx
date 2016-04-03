import React from 'react'
import {AppBar} from 'material-ui';

class Base extends React.Component {
  render() {
    return (
      <section className={this.props.section}>
        <AppBar title="Accouma" iconClassNameRight="muidocs-icon-navigation-expand-more"/>
        <section className="content">
          {this.props.children}
        </section>
      </section>
    )
  }
}

export default Base
