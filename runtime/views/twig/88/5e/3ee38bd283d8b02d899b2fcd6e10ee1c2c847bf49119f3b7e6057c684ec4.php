<?php

/* login */
class __TwigTemplate_885e3ee38bd283d8b02d899b2fcd6e10ee1c2c847bf49119f3b7e6057c684ec4 extends TwigBridge\Twig\Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t<title>";
        // line 5
        echo Illuminate\Support\Facades\Lang::get("description.web_name");
        echo "</title>
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\" />
\t<meta name=\"apple-mobile-web-app-capable\" content=\"yes\" />
\t<meta names=\"apple-mobile-web-app-status-bar-style\" content=\"black-translucent\" />
\t<link rel=\"stylesheet\" href=\"/static/css/bootstrap.min.css\">
\t
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/icheck/all.css\">
\t<link rel=\"stylesheet\" href=\"/static/css/style.css\">
\t<link rel=\"stylesheet\" href=\"/static/css/themes.css\">
\t<script src=\"/static/js/jquery.min.js\"></script>
\t<script src=\"/static/js/plugins/touchwipe/touchwipe.min.js\"></script>
\t<script src=\"/static/js/plugins/nicescroll/jquery.nicescroll.min.js\"></script>
\t<script src=\"/static/js/plugins/validation/jquery.validate.min.js\"></script>
\t<script src=\"/static/js/plugins/validation/additional-methods.min.js\"></script>
\t<script src=\"/static/js/plugins/icheck/jquery.icheck.min.js\"></script>
\t<script src=\"/static/js/bootstrap.min.js\"></script>
\t<script src=\"/static/js/eakroko.js\"></script>

</head>

<body class='login'>
\t<div class=\"wrapper\">
\t\t<h1><a>";
        // line 27
        echo Illuminate\Support\Facades\Lang::get("description.web_name");
        echo "</a></h1>
\t\t<div class=\"login-body\">
\t\t\t<h2>SIGN IN<!--<select id=\"cg_language\" class=\"pull-right span2\"><option value=\"zhs\">";
        // line 29
        echo Illuminate\Support\Facades\Lang::get("description.zhs");
        echo "</option><option value=\"zht\">";
        echo Illuminate\Support\Facades\Lang::get("description.zht");
        echo "</option></select>--></h2>
\t\t\t<form action=\"";
        // line 30
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("login/do"));
        echo "\" method='POST' class='form-validate' id=\"login\">
\t\t\t    ";
        // line 31
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 32
            echo "\t\t\t    <div class=\"control-group\">
\t\t\t\t    <div class=\"controls\">
\t\t\t\t    \t<span class=\"label label-warning\">";
            // line 34
            echo (isset($context["error"]) ? $context["error"] : null);
            echo "</span>
\t\t\t\t    </div>
\t\t\t    </div>
\t\t\t    ";
        }
        // line 38
        echo "\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t<div class=\"email controls\">
\t\t\t\t\t\t<input type=\"text\" name='email' placeholder=\"";
        // line 40
        echo Illuminate\Support\Facades\Lang::get("description.uname");
        echo "\" class='input-block-level' value=\"\" data-rule-required=\"true\" data-msg-required=\"";
        echo Illuminate\Support\Facades\Lang::get("description.uname");
        echo Illuminate\Support\Facades\Lang::get("common.required");
        echo "\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t<div class=\"pw controls\">
\t\t\t\t\t\t<input type=\"password\" name=\"pwd\" placeholder=\"";
        // line 45
        echo Illuminate\Support\Facades\Lang::get("description.passw");
        echo "\" class='input-block-level' value=\"\" data-rule-required=\"true\" data-msg-required=\"";
        echo Illuminate\Support\Facades\Lang::get("description.passw");
        echo Illuminate\Support\Facades\Lang::get("common.required");
        echo "\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        // line 48
        if (((isset($context["captcha"]) ? $context["captcha"] : null) == true)) {
            // line 49
            echo "\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t    <div class=\"input-append\">
\t\t\t\t\t\t<input type=\"text\" name=\"captcha\" placeholder=\"验证码\" class='input-block-level input-medium' data-rule-required=\"true\">
\t\t\t\t\t\t<span class=\"add-on\" style=\"padding:0px;height:28px;\"><img id=\"captcha\" src=\"/captcha\" /></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 58
        echo "\t\t\t\t<div class=\"submit\">
\t\t\t\t\t<div class=\"remember\">
\t\t\t\t\t\t<input type=\"checkbox\" name=\"remember\" class='icheck-me' data-skin=\"square\" data-color=\"blue\" id=\"remember\"> <label for=\"remember\">";
        // line 60
        echo Illuminate\Support\Facades\Lang::get("description.auto_login");
        echo "</label>
\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t<input type=\"submit\" value=\"";
        // line 62
        echo Illuminate\Support\Facades\Lang::get("description.login");
        echo "\" class='btn btn-primary'>
\t\t\t\t</div>
\t\t\t</form>
\t\t\t<div class=\"forget\">
\t\t\t\t<a href=\"javascript:void(0);\"><span></span></a>
\t\t\t</div>
\t\t</div>
\t</div>
\t
</body>
<script>
    \$(function(){
        \$('#captcha').click(function(){
            \$(this).attr('src',\$(this).attr('src'));
        });
        
        \$('#cg_language').change(function(){
        \t\$.get('/login/set-language',{'lang':\$(this).val()},function(){
        \t\tlocation.reload();
        \t});
        });
    });
</script>
</html>
";
    }

    public function getTemplateName()
    {
        return "login";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 62,  119 => 60,  115 => 58,  104 => 49,  102 => 48,  93 => 45,  82 => 40,  78 => 38,  71 => 34,  67 => 32,  65 => 31,  61 => 30,  55 => 29,  50 => 27,  25 => 5,  19 => 1,);
    }
}
