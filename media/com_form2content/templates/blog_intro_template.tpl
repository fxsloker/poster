<!--
This is the FORM2CONTENT INTRO TEMPLATE for the BLOG CONTENT TYPE 

It can be found in < root >/media/com_from2content/templates

The template shows you how you can:

1) Add HTML/CSS for your article
2) Add F2C Template Parameters (placeholders for your form data)
3) Use basic SMARTY syntax

-->
{literal}<!--block escaping so SMARTY doesn't break on use of {} tags-->
<style>
.f2c_intro_image {float:left; padding:5px;}
</style>
{/literal}

<div class="f2c article_intro_wrapper">
{if $IMAGE}
	{if $ARTICLE}<!--check to add the read more around the image-->
    <a href="{$JOOMLA_ARTICLE_LINK}" target="_parent" title="{$JOOMLA_TITLE}">
    {/if}
		<img src="images/stories/{$IMAGE_THUMB_URL_RELATIVE}" alt="{$IMAGE_ALT}" title="{$IMAGE_TITLE}" class="f2c_intro_image">
    {if $ARTICLE}
	</a>
    {/if}
{/if}
{if $INTRO}
	<p>{$INTRO}</p>
{/if}
</div><!--article intro wrapper-->