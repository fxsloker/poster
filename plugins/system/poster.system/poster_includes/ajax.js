function Post_ajax()
{

	this.loadingFunction = function(){};
	this.doneLoadingFunction = function(){};

	/**
	 * Function call to PHP function
	 */
	this.call = function(comName, sFunction){

		var arg = "";
		/*
		if(arguments.length > 2){
			for(var i=2; i < arguments.length; i++){
				var a = arguments[i];
				if(this.isArray(a)){
					arg += "arg" + i + "=" + this.stringify(a) + "&";
				}else if(typeof a =="string"){
					a = a.replace(/"/g, "&quot;");

					var t = new Array('_d_', encodeURIComponent(a));
					arg += "arg" + i + "=" + this.stringify(t) + "&";
				} else {
					var t = new Array('_d_', encodeURIComponent(a));
					arg += "arg" + i + "=" + this.stringify(t) + "&";
				}
			}
		}
		*/
		arg = this.buildArgs(arguments);
		this.submitTask(comName, sFunction, arg);
	}


	/**
	 * Buidl argument into string
	 */
	this.buildArgs  = function(arguments){
		var arg = "";
		if(arguments.length > 2){
			for(var i=2; i < arguments.length; i++){
				var a = arguments[i];
				if(this.isArray(a)){
					arg += "arg" + i + "=" + this.stringify(a) + "&";
				}else if(typeof a =="string"){
					a = a.replace(/"/g, "&quot;");

					var t = new Array('_d_', encodeURIComponent(a));
					arg += "arg" + i + "=" + this.stringify(t) + "&";
				} else {
					var t = new Array('_d_', encodeURIComponent(a));
					arg += "arg" + i + "=" + this.stringify(t) + "&";
				}
			}
		}

		return arg;
	}

	/**
	 * Sumbit ajax task
	 */
	this.submitTask = function(comName, func, postData, responseFunc, cacheKey){

	    var xmlhttp =  this.getRequestObject();
	    var targetUrl = jax_live_site;
		var responseLength = 0;
		var lastResponseLength = 0;
		var lastResponse = '';

		if( cacheKey ){
			xmlhttp.cachekey = cacheKey;
		}

	    xmlhttp.open('POST', targetUrl, true);
	    xmlhttp.onreadystatechange = function() {

	        if (xmlhttp.readyState == 4) {
	            if (xmlhttp.status == 200){
	            	jax.doneLoadingFunction();
					var text = xmlhttp.responseText;
					if(text !== undefined && text !== null){
						if(text.length > 0){
							text = text.substr(responseLength - lastResponseLength);
							responseLength = xmlhttp.responseText.length;
							if(lastResponse != text) {
								jax.processResponse(text);
							}
							lastResponse = text;
							/*jax.processResponse(xmlhttp.responseText);
							if( xmlhttp.cachekey ){
								jax.cacheData[xmlhttp.cachekey] = xmlhttp.responseText;
							}*/
						}
					}else{
						lastResponseLength = 0;
					}
	            	if( xmlhttp.cachekey ){
						jax.cacheData[xmlhttp.cachekey] = text;
					}

	            }else {
	                // warning ajax fails
	            }

	        // http://stackoverflow.com/questions/7287706/ie-9-javascript-error-c00c023f
	        } else if (xmlhttp.readyState == 3) {
	        	if (xmlhttp.status == 200) {
					var text = xmlhttp.responseText;
					var validresponse = true;

					//make sure that the result text is a valid value
					try {

						if(text !== undefined && text !== null){
							if(text.length > 0){
								text = text.substr(responseLength, text.length-responseLength);
								eval( text );
								responseLength = xmlhttp.responseText.length;
								lastResponseLength = text.length
								if(lastResponse != text) {
									jax.processResponse(text);
								}
								lastResponse = text;
								//console.log('TEXT:' + text);
							}
						}
					}catch (e) {
						//sometimes the response is chunked, this not a valid string to be eval()'ed.
						//lets just ignore this
					}
	        	}
			}
	    }

	    var id = 1;
	    var xmlReq = this.buildXmlReq(comName, func, postData, responseFunc);

		this.loadingFunction();
	    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	    xmlhttp.send(xmlReq);
	}

	/**
	 * Get XMLHttpObject
	 */
	this.getRequestObject = function()
	{
		if (window.XMLHttpRequest) { // Mozilla, Safari,...
		   http_request = new XMLHttpRequest();
		} else if (window.ActiveXObject) { // IE
		    var msxmlhttp = new Array(
					'Msxml2.XMLHTTP.4.0',
					'Msxml2.XMLHTTP.3.0',
					'Msxml2.XMLHTTP',
					'Microsoft.XMLHTTP');

		    for (var i = 0; i < msxmlhttp.length; i++) {
				try {
					http_request = new ActiveXObject(msxmlhttp[i]);
				} catch (e) {
					http_request = null;
				}
			}
		}

		if (!http_request) {
		   alert('Unfortunatelly you browser doesn\'t support this feature.');
		   return false;
		}

		return http_request;
	}

	/**
	 * Process the json string
	 */
	this.processResponse = function(responseTxt){

		// We try to get rid of any error within the return values
		//responses = responseTxt.split(/.*\[\["as","ajax_calls","d",""\],/);
		// The code below cannot be use since it causes massive slowdowns
		//if(responses.length > 1){
		//	responseTxt = '[' + responses[1];
		//}

		// clean up any previous error
		var result = eval( responseTxt );

		// we now have an array, that contains an array.
		for(var i=0; i<result.length;i++){

			var cmd 		= result[i][0];
			var id			= result[i][1];
			var property 	= result[i][2];
			var data 		= result[i][3];

			var objElement = this.$(id);

			switch(cmd){
				case 'as': 	// assign or clear

					if(objElement){
// 						data = data.replace(/"/g, "\\\"");
// 						data = data.replace(/&#123;/g, "{");
// 						data = data.replace(/&#125;/g, "}");
						/*
						 * BetterInnerHTML cannot be used since it
						 * causes XML validation error
						 */
						//if(property == 'innerHTML'){
						//	this.BetterInnerHTML(objElement, data);
						//}
						//else
						//{
							eval("objElement."+property+"=  data \; ");
						//}
					}
					break;

				case 'al':	// alert
					if(data){
						alert(data);}
					break;

				case 'ce':
					this.create(id,property, data);
					break;

				case 'rm':
					this.remove(id);
					break;

				case 'cs':	// call script
					var scr = id + '(';
					if(this.isArray(data)){
						scr += '(data[0])';
						for (var l=1; l<data.length; l++) {
							scr += ',(data['+l+'])';
						}
					} else {
						scr += 'data';
					}
					scr += ');';
					eval(scr);

					break;

				default:
					alert("Unknow command: " + cmd);
			}
		}

		//delete responseTxt;
	}

	this.buildXmlReq = function(comName, func, postData, responseFunc, iframe){
		var xmlReq = '';
		if(iframe){
			xmlReq += '?';}
		else{
			xmlReq += '&';}

	    xmlReq += 'option='+ comName;
	    xmlReq += '&no_html=1';
	    xmlReq += '&task=azrul_ajax';
	    xmlReq += '&func=' + func;
	    xmlReq += '&'+ jax_token_var + '=1';
	    if(postData){
	        xmlReq += "&" + postData;
	    }

	    return xmlReq;
	}						

}