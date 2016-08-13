import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';

import Backdrop from '../../common/Backdrop';

class NewUser extends React.Component {

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
                  id="newUser"
                  ref="newUser"
                  type="text"
                  className="validate login-field"
                />
                <label htmlFor="newUser">User</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="newName"
                  ref="newName"
                  type="text"
                  className="validate login-field"
                />
                <label htmlFor="newName">Names</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="newLastName"
                  ref="newLastName"
                  type="text"
                  className="validate login-field"
                />
                <label htmlFor="newLastName">Last Name</label>
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
                <input
                  type="submit"
                  className="waves-effect waves-light btn"
                  value="Save"
                />
                <input
                  type="submit"
                  className="waves-effect waves-light btn"
                  value="Save and create new"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

export default NewUser;
