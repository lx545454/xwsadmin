<?php

/* errors.missing */
class __TwigTemplate_f861511185ebbf81bf59dadcfa09baa3e09cda2b1339e19e14f46cb19ec9dfdc extends TwigBridge\Twig\Template
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
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Laravel PHP Framework</title>
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:300,400,700);

        body {
            margin:0;
            font-family:'Lato', sans-serif;
            text-align:center;
            color: #999;
        }

        .welcome {
           width: 300px;
           height: 300px;
           position: absolute;
           left: 50%;
           top: 50%; 
           margin-left: -150px;
           margin-top: -150px;
        }

        a, a:visited {
            color:#FF5949;
            text-decoration:none;
        }

        a:hover {
            text-decoration:underline;
        }

        ul li {
            display:inline;
            margin:0 1.2em;
        }

        p {
            margin:2em 0;
            color:#555;
        }
    </style>
</head>
<body>
    <div class=\"welcome\">                 
        <h1>Page Is Not Exists!!</h1>        
    </div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "errors.missing";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}