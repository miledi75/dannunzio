
/*
 * GENERIC AJAX FUNCTIONS
 */

//GLOBAL VARS
var showroomToDeleteId;
var showroom_name;
var state;

/**
 * creates an xml http requestobject
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
 * processes the url
 * @param url
 * @param callBack
 */
function processUrl(url,callBack)
{
	//alert(callBack);
	
	xmlHttp = createXmlHttpRequestObject();
	//alert(xmlHttp.readyState);
	// proceed only if the xmlHttp object isn't busy
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		
		// CALL THE PROCESSLOGIN FUNCTION FROM THE PROCESUSER CONTROLLER
		xmlHttp.open("GET",url , true);  
		// define the method to handle server responses
		xmlHttp.onreadystatechange = callBack;
		// make the server request
		xmlHttp.send(null);
	}
	else
	{    
		// if the connection is busy, try again after one second  
	    setTimeout('processUrl()', 1000);
	}
}

/*
 * handles the server response and returns the response object
 */
function handleServerResponse()
{
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
		    // return the response
		    
		    return response;
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
 * END OF GENERIC AJAX FUNCTIONS
 */

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
    {
		// if the connection is busy, try again after one second  
		setTimeout('process()', 1000);
    }
}


/**
 * handles the user login response
 */
function handleServerResponseLogin() 
{
	response = handleServerResponse();
	if(response == 0)
    {
    	//BAD PASSWORD
		loginMessage.innerHTML = "Your password is incorrect!";
		loginMessage.style.display = 'block';
	}
    else if(response == 1)
    {
    	//GOOD PASSWORD
    	$('#loginModal').modal('hide');
    	$('#loginConfirmModal').modal('show');
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
		   	
		  	processUrl(url,handleServerResponseNewShowroom);
	   }
	   else
	   {
		   showroomMessageModal.innerHTML = "You have to provide a showroom name!";
		   showroomMessageModal.style.display = 'block';
	   }
	}
	else
	{
		// if the connection is busy, try again after one second  
		setTimeout('process()', 1000);
	}
}

/**
 * handles the new showroom response
 */
function handleServerResponseNewShowroom() 
{
	//GET THE SERVER RESPONSE
	
	response = handleServerResponse();
	
	//GET THE MESSAGE DIV ID
	message = document.getElementById('showroomMessage');
	if(response == 0)
	{
		message.innerHTML = "There has been a problem, please try again!";
		message.style.display = 'block';
	}
	else if(response > 0)
	{
		//SHOWROOM SAVED
		$('#createShowroomModal').modal('hide');
		message.innerHTML = "Showroom was created successfully";
		message.style.display = 'block';
		//ADD NEW SHOWROOM TO THE TABLE
		newRow = buildRowNewShowroom(response);
		$('#showroomTable tbody').append(newRow);
		//alert(newRow);
	}
	else if (response == 'EX')
	{
		showroomMessageModal.innerHTML = "This showroom name already exists!";
		showroomMessageModal.style.display = 'block';
		document.getElementById('inputShowroomName').autofocus = true;
	}
		    
}

function buildRowNewShowroom(showroom_id)
{
	newRow = '<tr id="row'+showroom_id+'">'+
	'<td id="showroom_name">'+showroom_name+'</td>'+
	'<td id="nr_of_items">0</td>'+
	'<td id="state">Published</td>'+
	'<td id="menu">'+
	'<div class="dropdown">'+
    '<button class="btn btn-sm dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">'+
    '<span class="caret"></span></button>'+
    '<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">'+
    '<li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#deleteShowroomModal'+showroom_id+'">Delete</a></li>'+
    '<li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#editShowroomModal'+showroom_id+'">Edit</a></li>'+
    '<li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#publishShowroomModal'+showroom_id+'">Publish</a></li>'+
    '<li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#viewArtObjectsModal'+showroom_id+'">View Art objects</a></li>'+
    '</ul>'+
    '</div>'+
    '</td>'+
  '</tr>';
	
	//ADD DELETE MODAL
	deleteModal = '<div class="modal fade" data-backdrop="static" id="deleteShowroomModal'+showroom_id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
					'<div class="modal-dialog modal-sm">'+
		'<div class="modal-content">'+
			  '<div class="modal-header">'+
	          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
			  '<h4 class="modal-title" id="titleModalLabel">Info</h4>'+
			  '</div>'+
			  '<div class="modal-body">'+
			  '<p>Would you like to delete this showroom?</p>'+
			  '</div>'+
			  '<div class="modal-footer">'+
			  	 '<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="processDeleteShowroom('+showroom_id+')">Yes</button>'+
			  	 '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>'+
			  '</div></div></div></div>';
	
	$('#showroomModals').append(deleteModal);
	return newRow;
}

/**
 * deletes/archives a showroom
 */
function processDeleteShowroom(id)
{
	//showroomToDeleteId = id;
	showroomToDeleteId = id;
	xmlHttp = createXmlHttpRequestObject();
	//alert(xmlHttp.readyState);
	// proceed only if the xmlHttp object isn't busy
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		
		url = "http://"+location.host+"/ci/processShowroom/deleteShowroom/"+id;

		
		processUrl(url,handleServerResponseDeleteShowroom);
		
	}
	else
	{
		// if the connection is busy, try again after one second  
		setTimeout('process()', 1000);
	}
}


function handleServerResponseDeleteShowroom()
{
	//GET THE RESPONSE
	
	response = handleServerResponse();
	
	//GET THE MESSAGE DIV ID
	message = document.getElementById('showroomMessage');
	
	//
	tr = '#row'+showroomToDeleteId;
	
	
	switch(response)
	{
    case '1':
    	message.innerHTML = "Showroom deleted!";
		message.style.display = 'block';
		$(tr).remove();
		
		break;
    case '2':
    	message.innerHTML = "there was a problem!";
		message.style.display = 'block';	
		
		break;
    case '3':
    	message.innerHTML = "This showroom has art objects and cannot be deleted!";
		message.style.display = 'block';	
		
		break;
	} 

}


function processToggleShowroomState(showroom_id,state_id)
{
	//the showroom whose state needs to be changed
	state = showroom_id;
	xmlHttp = createXmlHttpRequestObject();
	
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
	{
		
		url = "http://"+location.host+"/ci/processShowroom/toggleShowroomState/"+showroom_id+'/'+state_id;

		
		processUrl(url,handleServerResponseToggleShowroomState);
		
	}
	else
	{
		// if the connection is busy, try again after one second  
		setTimeout('process()', 1000);
	}
}

function handleServerResponseToggleShowroomState()
{
//GET THE RESPONSE
	
	response = handleServerResponse();
	
	//GET THE MESSAGE DIV ID
	message = document.getElementById('showroomMessage');
	
	//building the td id from the global variable state 
	//which in this case holds the showroom_id whose state needs to be changed
	showroom_id = '#state'+state;
	
	if($(showroom_id).html() == 'Published')
	{
		$(showroom_id).html('Not published');
	}
	else
	{
		$(showroom_id).html('Published');
	}
	
	
	switch(response)
	{
    case '1':
    	message.innerHTML = "Showroom state updated!";
		message.style.display = 'block';
		
		
		break;
    case '0':
    	message.innerHTML = "there was a problem!";
		message.style.display = 'block';	
		break;
	}	
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

