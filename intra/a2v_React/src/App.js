import React, { Component } from 'react';
import './App.css';

import AdminScreen from './AdminScreen';
import ProScreen from './ProScreen';
import LoginScreen from './LoginScreen';
import Header from './Header'
import Footer from './Footer'
var rest = require('restler');
var cors = require('cors');


class App extends Component {
  constructor(props){    
    super(props);
    this.state={
      contentPage:null
    }
  }

  componentWillMount(){     
    var contentPage = <LoginScreen parentContext={this} />;
    this.setState({contentPage : contentPage})
  }

  render() {
    return (        
      <div className="App">        
        <Header />
        <div className="Content">        
          {this.state.contentPage}        
        </div>
        <Footer />
      </div>
    );
  }
}

export default App;
