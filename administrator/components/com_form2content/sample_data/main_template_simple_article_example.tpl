{* This template is used with the Simple Artciel Example and has some extra coding and explanations to help you underway with creating your own custom templates for Form2Content using the Smarty Template Engine. THESE COMMENTS WILL NOT SHOW IN YOUR ARTICLE *}

{* Your INTRODUCTION TEXT is NOT shown since we have used a DEFAULT setting (override in the F2C Content Configuration) for your ADVANCED ARTICLE PARAMETERS and set it to HIDDEN. This is a JOOMLA NATIVE option.*}

{*THE ENTIRE CONTENT IS BETWEEN the following 'if' TAGS, checking if there is content in the MAIN field and if not, nothing will be rendered and this template will be EMPTY. When the main_tempate is empty JOOMLA will NOT show a READ MORE.*}

{if $MAIN}
<div>
{*PLEASE NOTE: We are using the RAW output for displaying te image. If NO image is uploaded, nothing will be shown.*}

{if $IMAGE}<img src="{$IMAGE}" align="right" style="padding-left:10px;" alt="{$JOOMLA_TITLE}" />{/if}

{$MAIN}

<p><strong>Article reference:</strong> {$REFERENCE|default:'No reference available'}</p>
<div style="clear:both;"></div>
</div>
{* The following code is an example of using conditional statements*}

{if $JOOMLA_INFORMATION eq '1'}
<div style=" padding:5px; border:1px solid #999; width:98%; margin:10px 0; clear:both;">
<p>These are Form2Content LITE template parameters. In PRO you can access and display all the Joomla article data like section, category and author info.</p>
<span style="font-size:90%;">
Artice title: {$JOOMLA_TITLE}<br/>
Title alias: {$JOOMLA_TITLE_ALIAS}<br/>
Article URL (raw output, great for custom 'read more'): <a href="{$JOOMLA_ARTICLE_LINK}" target="_blank">{$JOOMLA_ARTICLE_LINK}</a><br/>
Joomla Article ID: {$JOOMLA_ID}<br/>
Start publishing: {if $JOOMLA_PUBLISH_UP}{$JOOMLA_PUBLISH_UP}{else}empty{/if}<br/>
Stop publishing: {if $JOOMLA_PUBLISH_DOWN}{$JOOMLA_PUBLISH_DOWN}{else}empty{/if}<br/>
Article create date: {$JOOMLA_CREATED}<br/>
Article modified date: {$JOOMLA_MODIFIED}</span>
</div>
{elseif $JOOMLA_INFORMATION eq '2'}
<p>No extra information available.</p>
{else}
<p>No option to display additional information was made.</p>
{/if}

<p style="font-size:80%; border-top:1px dashed #666;">This article has been generated using <a href="http://www.joomla.org/" target="_blank">Joomla</a> and <a href="http://www.form2content.com" target="_blank">Form2Content</a>. Please find <a href="http://www.form2content.com/f2c-joomla/pro/f2c-documentation" target="_blank">F2C documentation here</a>.</p>

{/if}