<?php

/* base-layout.twig */
class __TwigTemplate_bcca1b285fee48d6de0bd6f6929067638583007b3a39857ab0b7e9de279222d1 extends TwigBridge\Twig\Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header_css' => array($this, 'block_header_css'),
            'main_content' => array($this, 'block_main_content'),
            'footer_js' => array($this, 'block_footer_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
\t<title>狮吼公会管理中心</title>
\t<!-- Bootstrap -->
\t<link rel=\"stylesheet\" href=\"/static/css/bootstrap.min.css\">
\t<!-- Bootstrap responsive -->
\t<link rel=\"stylesheet\" href=\"/static/css/bootstrap-responsive.min.css\">
\t<!-- jQuery UI -->
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/jquery-ui/smoothness/jquery-ui.css\">
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css\">
\t<!-- PageGuide -->
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/pageguide/pageguide.css\">
\t<!-- Fullcalendar -->
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/fullcalendar/fullcalendar.css\">
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/fullcalendar/fullcalendar.print.css\" media=\"print\">
\t
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/gritter/jquery.gritter.css\">
\t<!-- chosen -->
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/chosen/chosen.css\">
\t<!-- select2 -->
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/select2/select2.css\">
\t<!-- icheck -->
    <link rel=\"stylesheet\" href=\"/static/css/plugins/icheck/square/orange.css\">
\t<!-- Theme CSS -->
\t<link rel=\"stylesheet\" href=\"/static/css/style.css\">
\t<link rel=\"stylesheet\" href=\"/static/css/plugins/jquery.datetimepicker.css\">
\t<link rel=\"stylesheet\" href=\"/static/js/skins/default.css\">
\t<!-- Color CSS -->
\t<link rel=\"stylesheet\" href=\"/static/css/themes.css\">
\t<link rel=\"stylesheet\" href=\"/static/css/uniform.aristo.css\">
\t<link rel=\"stylesheet\" href=\"/static/css/admin.css\">
\t<!-- Switch CSS -->
\t<link rel=\"stylesheet\" href=\"/static/css/bootstrap-switch.min.css\">
\t<link rel=\"stylesheet\" href=\"/static/css/alertify.core.css\">
\t<link rel=\"stylesheet\" href=\"/static/css/alertify.default.css\">
\t<style>
\t\ttable { /*table-layout: fixed;*/word-wrap:break-word;}div { word-wrap:break-word;}
\t</style>
\t";
        // line 41
        $this->displayBlock('header_css', $context, $blocks);
        // line 43
        echo "</head>

<body>
    <div id=\"navigation\" class=\"navbar-fixed-top\">
        <div class=\"container-fluid\">            
            <a href=\"javascript:void(0);\" class=\"toggle-nav\" rel=\"tooltip\" data-placement=\"bottom\" title=\"显示/隐藏左侧导航\"><i class=\"icon-reorder\"></i></a>
            <ul class=\"main-nav\">
                ";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["admin_menu"]) ? $context["admin_menu"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 51
            echo "                ";
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") < 12)) {
                // line 52
                echo "\t\t\t\t<li class=\"";
                echo (((Illuminate\Support\Facades\Request::segment(1) == $this->getAttribute(twig_split_filter($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "default_url"), "/"), 0, array(), "array"))) ? ("active") : (""));
                echo "\">
\t\t\t\t    <a href=\"";
                // line 53
                echo call_user_func_array($this->env->getFunction('url')->getCallable(), array($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "default_url")));
                echo "\" class='dropdown-toggle' data-toggle=\"dropdown\">
\t\t\t\t    ";
                // line 54
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_icon") == "android")) {
                    echo "<span class=\"cus-android\"></span>";
                }
                // line 55
                echo "\t\t\t\t    ";
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_icon") == "ios")) {
                    echo "<span class=\"cus-ios\"></span>";
                }
                // line 56
                echo "\t\t\t\t    <span>";
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_alias");
                echo "</span><span class=\"caret\"></span>
\t\t\t\t    </a>
\t\t\t\t    <ul class=\"dropdown-menu\">
\t\t\t\t        ";
                // line 59
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "child_menu", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 60
                    echo "\t\t\t\t\t\t<li><a href=\"";
                    echo call_user_func_array($this->env->getFunction('url')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "url")));
                    echo "\">";
                    echo $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "name");
                    echo "</a></li>
\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 62
                echo "\t\t\t\t    </ul>
\t\t\t\t</li>
\t\t\t\t";
            } else {
                // line 65
                echo "\t\t\t\t";
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") == 12)) {
                    // line 66
                    echo "\t\t\t\t<li>
\t\t\t\t    <a href=\"#\" class='dropdown-toggle' data-toggle=\"dropdown\"><span>更多</span><span class=\"caret\"></span></a>
\t\t\t\t    <ul class=\"dropdown-menu\">
\t\t\t\t";
                }
                // line 69
                echo "\t\t\t\t    
\t\t\t\t        <li class=\"dropdown-submenu\">
\t\t\t\t\t\t    <a href=\"";
                // line 71
                echo call_user_func_array($this->env->getFunction('url')->getCallable(), array($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "default_url")));
                echo "\" class='dropdown-toggle' data-toggle=\"dropdown\">
\t\t\t\t\t\t    ";
                // line 72
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_icon") == "android")) {
                    echo "<span class=\"cus-android\"></span>";
                }
                // line 73
                echo "\t\t\t\t\t\t    ";
                if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_icon") == "ios")) {
                    echo "<span class=\"cus-ios\"></span>";
                }
                // line 74
                echo "\t\t\t\t\t\t    ";
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "module_alias");
                echo "
\t\t\t\t\t\t    </a>
\t\t\t\t\t\t    <ul class=\"dropdown-menu\">
\t\t\t\t\t\t        ";
                // line 77
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "child_menu", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 78
                    echo "\t\t\t\t\t\t\t\t<li><a href=\"";
                    echo call_user_func_array($this->env->getFunction('url')->getCallable(), array($this->getAttribute((isset($context["child"]) ? $context["child"] : null), "url")));
                    echo "\">";
                    echo $this->getAttribute((isset($context["child"]) ? $context["child"] : null), "name");
                    echo "</a></li>
\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 80
                echo "\t\t\t\t\t\t    </ul>
\t\t\t\t\t\t</li>\t\t\t\t    
\t\t\t\t";
                // line 82
                if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") > 12) && $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                    // line 83
                    echo "\t\t\t\t    </ul>
\t\t\t\t</li>
\t\t\t\t";
                }
                // line 86
                echo "\t\t\t\t";
            }
            // line 87
            echo "\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "              \t\t\t\t
\t\t    </ul>
\t\t    <div class=\"user\">
\t\t        <ul class=\"icon-nav\">
\t\t            <li class='dropdown'>
\t\t                <a href=\"javascript:void(0);\" class='dropdown-toggle' data-toggle=\"dropdown\">选定的用户<span id=\"selected-uids-count\" class=\"label label-lightred\"></span></a>
\t\t                <ul id=\"selected-pop-ul\" class=\"dropdown-menu pull-right\" style=\"width:800px;height:400px;overflow:auto;\">
\t\t                ";
        // line 94
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["selected_uids"]) ? $context["selected_uids"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 95
            echo "\t\t                    <li style=\"float:left;width:150px;\"><a href=\"javascript:void(0)\" data-uid=\"";
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uid");
            echo "\" class=\"delete-selected-uid-ajax\">";
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nickname");
            echo "<i class=\"icon-trash\"></i></a></li>
\t\t                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "\t\t\t                
\t\t\t\t\t\t    <li><a id=\"select-all-uids\" href=\"javascript:void(0);\">添加到选择框</a></li>
\t\t\t\t\t\t    <li><a id=\"clear-selected-uid-ajax\" href=\"javascript:void(0);\">清除全部</a></li>
\t\t                </ul>\t\t            \t
\t\t            </li>
\t\t        </ul>
\t\t        <div class=\"dropdown\">
\t\t\t\t\t<a href=\"javascript:void(0);\" class='dropdown-toggle' data-toggle=\"dropdown\">";
        // line 103
        echo $this->getAttribute((isset($context["current_user"]) ? $context["current_user"] : null), "realname");
        echo "<img src=\"http://img.youxiduo.com/userdirs/common/yxd_logo.png?v=1\" width=\"25px\" /></a>
\t\t\t\t\t<ul class=\"dropdown-menu pull-right\">\t
\t\t\t\t\t    <li>
\t\t\t\t\t\t\t<a href=\"";
        // line 106
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("common/home/edit-profile"));
        echo "\">修改资料</a>
\t\t\t\t\t\t</li>\t\t\t\t\t
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
        // line 109
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("login/logout"));
        echo "\">安全退出</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t    </div>
        </div>
    </div>
    <div class=\"container-fluid nav-fixed\" id=\"content\">
        <div id=\"left\" class=\" sidebar-fixed hasScroll\">
            
            <div class=\"subnav\">
\t\t\t    <div class=\"subnav-title\">
\t\t\t\t\t<a href=\"#\" class='toggle-subnav'><i class=\"icon-angle-down\"></i><span>";
        // line 121
        echo $this->getAttribute($this->getAttribute((isset($context["admin_menu"]) ? $context["admin_menu"] : null), (isset($context["module_name"]) ? $context["module_name"] : null), array(), "array"), "module_alias", array(), "array");
        echo "</span></a>
\t\t\t\t</div>
\t\t\t\t<ul class=\"subnav-menu\">
\t\t\t\t";
        // line 124
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["admin_menu"]) ? $context["admin_menu"] : null), (isset($context["module_name"]) ? $context["module_name"] : null), array(), "array"), "child_menu", array(), "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 125
            echo "\t\t\t\t";
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "separator")) {
                // line 126
                echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"subnav\">
\t\t\t\t<div class=\"subnav-title\">
\t\t\t\t\t<a href=\"#\" class='toggle-subnav'><i class=\"icon-angle-down\"></i><span>";
                // line 130
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "separator");
                echo "</span></a>
\t\t\t\t</div>
\t\t\t\t<ul class=\"subnav-menu\">
\t\t\t\t";
            }
            // line 134
            echo "\t\t\t\t<li class=\"";
            echo (((Illuminate\Support\Facades\URL::current() == call_user_func_array($this->env->getFunction('url')->getCallable(), array($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url"))))) ? ("active") : (""));
            echo "\"><a href=\"";
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url")));
            echo "\">";
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name");
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 136
        echo "\t\t\t\t</ul>
\t\t\t</div>\t\t\t\t
\t\t\t
        </div>
        <div id=\"main\">
            <div class=\"container-fluid\">
                ";
        // line 142
        $this->displayBlock('main_content', $context, $blocks);
        // line 145
        echo "            </div>
        </div>

\t    <!-- 大图预览开始 -->
\t    <div id=\"bigimg\" class=\"modal hide fade\" style=\"left:40%;width:auto;\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
\t\t    <div class=\"modal-header\" style=\"min-width:130px;\">
\t\t\t    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
\t\t\t    <h3 id=\"myModalLabel\">大图预览</h3>
\t\t    </div>
\t\t    <div style=\"text-align:center;\">
\t\t\t    <img id=\"big-img\" src=\"\" style=\"max-width:1024px;max-height: 500px;\"/>
\t\t    </div>
\t    </div>
\t    <!-- 大图预览结束 -->
    </div>
</body>
    <!-- jQuery -->
\t<script src=\"/static/js/jquery.js\"></script>
\t<script src=\"/static/js/template.min.js\"></script>
\t<!-- Mobile nav swipe -->
\t<script src=\"/static/js/plugins/touchwipe/touchwipe.min.js\"></script>
\t<!-- Nice Scroll -->
\t<script src=\"/static/js/plugins/nicescroll/jquery.nicescroll.min.js\"></script>
\t<!-- jQuery UI -->
\t<script src=\"/static/js/plugins/jquery-ui/jquery.ui.core.min.js\"></script>
\t<script src=\"/static/js/plugins/jquery-ui/jquery.ui.widget.min.js\"></script>
\t<script src=\"/static/js/plugins/jquery-ui/jquery.ui.mouse.min.js\"></script>
\t<script src=\"/static/js/plugins/jquery-ui/jquery.ui.draggable.min.js\"></script>
\t<script src=\"/static/js/plugins/jquery-ui/jquery.ui.resizable.min.js\"></script>
\t<script src=\"/static/js/plugins/jquery-ui/jquery.ui.sortable.min.js\"></script>
\t<!-- Touch enable for jquery UI -->
\t<script src=\"/static/js/plugins/touch-punch/jquery.touch-punch.min.js\"></script>
\t<!-- slimScroll -->
\t<script src=\"/static/js/plugins/slimscroll/jquery.slimscroll.min.js\"></script>
\t<!-- Bootstrap -->
\t<script src=\"/static/js/bootstrap.min.js\"></script>\t
\t<!-- Bootbox -->
\t<script src=\"/static/js/plugins/bootbox/jquery.bootbox.js\"></script>
\t<!-- Flot -->
\t<script src=\"/static/js/plugins/flot/jquery.flot.min.js\"></script>
\t<script src=\"/static/js/plugins/flot/jquery.flot.bar.order.min.js\"></script>
\t<script src=\"/static/js/plugins/flot/jquery.flot.pie.min.js\"></script>
\t<script src=\"/static/js/plugins/flot/jquery.flot.resize.min.js\"></script>
\t<!-- imagesLoaded -->
\t<script src=\"/static/js/plugins/imagesLoaded/jquery.imagesloaded.min.js\"></script>
\t<!-- Datepicker -->
\t<script src=\"/static/js/plugins/datepicker/bootstrap-datepicker.js\"></script>
\t<script src=\"/static/js/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js\"></script>
\t<!-- Timepicker -->
\t<script src=\"/static/js/plugins/timepicker/bootstrap-timepicker.min.js\"></script>
\t<!-- Colorpicker -->
\t<script src=\"/static/js/plugins/colorpicker/bootstrap-colorpicker.js\"></script>
\t<!-- PageGuide -->
\t<script src=\"/static/js/plugins/pageguide/jquery.pageguide.js\"></script>
\t<!-- FullCalendar -->
\t<script src=\"/static/js/plugins/fullcalendar/fullcalendar.min.js\"></script>
\t<!-- Chosen -->
\t<script src=\"/static/js/plugins/chosen/chosen.jquery.min.js\"></script>
\t<!-- select2 -->
\t<script src=\"/static/js/plugins/select2/select2.min.js\"></script>
\t<!-- icheck -->
\t<script src=\"/static/js/plugins/icheck/jquery.icheck.min.js\"></script>
\t<!-- Form -->
\t<script src=\"/static/js/plugins/form/jquery.form.min.js\"></script>
\t
\t<script src=\"/static/js/plugins/validation/jquery.validate.min.js\"></script>
\t<script src=\"/static/js/plugins/validation/additional-methods.min.js\"></script>
\t<!-- Wizard -->\t\t
\t<script src=\"/static/js/plugins/wizard/jquery.form.wizard.min.js\"></script>\t
\t<script src=\"/static/js/plugins/gritter/jquery.gritter.min.js\"></script>
\t<!--/File Upload/-->
\t<script src=\"/static/js/plugins/fileupload/bootstrap-fileupload.min.js\"></script>\t
\t<script src=\"/static/js/plugins/jquery.datetimepicker.js\"></script>\t
\t<script src=\"/static/js/jquery.artDialog.js\"></script>
\t<!-- Theme framework -->
\t<script src=\"/static/js/eakroko.js\"></script>
\t<!-- Theme scripts -->
\t<script src=\"/static/js/application.js\"></script>
\t
\t<script src=\"";
        // line 224
        echo call_user_func_array($this->env->getFunction('asset')->getCallable(), array("static/js/admin.js"));
        echo "\"></script>
\t<!-- Switch js -->
\t<script src=\"/static/js/bootstrap-switch.min.js\"></script>
\t<script src=\"/static/js/alertify.js\"></script>
\t<!-- Just for demonstration -->
\t<script>
\t\$(function(){
    ";
        // line 231
        if ((isset($context["global_tips"]) ? $context["global_tips"] : null)) {
            // line 232
            echo "
    //\$.gritter.add({
    //    title:'操作完成',
    //    text:'";
            // line 235
            echo (isset($context["global_tips"]) ? $context["global_tips"] : null);
            echo "',
    //    time:3000
    //});

\talertify.log('";
            // line 239
            echo (isset($context["global_tips"]) ? $context["global_tips"] : null);
            echo "');
    ";
        }
        // line 241
        echo "\t//input、checkbox标签美化
\t/*
    \$('input').iCheck({
        checkboxClass: 'icheckbox_square-orange',
        radioClass: 'iradio_square-orange',
        increaseArea: '20%' // optional
    });
    */
    /**
     *  全部页面的图片，如需大图预览
     *  只需在图片外面包此 a 标签即可
     *  <a href=\"#bigimg\" data-toggle=\"modal\"></a>
     */
\t\$(\"img\").click(function(){
\t\t\$(\"#big-img\").attr(\"src\",\$(this).attr('src'));
\t});
\t
\t\$('#select-all-uids').click(function(){
\t    var uids = [];
\t    \$('#selected-pop-ul li a.delete-selected-uid-ajax').each(function(i){
\t        uids[i] = \$(this).attr('data-uid');
\t    });
\t    if(uids.length==0){
\t        alert('您没有选择任何用户');
\t        return false;
\t    }
\t    if(\$('.input-selected-uids').length>0){
\t        \$('.input-selected-uids').val(uids.join(','));
\t        console.log(uids.join(','));
\t    }
\t    
\t});
\t\$('#selected-uids-count').text(\$('.delete-selected-uid-ajax').length);
\t
\t
\t\$('a.delete-selected-uid-ajax').bind('click',function(){
\t    var uid = \$(this).attr('data-uid');
\t    var li = \$(this).parent();
\t    \$.get('";
        // line 279
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("user/users/delete-select-user"));
        echo "',{'uid':uid},function(data){
            li.remove();
            \$('#selected-uids-count').text(\$('.delete-selected-uid-ajax').length);
        });
\t});
\t
\t\$('#clear-selected-uid-ajax').bind('click',function(){
\t    
\t    var li = \$(this).parent();
\t    \$.get('";
        // line 288
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("user/users/clear-select-user"));
        echo "',null,function(data){
\t        \$('#selected-pop-ul li a.delete-selected-uid-ajax').each(function(i){
                var li = \$(this).parent();
                li.remove();
            });
            \$('#selected-uids-count').text(\$('.delete-selected-uid-ajax').length);
        });
\t});
\t
\t
\t});
\t</script>
";
        // line 300
        $this->displayBlock('footer_js', $context, $blocks);
        // line 302
        echo "</html>";
    }

    // line 41
    public function block_header_css($context, array $blocks = array())
    {
        // line 42
        echo "\t";
    }

    // line 142
    public function block_main_content($context, array $blocks = array())
    {
        // line 143
        echo "                
                ";
    }

    // line 300
    public function block_footer_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base-layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  522 => 300,  517 => 143,  514 => 142,  510 => 42,  507 => 41,  503 => 302,  501 => 300,  486 => 288,  474 => 279,  434 => 241,  429 => 239,  422 => 235,  417 => 232,  415 => 231,  405 => 224,  324 => 145,  322 => 142,  314 => 136,  301 => 134,  294 => 130,  288 => 126,  285 => 125,  281 => 124,  275 => 121,  260 => 109,  254 => 106,  248 => 103,  239 => 96,  228 => 95,  224 => 94,  202 => 87,  199 => 86,  194 => 83,  192 => 82,  188 => 80,  177 => 78,  173 => 77,  166 => 74,  161 => 73,  157 => 72,  153 => 71,  149 => 69,  143 => 66,  140 => 65,  135 => 62,  124 => 60,  120 => 59,  113 => 56,  108 => 55,  104 => 54,  95 => 52,  92 => 51,  66 => 43,  22 => 1,  114 => 57,  103 => 48,  100 => 53,  89 => 39,  84 => 36,  75 => 50,  71 => 32,  68 => 31,  64 => 41,  42 => 11,  32 => 3,  29 => 2,);
    }
}
