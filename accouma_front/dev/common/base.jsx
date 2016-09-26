import React from 'react';
import NavBar from '../components/navBar/NavBar';
import SideBar from '../components/sideBar/SideBar';

class Base extends React.Component {

  render() {
    return (
      <section className={this.props.section}>
        <NavBar />
        <div className="general-section">
          <SideBar />
          <section className="general-content">
            {this.props.children}
          </section>
        </div>
      </section>
    );
  }
}

Base.propTypes = {
  section: React.PropTypes.string.isRequired,
  children: React.PropTypes.element
};

export default Base;
