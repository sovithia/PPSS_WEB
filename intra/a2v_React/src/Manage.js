import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';

class Manage extends Component{
	render(){
		return <MuiThemeProvider>
				<div>Manage</div>
				</MuiThemeProvider>
				;
	}
	componentWillMount(){
		if (this.props.entity == "app"){	
			//this.props.items
		}else{
			alert(this.props.entity);
		}
	}
}

export default Manage;