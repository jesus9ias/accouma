import React from 'react';
import { Link, browserHistory } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';

import Backdrop from '../../common/Backdrop';

class NewUser extends React.Component {

  constructor(props) {
    super(props);
    this.createUser = this.createUser.bind(this);
    this.createUserAndStay = this.createUserAndStay.bind(this);
  }

  clearForm() {
    this.refs.newNick.value = '';
    this.refs.newNames.value = '';
    this.refs.newLastNames.value = '';
    this.refs.newEmail.value = '';
  }

  makeUserData() {
    let userData = {
      nick: this.refs.newNick.value,
      names: this.refs.newNames.value,
      lastNames: this.refs.newLastNames.value,
      email: this.refs.newEmail.value
    }
    return userData;
  }

  createUser() {
    this.props.cretaeUser(this.makeUserData());
    browserHistory.push('/users');
  }

  createUserAndStay() {
    this.props.cretaeUser(this.makeUserData());
    this.clearForm();
  }

  render() {
    return (
      <section className="section-overlay user-new">
        <Backdrop />
        <div className="section-overlay-content">
          <div className="section-overlay-head">
            <h2 className="section-overlay-title">New user</h2>
            <Link className="section-overlay-close" to={'/users'}>
              <i className="material-icons medium">close</i>
            </Link>
          </div>
          <div className="section-overlay-body ">
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="newNick"
                  ref="newNick"
                  type="text"
                  className="validate login-field"
                />
              <label htmlFor="newNick">User</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="newNames"
                  ref="newNames"
                  type="text"
                  className="validate login-field"
                />
              <label htmlFor="newNames">Names</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="newLastNames"
                  ref="newLastNames"
                  type="text"
                  className="validate login-field"
                />
              <label htmlFor="newLastNames">Last Name</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="newEmail"
                  ref="newEmail"
                  type="text"
                  className="validate login-field"
                />
                <label htmlFor="newEmail">E-Mail</label>
              </div>
            </div>
          </div>
          <div className="section-overlay-footer">
            <div className="row">
              <div className="col s12">
                <button
                  type="button"
                  className="waves-effect waves-light btn"
                  onClick={this.createUser}
                >
                  Save
                </button>
                <button
                  type="button"
                  className="waves-effect waves-light btn"
                  onClick={this.createUserAndStay}
                >
                  Save and create new
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

export default NewUser;
