# CURL-AJAX-CodeGenerator
Visit www.csmadhav.esy.es to see this live.<br/>
<hr>
This is a quick tool which can generate PHP cURL / AJAX code for getting reponse of an API. This tool is useful when you have to save time writing cURL/ AJAX code again and again. <br/>

Follow these steps<br/>

1.Enter the URL of API<br/>
2.Select method currently GET and POST are supported.<br/>
3.Select your code generation option<br/>
4.Add Data body to send as parameters to the URL </b>in JSON</b>:<br/>
for example:<br/>
{<br/>
  &nbsp;&nbsp;"parameter 1":"value",<br/>
  &nbsp;&nbsp;"parameter 2":"value"<br/>
}<br/>
5. Hit GO! and You will get Response details on left textarea and your desired code on right.<br/>
<br/>

<hr>
<b>Some Information</b><br/>


For Content type:application/json<br/>
this tool add a line to parse response into PHP Array.<br/><br/>

For XML:<br/>
this tool add a line to parse response into simpleXMLelement object.<br/>
