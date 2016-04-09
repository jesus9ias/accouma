import React from 'react'
import {Card, TextInput, Button} from 'Belle'
import {CardP} from '../common/styleProperties'

class Base extends React.Component {

  render() {
    return (
      <section className={this.props.section}>
        <Card style={CardP()}>
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
