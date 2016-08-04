import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';

class NewAccount extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="user-new">
        New account
      </div>
    );
  }
}

export default NewAccount;
