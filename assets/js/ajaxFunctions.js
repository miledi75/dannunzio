/**
 * 
 */
function createXmlHttpRequestObject() 
{ 
  // stores the reference to the XMLHttpRequest object
  var xmlHttp;
 // if running Internet Explorer 6 or older
  if(window.ActiveXObject)
  {
    try {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch (e) {
      xmlHttp = false;
    }
  }
  // if running Mozilla or other browsers
  else
  {
    try {
      xmlHttp = new XMLHttpRequest();
    }
    catch (e) {
      xmlHttp = false;
    }
  }
  // return the created object or display an error message
  if (!xmlHttp)
    alert("Error creating the XMLHttpRequest object.");
  else 
    return xmlHttp;
}

//make asynchronous HTTP request using the XMLHttpRequest object 
function processLogin()
{
  
	xmlHttp = createXmlHttpRequestObject();
	//alert(xmlHttp.readyState);
  // proceed only if the xmlHttp object isn't busy
  if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
  {
    // retrieve the name typed by the user on the form
    login = encodeURIComponent( 
           document.getElementById('inputLogin').value);
    
    passWord = encodeURIComponent( 
            document.getElementById('inputPassword').value);

   var loginMessage = document.getElementById("loginMessage");
   
   if(!(login == '' || passWord == ''))
   {
	   	loginMessage.innerHTML = "";
	   	loginMessage.style.display = 'none';
	   
	   	//BUILD THE CONTROLLER URL
	   	url = 'http://localhost/ci/processUser/processLogin/'+login+'/'+passWord;
	   	
	  	// CALL THE PROCESSLOGIN FUNCTION FROM THE PROCESUSER CONTROLLER
	    xmlHttp.open("GET",url , true);  
	    // define the method to handle server responses
	    xmlHttp.onreadystatechange = handleServerResponse;
	    // make the server request
	    xmlHttp.send(null);
   }
   else
   {
	   loginMessage.innerHTML = "You have to provide credentials!";
	   loginMessage.style.display = 'block';
   }
    
}
  else
    // if the connection is busy, try again after one second  
    setTimeout('process()', 1000);
}



//callback function executed when a message is received from the 
//server
function handleServerResponse() 
{
	// move forward only if the transaction has completed
	if (xmlHttp.readyState == 4) 
	{
		  // status of 200 indicates the transaction completed 
		  //successfully
		  if (xmlHttp.status == 200) 
		  {
		    // extract the XML retrieved from the server
		    xmlResponse = xmlHttp.responseXML;
		    
		    // obtain the document element (the root element) of the XML 
		    //structure
		    xmlDocumentElement = xmlResponse.documentElement;
		    // get the text message, which is in the first child of
		    // the the document element
		    response= xmlDocumentElement.firstChild.data;
		    // display the data received from the server
		    
		    //WRONG PASSWORD
		    if(response == 0)
		    {
		    	loginMessage.innerHTML = "Your password is incorrect!";
				loginMessage.style.display = 'block';
			}
		    else if(response == 1)
		    {
		    	//GOOD PASSWORD
		    	$('#loginModal').modal('hide');
		    	$('#loginConfirmModal').modal('show');
		    }
		    // restart sequence
		    
		  } 
		  // a HTTP status different than 200 signals an error
		  else 
		  {
			  alert("There was a problem accessing the server: " +  
		           xmlHttp.statusText);
		  }
	}
	
	
}

/**
 * reloads the page
 */
function reloadPage()
{
	location.reload(true);
}

function redirect(url)
{
	window.location=url;
}

