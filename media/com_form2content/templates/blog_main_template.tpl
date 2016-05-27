{if $ARTICLE}<!--If no article text, NO read more button will generate because the template will be empty! -->
<!--PLEASE REMEMBER THAT YOU CAN HIDE THE INTRO in your article by using the Joomla article setting => show intro: NO -->
	{if $IMAGE}
		<img src="images/stories/{$IMAGE_THUMB_URL_RELATIVE}" alt="{$IMAGE_ALT}" title="{$IMAGE_TITLE}" class="f2c_intro_image" style="float:right; padding-left:15px;">
	{/if}
    <div>{$ARTICLE}</div>
    
    {if $SOURCE}
    <p><strong>Source:</strong> <a href="{$SOURCE_URL}" target="{$SOURCE_TARGET}" title="{$SOURCE_TITLE}">{$SOURCE_DISPLAY}</a></p>
    {/if}

    {if $AUTHOR=='custom'}
            {if $AUTHOR_NAME}
        <p><strong>Author:</strong> {$AUTHOR_NAME}</p>
            {else}
            <p><strong>Author:</strong> webmaster</p>
            {/if}
    {/if}
    {if $AUTHOR=='joomla'}
            <p><strong>Author:</strong> {$JOOMLA_AUTHOR}</p>
    {/if}
{/if}