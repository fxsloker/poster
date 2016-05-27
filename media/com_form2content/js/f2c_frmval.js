function F2C_checkExtension(fieldid, arrWhite, arrBlack, msgWhite, msgBlack)
{
    var fn = document.getElementById(fieldid).value;

    if(fn)
    {
	    var ext = (fn.lastIndexOf('.') != -1) ? fn.substring(fn.lastIndexOf('.')+1, fn.length).toLowerCase() : '';
	
	    if(arrWhite.length)
	    {
	        var found = false;
	        
	        for(var i=0;i<arrWhite.length;i++)
	        {
	            if(ext == arrWhite[i])
	            {
	                found = true;
	                break;
	            }
	        }
	        
	        if(!found)
	        {
	            alert(msgWhite.replace('%s', ext));
	            return false;
	        }
	    }
	    
	    if(arrBlack.length)
	    {
	        for(var i=0;i<arrBlack.length;i++)
	        {
	            if(ext == arrBlack[i]) 
	            {
	                alert(msgBlack.replace('%s', ext));
	                return false;
	            }
	        }
	    }
	}
	    
    return true;
}

function F2C_limitTextArea(field, countfield, maxlimit) 
{
	if (field.value.length > maxlimit)
	{
		field.value = field.value.substring(0, maxlimit);
	}
	else
	{
		countfield.value = maxlimit - field.value.length;
	}
}

function F2C_ValReqSingleLineText(id)
{
	var elm = document.getElementById(id);
	return elm.value.trim().length;
}

function F2C_ValReqMultiLineText(id)
{
	var elm = document.getElementById(id);
	return elm.value.trim().length;
}

function F2C_ValReqMultiLineEditor(id)
{
	var text = F2C_GetEditorText(id);
	return text.trim().length;
}

function F2C_ValReqCheckBox(id)
{
	var elm = document.getElementById(id);
	return elm.checked;
}

function F2C_ValReqSingleSelectList(id)
{
	var elm = document.getElementById(id);
	
	if(elm != null && elm.type != 'radio')
	{
		// Drop down list
		return (elm.value != '');
	}	
	else
	{
		// Radio buttons
		var elements = document.getElementsByName(id);
		
		for(i=0;i<elements.length;i++)
		{
			if(elements[i].id != elements[i].name)
			{
				if(elements[i].checked) return true;	
			}
		}
		
		return false;
	}
}

function F2C_ValReqImage(id)
{
	var elmUpload = document.getElementById(id+'_fileupload');
	var elmDel = document.getElementById(id+'_del'); 
	var elmPreview = document.getElementById(id+'_preview');
	
	if(elmDel.checked)
	{
		return false;
	}
	else
	{
		return (elmUpload.value.trim() != '' || elmPreview);
	}
}

function F2C_ValReqIFrame(id)
{
	var elm = document.getElementById(id);
	return (elm.value.trim() != '');
}

function F2C_ValReqEmail(id)
{
	var elm = document.getElementById(id);
	return (elm.value.trim() != '');
}

function F2C_ValReqHyperlink(id)
{
	var elm = document.getElementById(id);
	return (elm.value.trim() != '');
}

function F2C_ValReqMultiSelectList(id)
{
	var elm = document.getElementsByName(id+'[]');
	
	for(var i=0;i<elm.length;i++)
	{
		if(elm[i].checked) return true;
	}

	return false;
}

function F2C_ValReqDatePicker(id)
{
	var elm = document.getElementById(id);
	return (elm.value.trim() != '');
}

function F2C_ValReqDisplayList(id)
{
	var elmMaxKey = document.getElementById(id+'MaxKey');
	var elm;
	
	for(var i=0;i<=elmMaxKey.value;i++)
	{
		elm = document.getElementById(id+'_'+i+'val');		
		if(elm && elm.value.trim() != '') return true;
	}

	return false;
}

function F2C_ValReqFile(id)
{
	var elmUpload = document.getElementById(id+'_fileupload');
	var elmDel = document.getElementById(id+'_del'); 
	var elmPreview = document.getElementById(id+'_preview');
	
	if(elmDel.checked)
	{
		return false;
	}
	else
	{
		return (elmUpload.value.trim() != '' || elmPreview);
	}
}

function F2C_ValReqDatabaseLookup(id)
{
	var elm = document.getElementById(id);
	return (elm.value != '');
}

function F2C_ValReqGeoCoder(id)
{
	var elmAddress = document.getElementById(id+'_address');
	var elmLatLon = document.getElementById(id+'_latlon');
	var re = new RegExp('^\\(-?\\d{1,3}\\.\\d+,\\s-?\\d{1,3}\\.\\d+\\)$');
	return (elmLatLon.innerHTML.match(re) && elmAddress.value.trim() != '');
}

function F2C_ValReqDatabaseLookupMulti(id)
{
	var elmMaxKey = document.getElementById(id+'MaxKey');
	var elm;
	
	for(var i=0;i<=elmMaxKey.value;i++)
	{
		elm = document.getElementById(id+'_'+i+'val');		
		if(elm && elm.value.trim() != '') return true;
	}

	return false;
}

function F2C_CheckRequiredFields(arrValidation)
{
	var errors = '';
	for(var i=0;i<arrValidation.length;i++)
	{
		var fieldId = 't'+arrValidation[i][0];
		var fieldType = arrValidation[i][1];
		var result;			
		
		switch(fieldType)
		{
			case 1:
				result = F2C_ValReqSingleLineText(fieldId);
				break;
			case 2:
				result = F2C_ValReqMultiLineText(fieldId);
				break;
			case 3:
				result = F2C_ValReqMultiLineEditor(fieldId);
				break;
			case 4:
				result = F2C_ValReqCheckBox(fieldId);
				break;
			case 5:
				result = F2C_ValReqSingleSelectList(fieldId);
				break;
			case 6:
				result = F2C_ValReqImage(fieldId);
				break;
			case 7:
				result = F2C_ValReqIFrame(fieldId);
				break;
			case 8:
				result = F2C_ValReqEmail(fieldId);
				break;
			case 9:
				result = F2C_ValReqHyperlink(fieldId);
				break;
			case 10:					
				result = F2C_ValReqMultiSelectList(fieldId);
				break;					
			case 12:					
				result = F2C_ValReqDatePicker(fieldId);
				break;					
			case 13:
				result = F2C_ValReqDisplayList(fieldId);
				break;	
			case 14:
				result = F2C_ValReqFile(fieldId);
				break;						
			case 15:
				result = F2C_ValReqDatabaseLookup(fieldId);
				break;
			case 16:
				result = F2C_ValReqGeoCoder(fieldId);
				break;
			case 17:
				result = F2C_ValReqDatabaseLookupMulti(fieldId);
				break;
			default:
				result = true;
		}
		
		if(!result) errors += arrValidation[i][2] + '\n';
	}
	
	if(errors)
	{
		alert(errors);
		return false;
	}
	
	return true;		
}

function F2C_ValDateField(id, format)
{
	var elm = document.getElementById(id);
	
	if(elm.value.trim() != '')
	{
		return F2C_ParseData(format + '@' + elm.value);
	}
	else
	{
		return true;
	}
}

function F2C_CheckCaptcha(task, msg, itemId)
{
	var url = 'index.php?option=com_form2content&view=form&format=raw&task=checkCaptcha&response=' + 
			   encodeURIComponent(Recaptcha.get_response()) + '&challenge=' + encodeURIComponent(Recaptcha.get_challenge()) +
			   '&Itemid=' + itemId;
	
	var x = new Request({
        url: url, 
        method: 'get', 
        onRequest: function()
        {
        },
        onSuccess: function(responseText)
        {
        	if(responseText == 'VALID')
        	{
        		Joomla.submitform(task, document.getElementById('item-form'));
        		return true;
        	}
        	else
        	{
        		Recaptcha.reload();
        		alert(msg);
        		Recaptcha.focus_response_field();
        		return false;
        	}
        },
        onFailure: function()
        {
             alert('Error verifying Captcha.');
        }                
    }).send();
}

function F2C_ParseData(value)
{
	var regexDate = /^(.*)@(\d{1,4})[\.\-\/](\d{1,4})[\.\-\/](\d{1,4})(\s((\d{1,2}):(\d{1,2}):(\d{1,2})))?$/;
	var bits = regexDate.exec(value);
	
	if(!bits)
	{
		return false;
	}
	
	var regexDateFormat = new RegExp('^%([dmY])-%([dmY])-%([dmY])$');
	var m = regexDateFormat.exec(bits[1]);	
	var day = 0;
	var month = 0;
	var year = 0;
	var hours = 0;
	var minutes = 0;
	var seconds = 0;
	
	if (m != null && m.length == 4) 
	{
		for(i=1;i<=4;i++)
		{
			switch(m[i])
			{
				case 'd':
					day = parseInt(bits[i+1],10);
					break;
				case 'm':
					month = parseInt(bits[i+1],10);
					break;
				case 'Y':
					year = parseInt(bits[i+1],10);
					break;
			}
		}

		if(month < 1 || month > 12)
		{
			return false;
		}

		if(day < 1)
		{
			return false;
		}

		switch(month)
		{
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				if(day > 31)
				{
					return false;
				}
				break;
			case 2:
				var leapTest = new Date().set('FullYear', year);
				if(leapTest.isLeapYear())
				{
					if(day > 29)
					{
						return false;
					}
				}
				else
				{
					if(day > 28)
					{
						return false;
					}
				}
				break;
			case 4:
			case 6:
			case 9:
			case 11:
				if(day > 30)
				{
					return false;
				}
				break; 
		}
	}
	else
	{
		return false;			
	}

	if(bits[6] != undefined)
	{
		hours = parseInt(bits[7]);
		minutes = parseInt(bits[8]);
		seconds = parseInt(bits[9]);

		if(hours < 0 || hours > 23)
		{
			return false;
		}

		if(minutes < 0 || minutes > 60)
		{
			return false;
		}

		if(seconds < 0 || seconds > 60)
		{
			return false;
		}
	}
	
	return true;
}