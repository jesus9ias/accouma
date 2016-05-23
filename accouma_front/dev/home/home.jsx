import React from 'react'
import {Link} from 'react-router'

import {Card, TextInput, Button} from 'Belle'
import MdArrowForward from 'react-icons/lib/md/arrow-forward'

import Base from '../common/base'
import {InputP, CardP} from '../common/styleProperties'

class Home extends React.Component {
  render() {
    let CardS = CardP();
    return (
      <Base section="home" >
        <div className="general-block">
          <div className="general-cards">
            <Card className="general-card" style={CardS}>
              <h2 className="general-cardTitle">Users</h2>
              <Link className="general-cardLink" to={'/users'}><MdArrowForward /></Link>
            </Card>
            <Card className="general-card" style={CardS}>
              <h2 className="general-cardTitle">Registers</h2>
              <Link className="general-cardLink" to={'/registers'}><MdArrowForward /></Link>
            </Card>
            <Card className="general-card" style={CardS}>
              <h2 className="general-cardTitle">Accounts</h2>
              <Link className="general-cardLink" to={'/accounts'}><MdArrowForward /></Link>
            </Card>

          </div>
        </div>
      </Base>
    )
  }
}

export default Home
