import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';

import AdminScreen from './AdminScreen';
import ProScreen from './ProScreen';
import AdminConsumer from './AdminConsumer';

class LoginScreen extends Component{

	constructor(props){
		super(props);				
		this.state={
			username:null,
			password:null
		}
		this.handleClickPro = this.handleClickPro.bind(this);
    	 this.handleClickAdmin = this.handleClickAdmin.bind(this);
	}

	handleClickPro(event){
		var screen = <ProScreen parentContext={this.props.parentContext} />;
		this.props.parentContext.setState({contentPage: screen});		
	}

	handleClickAdmin(event){
		/*
		if (this.state.username == null || this.state.password == null)
		{
			alert('blank username and/or password');		
			return;
		}
		*/
		AdminConsumer.loginForApps(this.state.username,this.state.password,(response) => {
			alert(response);
		})
		/*
		var screen = <AdminScreen parentContext={this.props.parentContent} />;
		this.props.parentContext.setState({contentPage : screen});
		*/
	}

	render(){
		return(
			<MuiThemeProvider>

			<div className="Login">	
				<h1>App De Visite</h1>						
				<img src={require("./img/logo.png")} widh="200px" height="200px" />
				<br/>
				<TextField
					hintText="Identifiant"	
					floatingLabelText="Identifiant"
					onChange = {(event,newValue) => this.setState({username:newValue})}				
				/>
				<br/>
				<TextField 			
					type="password"
					floatingLabelText="password"
					onChange = {(event,newValue) => this.setState({password:newValue})}
					hintText="Mot de passe"
				/>					
				<br/>
				<RaisedButton label="Pro Login" onClick={(event) => this.handleClickPro(event)}  />
				<br/>
				<br/>
				<RaisedButton label="Admin Login" onClick={(event) => this.handleClickAdmin(event)}  />
			</div>
			</MuiThemeProvider>

		);
	}
}

export default LoginScreen;