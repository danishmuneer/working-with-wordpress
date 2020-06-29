The user uses their order number on a html form to retrieve shipping information. This JavaScript solution integrates with Google Sheets using Google API and fetches information for the order number. 

Step #1:
Create a new page in your WordPress website. Note down the page ID. Add the form.html code in the page

Step #2:
Create the Google sheet that has all the tracking information. Make sure you are either (a.) owner, or (b.) editor of the Google sheet. Generate Google API credentials. You will need to sign up for Google Developers. Here's the guide to get API credentials for Google API: https://developers.google.com/sheets/api/guides/authorizing

Step #3:
Add the code inside 'google-api-loader.js' to the bottom of your footer.php just before the ending </body> tag

Step #3:
Place the 'ordertracking.js' file in your theme folder where functions.php, style.css etc. files are present. 

Step #4:
Add the code inside 'enqueue-ordertracking.php' file to your functions.php file. You need to replace a few things, the file has the details.

#### How does it work?
This explanation will help you if you want to change 'ordertracking.js' according to your Google Sheet. This Google Sheet used in this example had tracking details for orders placed each month, one tab for each month (January  2020, February 2020 and so on). The code reads only the last two months of data to match customer order number. The customer order number is matched with two columns "Order Number" or "PO Number" since customer might have ordered through any of these methods. If order number matches, and product is already shipped (by checking value in "Status" column), tracking information is read from two columns "Courier Name" and "Tracking Info". If product is still in production, an expected ship-by date is displayed by reading value in "Expected Ship-by" column.
