This solution uses JavaScript to fetch data from a Google sheet (a sheet used as merchant center feed) and embed it on a product page to show strucutured data in the JSON-LD format. 

You need Google API credentials for this project. You also need to have either (1) owner or (2) editor privileges for the google merchant center feed.

The customdata.js should be placed in your current theme folder where functions.php, style.css etc. files are present.

Your Google sheet must have a column with the relevant post IDs for all the products added in the sheet. This column should have the header 'custom_label_1'. 
