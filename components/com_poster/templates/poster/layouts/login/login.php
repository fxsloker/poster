<?php
defined('_JEXEC') or die();
?>
<div class="joms-page">
    <h3 class="joms-page__title">
        Логин
    </h3>
    <form method="POST" action="<?php echo PRoute::getURI().'&task=login'; ?>">
        <div class="joms-form__group">
            <span>E-mail</span>
            <input type="email" id="email" name="email" value="" class="joms-input">
        </div>        
        <div class="joms-form__group">
            <span>Пароль</span>
            <input type="password" id="password" name="password" value="" class="joms-input">
        </div>
        <div class="joms-form__group">
            <span></span>
            <button type="submit" name="submit" class="joms-button__next joms-button--full-small">
                <span>Войти
                </span>
            </button>
        </div>
    </form>
</div>