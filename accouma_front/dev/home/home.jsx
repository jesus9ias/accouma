import React from 'react'
import Base from '../common/base'
import {Link} from 'react-router'

class Home extends React.Component {
  render() {
    return (
      <Base section="home" >
        <p>Hi!</p>
        <Link to={'/users'}>Users</Link>
      </Base>
    )
  }
}

export default Home
