/* Replace brandName and companyName with the correct values in the 'writearr' function */ 

/* initialization starts */
var prodData = new Array();
/* initialization ends */

function makeApiCall() {
	var params = {
		spreadsheetId: data.ID, 
		range: '',
    };
	
	params.range = 'Sheet 1!A1:X';
    var request = gapi.client.sheets.spreadsheets.values.get(params); // get one range 
    request.then(function(response) {
        maxLen = response.result.values.length; 
		poparr(response.result.values, maxLen, prodData);
		if(prodData && prodData.length) {
			writearr(prodData);
		}
    }, function(reason) {
        console.error('error: ' + reason.result.error.message);
    });
}

function poparr(arr, len, res) {
	imageCol = arr[0].indexOf('image_link');
	descCol = arr[0].indexOf('description');
	skuCol = arr[0].indexOf('id');
	priceCol = arr[0].indexOf('price');
	prodIDCol = arr[0].indexOf('custom_label_1');
	var i;
	for(i = 0;  i < len; i++) {
		var row = arr[i];
		if(row[prodIDCol] == data.prodID){
			prc = row[priceCol].split(" ");
			temp = [row[imageCol],row[descCol],row[skuCol],prc[0]];
			res.push(temp);
			break;
		}
	}
}

function writearr(inp) {
  brandName = 'xxx';
  companyName = 'yyy';
	strpre = '<script type="application/ld+json">';
	strpost = '</script>';
	// JSON-LD schema template
	let dat = {
		"@context": "https://schema.org/",
		"@type": "Product",
		"name": data.prodTitle,
		"image": inp[0][0],
		"description": inp[0][1],
		"sku": inp[0][2],
		"brand": brandName,
		"offers": {
			"@type": "AggregateOffer",
			"url": data.prodURL,
			"priceCurrency": "USD",
			"lowPrice": inp[0][3],
			"highPrice": "",
			"itemCondition": "https://schema.org/NewCondition",
			"availability": "https://schema.org/InStock",
			"seller": {
				"@type": "Organization",
				"name": companyName
			}
		}
	}
	strfull = strpre + JSON.stringify(dat) + strpost;
	jQuery('.product_meta').html(strfull);
}

function initClient() {
    var API_KEY = data.key;  

    gapi.client.init({
        'apiKey': API_KEY,
        'discoveryDocs': ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
    }).then(function() {
		makeApiCall();
    })
}


function handleClientLoad() {
	gapi.load('client:auth2', initClient);
}
