var request = require('request'),
	fs = require('fs'),
	myBody = null,
	myHost = null,
	myPrefix = '- ';

request('http://cssinliner.dev/examples/example.php', 
	function(err, response, body) {
		if(err) return console.log(err);

		myBody = body;
  		console.log(myPrefix + 'Its works');
		
		fs.writeFile('my-result.html', myBody, 
			function(err) {
			    if(err) {
			        return console.log(err);
			    }

			    console.log(myPrefix + 'The file was saved!');
			}
		);	
	}
);