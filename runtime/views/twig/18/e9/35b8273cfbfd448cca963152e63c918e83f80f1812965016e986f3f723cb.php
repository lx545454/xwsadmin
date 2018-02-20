<?php

/* qici-one */
class __TwigTemplate_18e935b8273cfbfd448cca963152e63c918e83f80f1812965016e986f3f723cb extends TwigBridge\Twig\Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base-layout.twig");

        $this->blocks = array(
            'main_content' => array($this, 'block_main_content'),
            'footer_js' => array($this, 'block_footer_js'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base-layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_main_content($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"row-fluid\">
    <div class=\"span12\">
        <div class=\"box box-color box-bordered\">
            <div class=\"box-title\">
                <h3>
                    期次列表
                </h3>
                <div class=\"actions\">
                    <form action=\"";
        // line 11
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("common/home/list"));
        echo "\" class=\"\">
                        <table class=\"table-filter\">
                            <tr>
                                <td>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class=\"box-content nopadding\">
                <table class=\"table table-hover table-nomargin\">
                    <thead>
                    <tr>
                        <th class=\"col-120\">期次</th>
                        <th class=\"col-120\">方案</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["datalist"]) ? $context["datalist"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 31
            echo "                    <tr>
                        <td>";
            // line 32
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "qici");
            echo "</td>
                        <td>";
            // line 33
            echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "nums");
            echo "</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                    </tbody>
                </table>
                <div class=\"pagelink\">
                    ";
        // line 39
        echo (isset($context["pagelinks"]) ? $context["pagelinks"] : null);
        echo "
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    // line 47
    public function block_footer_js($context, array $blocks = array())
    {
        // line 48
        echo "<script>
    \$(function(){
        \$(\".ajax-del\").click(function(){
            var obj = \$(this);
            var id = \$(this).data('id');

            if(!confirm(\"是否删除？\")){
                return false;
            }
            \$.post('";
        // line 57
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("common/home/ajax-del"));
        echo "',{id:id},function(data){
                if(data.success == 'true'){
                    window.location.href = window.location.href;
                }
            },\"json\");
        });
    });
</script>
<script src=\"/static/js/laydate/laydate.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "qici-one";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 57,  103 => 48,  100 => 47,  89 => 39,  84 => 36,  75 => 33,  71 => 32,  68 => 31,  64 => 30,  42 => 11,  32 => 3,  29 => 2,);
    }
}
