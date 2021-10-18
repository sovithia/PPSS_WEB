
const accountSid = process.env.TWILIO_ACCOUNT_SID;
const authToken = process.env.TWILIO_AUTH_TOKEN;
const client = require('twilio')(accountSid, authToken);

client.messages.create({
 body: 'This is the ship that made the Kessel Run in fourteen parsecs?',
 from: '+13158401918',
 to: '+855964222816'
}).then(message => console.log(message.sid));
