import React from 'react'
import {Card, TextInput, Button} from 'Belle'

class Base extends React.Component {

  render() {
    return (
      <section className={this.props.section}>
        <Card>
          <h1>Accouma</h1>
        </Card>
        <section className="content">
          {this.props.children}
        </section>
      </section>
    )
  }
}

export default Base
