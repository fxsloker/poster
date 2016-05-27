function getNextKey(tableId)
{
	var fldMaxKey = document.getElementById(tableId + 'MaxKey');
	fldMaxKey.value = parseInt(fldMaxKey.value) + 1;
	return fldMaxKey.value;
}

function addRow(tableId, rowId, addFunction)
{
	var table = document.getElementById(tableId);
	var index = table.rows.length - 1;
	
	
	for(i = 1; i < table.rows.length; i++)
	{
		var row = table.rows[i];
		
		if(row.id == rowId)
		{
			index = i;
		}
	}
	
	var row = table.insertRow(index+1);
	row.id = tableId + '_' + getNextKey(tableId);
	eval(addFunction + '(tableId, row)');	
} 		

function removeRow(rowId)
{
	var tr = document.getElementById(rowId);
	
	if(tr)
	{
		while(tr.hasChildNodes()) 
		{
        	tr.removeChild(tr.lastChild);
        }
      	tr.parentNode.removeChild(tr);
	}
}

function moveUp(tableId, rowId)
{
	var table = document.getElementById(tableId);
	var index = 1;
	
	for(i = 1; i < table.rows.length; i++)
	{
		var row = table.rows[i];
		
		if(row.id == rowId)
		{
			index = i;
		}
	}
	
	if(index > 1)
	{
		var prev = table.rows[index-1];
		var current = table.rows[index];
		prev.parentNode.insertBefore(current,prev);		
	}	
}

function moveDown(tableId, rowId)
{
	var table = document.getElementById(tableId);
	var index = 1;
	
	for(i = 1; i < table.rows.length; i++)
	{
		var row = table.rows[i];
		
		if(row.id == rowId)
		{
			index = i;
		}
	}
	
	if(index < table.rows.length-1)
	{
		var prev = table.rows[index+1];
		var current = table.rows[index];
		current.parentNode.insertBefore(prev,current);		
	}	
}

function addDisplayListRow(tableId, rowId)
{
	var table = document.getElementById(tableId);
	var index = table.rows.length - 1;
		
	for(i = 1; i < table.rows.length; i++)
	{
		var row = table.rows[i];
		
		if(row.id == rowId)
		{
			index = i;
		}
	}
	
	var row = table.insertRow(index+1);
	row.id = tableId + '_' + getNextKey(tableId);
	
	var cellLeft = row.insertCell(0);
	var el1 = document.createElement('input');
	el1.type = 'text';
	el1.name = row.id + 'val';
	el1.id = row.id + 'val';
	el1.size = 40;	
	el1.maxLength = 50;	  
	cellLeft.appendChild(el1);
	  
	var elHidden = document.createElement('input');
	elHidden.type = 'hidden';
	elHidden.name = tableId + 'RowKey[]';
	elHidden.value = row.id;
	cellLeft.appendChild(elHidden);
	  
	var cellMove = row.insertCell(1);
	var lnkUp = document.createElement('a');
	lnkUp.href = 'javascript:moveUp(\''+tableId+'\',\'' + row.id + '\');';
	lnkUp.innerHTML = '<img src="'+jImagePath+'uparrow.png" alt="'+jTextUp+'" />';
	cellMove.appendChild(lnkUp);	
	var lnkDwn = document.createElement('a');
	lnkDwn.href = 'javascript:moveDown(\''+tableId+'\',\'' + row.id + '\');';
	lnkDwn.innerHTML = '<img src="'+jImagePath+'downarrow.png" alt="'+jTextDown+'" />';
	cellMove.appendChild(lnkDwn);	
	  
	var cellDelete = row.insertCell(2);
	var lnkDel = document.createElement('a');
	lnkDel.href = 'javascript:removeRow(\'' + row.id + '\');';
	lnkDel.innerHTML = '<img src="'+jImagePath+'remove.png" alt="'+jTextDelete+'" />';
	cellDelete.appendChild(lnkDel);	
	
	var cellAdd = row.insertCell(3);
	var lnkAdd = document.createElement('a');
	lnkAdd.href = 'javascript:addRow(\''+tableId+'\',\'' + row.id + '\',\'prepareRow\');';
	lnkAdd.innerHTML = '<img src="'+jImagePath+'add.png" alt="'+jTextAdd+'" />';
	cellAdd.appendChild(lnkAdd);		
}

function addDbLookupkMultiRow(tableId, rowId)
{
	var ddl = $(tableId+'_lookup');
	var table = $(tableId);
	var index = table.rows.length - 1;
	var selElm = ddl.options[ddl.selectedIndex];
	
	if(selElm.value == '') return false;
	
	for(i = 1; i < table.rows.length; i++)
	{
		var row = table.rows[i];
		var hidVal = $(row.id+'val');
		
		if($(row.id+'val').value == selElm.value)
		{
			// Already present to the list
			return false;
		}
		
		if(row.id == rowId)
		{
			index = i;
		}
	}

	var row = table.insertRow(index+1);	
	row.id = tableId + '_' + getNextKey(tableId);

	var cellLeft = row.insertCell(0);
	cellLeft.innerHTML = selElm.text;
	
	var elRowValue = document.createElement('input');
	elRowValue.type = 'hidden';
	elRowValue.name = row.id + 'val';
	elRowValue.id = row.id + 'val';
	elRowValue.value = selElm.value;	
	cellLeft.appendChild(elRowValue);
	
	var elHidden = document.createElement('input');
	elHidden.type = 'hidden';
	elHidden.name = tableId + 'RowKey[]';
	elHidden.value = row.id;
	cellLeft.appendChild(elHidden);
	  
	var cellMove = row.insertCell(1);
	var lnkUp = document.createElement('a');
	lnkUp.href = 'javascript:moveUp(\''+tableId+'\',\'' + row.id + '\');';
	lnkUp.innerHTML = '<img src="' + jImagePath + 'uparrow.png" alt="' + jTextUp + '" />';
	cellMove.appendChild(lnkUp);	
	var lnkDwn = document.createElement('a');
	lnkDwn.href = 'javascript:moveDown(\''+tableId+'\',\'' + row.id + '\');';
	lnkDwn.innerHTML = '<img src="' + jImagePath + 'downarrow.png" alt="' + jTextDown + '" />';
	cellMove.appendChild(lnkDwn);	
	  
	var cellDelete = row.insertCell(2);
	var lnkDel = document.createElement('a');
	lnkDel.href = 'javascript:removeRow(\'' + row.id + '\');';
	lnkDel.innerHTML = '<img src="' + jImagePath + 'remove.png" alt="' + jTextDelete + '" />';
	cellDelete.appendChild(lnkDel);		
}