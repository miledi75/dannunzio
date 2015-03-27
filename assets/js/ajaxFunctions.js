/**
 * creates Xmlhttp
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

/**
 * generic ajax function
 * @param url
 * @param callBack
 */
function processUrl(url,callBack)
{
  	xmlHttp = createXmlHttpRequestObject();
	//alert(xmlHttp.readyState);
	// proceed only if the xmlHttp object isn't busy
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		   	// CALL THE PROCESSLOGIN FUNCTION FROM THE PROCESUSER CONTROLLER
		    xmlHttp.open("GET",url , true);  
		    // define the method to handle server responses
		    xmlHttp.onreadystatechange = handleServerResponseLogin;
		    // make the server request
		    xmlHttp.send(null);
	}
	else
	{    
		// if the connection is busy, try again after one second  
	    setTimeout('process()', 1000);
	}
}


/*
 * LOGIN AJAX
 */


/**
 * handles the user login
 */
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
	   	//CALL THE PROCESSLOGIN FUNCTION FROM THE PROCESUSER CONTROLLER
	  	processUrl(url,handleServerResponseLogin);
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

/**
 * handles the user login response
 */
function handleServerResponseLogin() 
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


/*
 * END LOGIN AJAX
 */

/*
 * SHOWROOM AJAX
 */

function processNewShowroom()
{
  
	xmlHttp = createXmlHttpRequestObject();
	//alert(xmlHttp.readyState);
  // proceed only if the xmlHttp object isn't busy
  if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
  {
    // retrieve showroom name and state
    showroom_name = encodeURIComponent( 
           document.getElementById('inputShowroomName').value);
    
    state = encodeURIComponent( 
            document.getElementById('selectState').value);

   var showroomMessageModal = document.getElementById("showroomMessageModal");
   
   if(!(showroom_name == ''))
   {
	   	
	   	showroomMessageModal.innerHTML = "";
	   	showroomMessageModal.style.display = 'none';
	   
	   	//BUILD THE CONTROLLER URL
	   	url = 'http://localhost/ci/processShowroom/newShowroom/'+showroom_name+'/'+state;
	   	
	  	// CALL THE PROCESSLOGIN FUNCTION FROM THE PROCESUSER CONTROLLER
	    xmlHttp.open("GET",url , true);  
	    // define the method to handle server responses
	    xmlHttp.onreadystatechange = handleServerResponseNewShowroom;
	    // make the server request
	    xmlHttp.send(null);
   }
   else
   {
	   showroomMessageModal.innerHTML = "You have to provide a showroom name!";
	   showroomMessageModal.style.display = 'block';
   }
    
}
  else
    // if the connection is busy, try again after one second  
    setTimeout('process()', 1000);
}

/**
 * handles the new showroom response
 */
function handleServerResponseNewShowroom() 
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
		    
		    //NOTIFICATIONS
		    message = document.getElementById('showroomMessage');
		    
		    //WRONG PASSWORD
		    if(response == 0)
		    {
		    	message.innerHTML = "There has been a problem, please try again!";
				message.style.display = 'block';
			}
		    else if(response == 1)
		    {
		    	//SHOWROOM SAVED
		    	$('#createShowroomModal').modal('hide');
		    	message.innerHTML = "Showroom was created successfully";
		    	message.style.display = 'block';
		    }
		    else if (response == 2)
		    {
		    	showroomMessageModal.innerHTML = "This showroom name already exists!";
		 	    showroomMessageModal.style.display = 'block';
		 	    document.getElementById('inputShowroomName').autofocus = true;
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

function processDeleteShowroom(id)
{
	
}

/*
 * END SHOWROOM AJAX
 */


/**
 * reloads the page
 */
function reloadPage()
{
	location.reload(true);
}
/**
 * redirects to a page
 * @param url
 */
function redirect(url)
{
	window.location=url;
}

