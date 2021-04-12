import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import Manage from './Manage';

const MenuStyle = {
	float:'left',
	width:'15%',
	height:'100%',
	background:'red',
	position:'relative',
	left: '0px'
};

const ContentStyle = {
	height:'100%'
};

const ProStyle = {
	height:'100%',
	background:'yellow'
}

class ProfileAdmin extends Component{
	render(){
		return <div>Profile Admin</div>;
	}
}

class AdminMenu extends Component{
	constructor(props) {
    	super(props);    	   
    	 this.handleProfile = this.handleProfile.bind(this);
    	 this.handleApp = this.handleApp.bind(this);
  	}

	handleProfile(){	
		var screen = <ProfileAdmin parentContext={this.props.parentContext} />;
		this.props.parentContext.setState({right: screen});				
	}

	handleApp(){
		var screen = <Manage parentContext={this.props.parentContext} entity='app' />;
		this.props.parentContext.setState({right: screen});
	}

	logout(){
		alert('logout');
	}

	render(){
		return <div style={MenuStyle} align='left'>			
			<a onClick={this.handleProfile}><img alt="profile" src={require("./img/profile.png")} width="40px" height="40px" />Profil</a>
			<br/>	
			<a onClick={this.handleApp}><img alt="app" src={require("./img/app.png")} width="40px" height="40px" />Sections</a>
			<br/>	
			<a onClick={this.logout}><img alt="logout" src={require("./img/logout.png")} width="40px" height="40px" />Logout</a>
			<br/>	
		</div>;
	}
}


class AdminContent extends Component{
	render(){
		return <div style={ContentStyle}>Coucou</div>;
	}
}



class AdminScreen extends Component{
	constructor(props){    
	    super(props);
	    this.state={
	      left:null,
	      right:null
	    }
	}
 	componentWillMount(){     		
    	var rightPage = <AdminContent parentContext={this.props.parentContext} />;    	
    	var leftPage =  <AdminMenu parentContext={this} />;		
    	this.setState({left : leftPage})
    	this.setState({right : rightPage})
  	}

	render(){			
		return <MuiThemeProvider>
			<div style={ProStyle}>				
				{this.state.left}
				{this.state.right}			
			</div>
			</MuiThemeProvider>;
	}
}

export default AdminScreen;