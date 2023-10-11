<?php
function login_enqueue_scripts(){ ?>
    <div class="background-cover"></div>
        <style type="text/css" media="screen">
            body.login{
                background: #FF9CFF;
            }

            .background-cover{
                background: url('<?php echo get_bloginfo('template_directory') ?>/src/images/temperos.jpeg') no-repeat center top !important;
                position:fixed;
                top:0;
                left:0;
                z-index:10;
                overflow: hidden;
                width: 100%;
                height:100%;
                color: #dddc00 !important;
            }
            #login p#nav a, #login p#backtoblog a{color: #333 !important;}
            #login{
                z-index:9999;
                position:relative;
                padding-top: 45px !important;
            }
            .login h1 {
                text-align: center;
                background-color: transparent !important;
                margin: 0;
                padding: 0;
                margin-bottom: 10px;
            }
            .login form {
                margin-top: 0 !important;
            }
            .login .message {
                margin-bottom: 0 !important;
            }
            .login form { 
                box-shadow: 0px 0px 0px 0px !important;
                background-color: transparent !important; 
                border-color: transparent !important;
        }
        .wp-core-ui .button-primary {
            background-color: #FF9CFF !important;
        }
            .login h1 a {
                background: url('<?php echo get_bloginfo('template_directory') ?>/src/images/deli-kitchen-logo.png') no-repeat center top !important;
                margin-bottom: 0px !important;
                padding-bottom: 0px;
                width: 231px!important;
                height: 130px !important;
                display: block;
                background-size: 100% !important;
                display: block;
            }
            input.button-primary, button.button-primary, .button-primary{
                border-radius: 3px !important;
                border:none !important;
                background-color: #3d598e !important;
                font-weight:normal !important;
                text-shadow:none !important;
                color: #000 !important;
                }
                .button:active, .submit input:active, .button-secondary:active {
                    background: #3d598e !important;
                    text-shadow: none !important;
                }
                .login #nav a, .login #backtoblog a {
                    color: #333 !important;
                    text-shadow: none !important;
                }
                .login #nav a:hover, .login #backtoblog a:hover{
                    color: #333 !important;
                    text-shadow: none !important;
                }
                .login #nav, .login #backtoblog{
                    text-shadow: none !important;
                }
            </style>
    <?php } add_action( 'login_enqueue_scripts', 'login_enqueue_scripts' );
?>