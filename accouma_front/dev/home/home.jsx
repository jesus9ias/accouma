import React from 'react'
import {Link} from 'react-router'

import {Row, Col, Card} from 'react-materialize'

import Base from '../common/base'

class Home extends React.Component {
  render() {
    return (
      <Base section="home" >
        <div className="general-block">
          <div className="general-cards">
            <Row>
              <Col s={12} m={4}>
                <Card className='blue-grey darken-1 general-card' textClassName='white-text' title="Users" actions={[
                    <Link key={1} className="general-cardIconButton waves-effect btn-flat" to={'/users'}><i className="material-icons">arrow_forward</i></Link>
                  ]}>
                  <span className="card-content">
                    Hi!
                  </span>
                </Card>
              </Col>
              <Col s={12} m={4}>
                <Card className='blue-grey darken-1 general-card' textClassName='white-text' title="Accounts" actions={[
                    <Link key={1} className="general-cardIconButton waves-effect btn-flat" to={'/accounts'}><i className="material-icons">arrow_forward</i></Link>
                  ]}>
                  <span className="card-content">
                    Hi!
                  </span>
                </Card>
              </Col>
              <Col s={12} m={4}>
                <Card className='blue-grey darken-1 general-card' textClassName='white-text' title="Registers" actions={[
                    <Link key={1} className="general-cardIconButton waves-effect btn-flat" to={'/registers'}><i className="material-icons">arrow_forward</i></Link>
                  ]}>
                  <span className="card-content">
                    Hi!
                  </span>
                </Card>
              </Col>
            </Row>
          </div>
        </div>
      </Base>
    )
  }
}

export default Home
