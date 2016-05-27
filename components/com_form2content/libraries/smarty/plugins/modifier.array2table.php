<?php
function smarty_modifier_array2table($array)
{
	$html = '';
	
	if(count($array))
	{
		$html .= '<table class="f2c_arraytable">';
		
		$columns = explode(';', $array[0]);
		
		$html .= '<tr>';
		
		if(count($columns))
		{
			foreach($columns as $column)
			{
				$html .= '<th>'.$column.'</th>';
			}
		}
		
		$html .= '</tr>';
		
		if(count($array) > 1)
		{
			for($i = 1; $i < count($array); $i++)
			{
				$columns = explode(';', $array[$i]);
				
				$html .= '<tr>';
				
				if(count($columns))
				{
					foreach($columns as $column)
					{
						$html .= '<td>'.$column.'</td>';
					}
				}
				
				$html .= '</tr>';
			}
		}
		
		$html .= '</table>';
	}

	return $html;
}
?>