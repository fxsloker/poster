<?php
defined('_JEXEC') or die();
?>
<div id="signup">
    <div id="header_signup">
        <div class="authFlowTitle header-1">
            Регистрация
        </div>        
    </div>
    <div id="body">
        <div class="row">
            <div class="create-account section col-sm-6">
                <form id="emailSignupForm" method="POST" onsubmit="return validate( this );" action="<?php echo PRoute::getURI(); ?>">
                    <div class="poster-form_group">
                        <span>Username</span><br>
                        <input type="text" id="username" name="username"  class="joms-input" value="">
                    </div>
                    <div class="poster-form_group">
                        <span>E-mail</span><br>
                        <input type="email" id="email" name="email" value="" class="joms-input">
                    </div>        
                    <div class="poster-form_group">
                        <span>Пароль</span><br>
                        <input type="password" id="password" name="password" value="" class="joms-input">
                    </div>
                    <div class="poster-form_group">
                        <span></span>
                        <button type="submit" id="sign_up_btn" name="submit" class="btn primary large">
                            Зарегистрироваться
                        </button>
                    </div>
                    <input type="hidden" value="register_save" name="task">
                    <input type="hidden" value="" name="authkey" id="authkey">
                </form>        
            </div>
            <div class="divider"></div>
            <div class="facebook-signup section col-sm-6">
                <div class="text-m fb-title">Легко делиться с друзьями и семьей</div>
                <button compid="google" id="googleSignUp" class="btn btn-lg mbl btn-default auth-btn--google auth-btn ">
                    <div class="auth-btn__icon-text-container">
                        <div class="auth-btn__icon-container">
                            <div class="auth-btn__icon auth-btn__icon--google"></div>
                        </div>
                        Продолжить с Google            
                    </div>
                </button>  
                <button compid="fb" id="fbSignUp" class="btn btn-lg  btn-facebook auth-btn--fb auth-btn ">
                    <div class="auth-btn__icon-text-container">
                        <div class="auth-btn__icon-container">
                            <div class="auth-btn__icon auth-btn__icon--fb hzi-font hzi-Facebook"></div>
                        </div>
                        Продолжить с Facebook          
                    </div>
                </button>              
            </div>    
        </div>
    </div>
</div>