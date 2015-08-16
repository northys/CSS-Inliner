var request = require('request'),
	fs = require('fs'),
	myHost = 'http://cssinliner.dev/',
	myBody = null,
	myPath = null,
	myOutput = 'output',
	myPrefix = '- ';

process.argv.forEach(
	function(val, index, array) {
		if(index == 2) myPath = val;
		if(index == 3) myOutput = val;
	}
);

if(myPath != null){
	try {
		stats = fs.lstatSync(myPath);
	    if (stats.isDirectory()) {
	        
			request(myHost + myPath + '/' + myPath + '.php', 
				function(err, response, body) {

					if(err) console.log(err);

					myBody = body;
			  		console.log(myPrefix + 'Its works');
					
					fs.writeFile(myPath + '/' + myOutput + '.html', myBody, 
						function(err) {
						    if(err) {
						        return console.log(err);
						    }

						    console.log(myPrefix + 'The file was saved!');
						}
					);	
				}
			);

	    }
	}catch (e){
		console.log(e);
	}		
}