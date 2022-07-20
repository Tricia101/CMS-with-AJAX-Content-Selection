# CMS-with-AJAX-Content-Selection
cms2.html contains main layout, html and various JavaScript functions. Clicking a navigation button should result in the display of the corresponding content section. The content should be inserted via an AJAX request.
If the content cannot be shown (bad parameter or unreadable remote file) then the previously selected content should remain in the content window. The user will be notified about the problem with an appropriate status message.
After requesting a new content section the selected CSS theme should remain active, rather than reverting to the default theme. Implement the AJAX call correctly then this will happen automatically.
Whenever possible, an informative status message should be shown. At  least, the following messages should be shown when the appropriate conditions arise and with a reasonable level parameter:
Loading, please wait...
Content successfully loaded.
Error: [human readable http status text]
Theme switched to [active CSS file or theme title]
The generation of these various message texts requires the concatenation of several snippets of text (variables as well as verbatim strings). 
The remote markdown content files shall be converted to HTML at server side using the Parsedown converter.
processor.php process the requests and generate the responses. The selected content shall be communicated with a query parameter. For example, an AJAX request from cms2.html to processor.php?page=0 should trigger the following actions:
processor.php will load home.md
processor.php will convert the contained markdown content to html
processor.php will send the generated html content back to the client
an AJAX function in cms2.html will insert the received html into the content element
Develop processor.php with the following php code:
<?php
sleep(1); // blocking wait function to test load messages in AJAX call
?>
A: No query parameter 
B: Query parameter out of range
C: Valid query parameter but content file not readable
We will communicate case B and case C with special http status codes back to the client. To do so, we use the PHP function http_response_code(). In particular, in case B we will reply with status 404 and in case C with status 503 (service unavailable).
For easy testing, two failing content buttons are in navigation bar, one sending an invalid request (case B above) and one requesting an unavailable file (case C above).
No content will be shown by the onload event when cms2.html is initially loaded.
