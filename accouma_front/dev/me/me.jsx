import React from 'react'
import {Link} from 'react-router'
import { connect } from 'react-redux'

import {Tabs, Tab} from 'react-materialize'

class Me extends React.Component {

  render() {
    return (
      <div className="general-block">
        <Tabs className='tab-demo z-depth-1'>
          <Tab title="Personal data" active>Personal data here</Tab>
          <Tab title="Password">Password here</Tab>
        </Tabs>
      </div>
    )
  }
}

Me.displayName = "Me";
export default Me;
