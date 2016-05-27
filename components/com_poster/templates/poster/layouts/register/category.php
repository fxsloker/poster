<?php
defined('_JEXEC') or die();
?>

<form action="" method="POST">
    <input id="domo" name="profileType" type="radio" value="1">Домовладелец <br>
    <input id="exp" name="profileType" type="radio" value="2">Эксперт <br>
    <input type="submit" value="Дальше">
    <input type="hidden" id="authkey" name="authkey" value="">
</form>