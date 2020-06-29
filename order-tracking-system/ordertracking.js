/**
 * Order Tracking JS Function
 **/

/* initialization starts */
var maxLen;
var maxLenLast;
var weborderNums = new Array();
var quoteList = new Array();
var shipInfo = new Array();
var d = new Date();
var ordstat = ["In production", "Shipped", "Cancelled"]
var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var curMon = months[d.getMonth()];
var lastMonInd = d.getMonth()-1;
if (lastMonInd < 0) {
	lastMonInd = months.length - 1;	
}
var lastMon = months[lastMonInd];
var curYr = d.getFullYear();
var lastYr = curYr;
if (lastYr == "January") {
	lastYr = curYr - 1;
	//console.log('lastYr: '+lastYr);
}

/* initialization ends */
 
jQuery(document).ready(function() {
	/* disable ENTER/return key on the page */
	jQuery('#ordertracking').on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) { 
			e.preventDefault();
			return false;
		}
	});
	jQuery('a.tracktip').on('click', function () {
		jQuery.dialog({
			theme: 'bootstrap',
			title: 'How to Use This Form',
			content: '<iframe class="video-frame" src="https://www.youtube.com/embed/PI6FVDJqmG8?rel=0&autoplay=1&showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
			animation: 'scale',
			type:'orange',
			columnClass: 'col-md-12',
			escapeKey: true,
			backgroundDismiss: true,
		});
	});
	jQuery("#ordertrackingsubmit").on("click", function (e) {
		var quotenum = jQuery("#quotenum").val();
		if(quotenum != '') {
			capture = compar(quotenum, weborderNums, quoteList, shipInfo);
			if (capture != -1) {
				var areEqual = typeof shipInfo[capture][0] === 'string' && typeof ordstat[0] === 'string' ? shipInfo[capture][0].localeCompare(ordstat[0], undefined, { sensitivity: 'accent' }) === 0 : shipInfo[capture][0] === ordstat[0];
				var areEqual2 = typeof shipInfo[capture][0] === 'string' && typeof ordstat[1] === 'string' ? shipInfo[capture][0].localeCompare(ordstat[1], undefined, { sensitivity: 'accent' }) === 0 : shipInfo[capture][0] === ordstat[1];
				if( areEqual ){
					var str = 'Status: '+shipInfo[capture][0]+'<br>Expected Ship-by Date: '+shipInfo[capture][3];			
				} else if ( areEqual2 ) {
					var str = 'Status: '+shipInfo[capture][0]+'<br>Courier: '+shipInfo[capture][2]+'<br>Tracking Number: '+shipInfo[capture][1];
				} else {
					var str = 'Status: '+shipInfo[capture][0]; /* another way of index to get last item of a list (shipInfo[capture].length-1) */
				}
				jQuery('#notice').text('');
				jQuery('#orderstatus').html(str);
					
				jQuery("#ordertrackingsubmit").css('display','none');
				jQuery("div.ordertrackingsubmit").addClass('close');
				jQuery('#orderstatus').addClass('open');
			} else {
				jQuery('#notice').html('Please make sure you have entered the correct Quote/Order number. You can also contact our team for an update by clicking here: <a href="/order-update-request/">Order Update Form.</a>');
			}
		} else{			
			jQuery('#notice').text('The Quote/Order number field is empty.');
			jQuery('#orderstatus').css('display','block');
		}
	});	
});	

function makeApiCall(mon, yr) {
	var params = {
		spreadsheetId: data.ID, 
		range: '',
    };
	
	params.range = mon+' '+yr+'!A1:J';
    var request = gapi.client.sheets.spreadsheets.values.get(params); // get one range 
    request.then(function(response) {
        maxLen = response.result.values.length; 
		poparr(response.result.values, maxLen, weborderNums, quoteList, shipInfo);
    }, function(reason) {
        console.error('error: ' + reason.result.error.message);
    });
}

function poparr(arr, len, res, res2, res3) {
	quotenumCol = arr[0].indexOf('ALC Order No');
	weborderCol = arr[0].indexOf('ALCO use only - Online Order #');
	statusCol = arr[0].indexOf('Status');
	trackCol = arr[0].indexOf('Tracking No');
	courierCol = arr[0].indexOf('Courier Name');
	shipbyCol = arr[0].indexOf('Ship by date');
	var i;
	for(i = 0;  i < len; i++) {
		var row = arr[i];
		arr4 = [row[statusCol], row[trackCol], row[courierCol], row[shipbyCol]]; 
		res.push(row[weborderCol]);
		res2.push(row[quotenumCol]);
		res3.push(arr4);		
	}
}

function compar(quotenum, weborderNums, quoteList, shipInfo) {
	var indx = -1;
	if( (weborderNums.indexOf(quotenum) != -1) ){
		indx = weborderNums.indexOf(quotenum);
	} else if((quoteList.indexOf(quotenum) != -1)) {
		indx = quoteList.indexOf(quotenum);
	}
	console.log('index: '+indx);
	return indx;
}
	
function initClient() {
    var API_KEY = data.key;  

    gapi.client.init({
        'apiKey': API_KEY,
        'discoveryDocs': ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
    }).then(function() {
		makeApiCall(curMon, curYr);
    }).then(function() {
		makeApiCall(lastMon, lastYr);
    });
}


function handleClientLoad() {
	gapi.load('client:auth2', initClient);
}
