import React, { Component } from 'react';
import ProConsumer from './Consume';
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

 

class ProfilePro extends Component{
	constructor(props){
		super(props);
		this.state={
			content:"init"
		}
	}

	componentDidMount(){					
		ProConsumer.test((resp) => {						
			this.setState({content:resp});
		});			
	}

	render(){
			return <div>
			{this.state.content}
			</div>;		
	}
}

class ProMenu extends Component {
	constructor(props) {
    	super(props);    	   
    	 this.handleProfile = this.handleProfile.bind(this);
    	 this.handleSection = this.handleSection.bind(this);
  	}

	handleProfile()
	{	
		var screen = <ProfilePro parentContext={this.props.parentContext} />;
		this.props.parentContext.setState({right: screen});				
	}

	handleSection()
	{
		var screen = <Manage parentContext={this.props.parentContext} entity='section' />;
		this.props.parentContext.setState({right: screen});
	}

	handleLoyalty()
	{

	}

	handleLoyaltyCard()
	{

	}

	handleLoyaltyGraphic()
	{
	}

	handleGraphic()
	{

	}

	handleData()
	{

	}

	handleNews()
	{

	}

	handleGallery()
	{

	}

	render(){		
		return <div style={MenuStyle} align='left'>			
			<a onClick={this.handleProfile}><img alt="profile" src={require("./img/profile.png")} width="40px" height="40px" />Profil</a>
			<br/>	
			<a onClick={this.handleSection}><img alt="section" src={require("./img/section.png")} width="50px" height="50px" />Sections</a>
			<br/>	
			<img alt="item" src={require("./img/item.png")} width="50px" height="50px" />Items
			<br/>	
			<img alt="loyalty" src={require("./img/loyalty.png")} width="50px" height="50px" />Loyalty Passwords
			<br/>	
			<img alt="loyaltycard" src={require("./img/loyaltycard.png")} width="50px" height="50px" />Loyalty Cards
			<br/>	
			<img alt="loyaltygraphic" src={require("./img/loyaltygraphic.png")} width="50px" height="50px" />Loyalty Graphic
			<br/>	
			<img alt="graphic" src={require("./img/graphic.png")} width="50px" height="50px" />Graphic
			<br/>	
			<img alt="data" src={require("./img/data.png")} width="50px" height="50px" />Data
			<br/>	
			<img alt="news" src={require("./img/news.png")} width="50px" height="50px" />News
			<br/>	
			<img alt="gallery" src={require("./img/gallery.png")} width="50px" height="50px" />Gallery
			<br/>	
			<img alt="structure" src={require("./img/structure.png")} width="50px" height="50px" />Structure
			<br/>	
			<img alt="event" src={require("./img/event.png")} width="50px" height="50px" />Event
			<br/>	
			<img alt="scratch" src={require("./img/scratch.png")} width="50px" height="50px" />Scratch			
		</div>;
	}


}

class ProContent extends Component {
	render(){
		return <div style={ContentStyle}>Coucou</div>;
	}
}

class ProScreen extends Component{
	constructor(props){    
	    super(props);
	    this.state={
	      left:null,
	      right:null
	    }
	  }

 	componentWillMount(){     		
    	var rightPage = <ProContent parentContext={this.props.parentContext} />;    	
    	var leftPage =  <ProMenu parentContext={this} />;		
    	this.setState({left : leftPage})
    	this.setState({right : rightPage})
  	}

	render(){
				
		return <div style={ProStyle}>				
			{this.state.left}
			{this.state.right}			
			</div>;
	}
}

export default ProScreen;