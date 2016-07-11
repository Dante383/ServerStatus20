<?php

/* twig_dark/index.html */
class __TwigTemplate_119ee04c39c527c832687a9c88f7643ecc5b22288c7373e08700017db526eddf extends Twig_Template
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
        echo "<html>
\t<head>
\t\t<title>";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
\t</head>
</html>";
    }

    public function getTemplateName()
    {
        return "twig_dark/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
/* <html>*/
/* 	<head>*/
/* 		<title>{{ title }}</title>*/
/* 	</head>*/
/* </html>*/
