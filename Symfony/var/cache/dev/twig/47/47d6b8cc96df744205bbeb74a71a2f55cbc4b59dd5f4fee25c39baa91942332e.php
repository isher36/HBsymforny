<?php

/* base.html.twig */
class __TwigTemplate_4c29165ff9df5d61d6cccb1c15d41963cf93db32da8196e3563fa75ebe0e5196 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_74bf05f9292f529ce76afe272dd681b5c98e12582a932279c7ca38adb8b15a16 = $this->env->getExtension("native_profiler");
        $__internal_74bf05f9292f529ce76afe272dd681b5c98e12582a932279c7ca38adb8b15a16->enter($__internal_74bf05f9292f529ce76afe272dd681b5c98e12582a932279c7ca38adb8b15a16_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_74bf05f9292f529ce76afe272dd681b5c98e12582a932279c7ca38adb8b15a16->leave($__internal_74bf05f9292f529ce76afe272dd681b5c98e12582a932279c7ca38adb8b15a16_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_4c319ee45d5d86def080c1762e9b9187855cf85068355b542528ed337aac364d = $this->env->getExtension("native_profiler");
        $__internal_4c319ee45d5d86def080c1762e9b9187855cf85068355b542528ed337aac364d->enter($__internal_4c319ee45d5d86def080c1762e9b9187855cf85068355b542528ed337aac364d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_4c319ee45d5d86def080c1762e9b9187855cf85068355b542528ed337aac364d->leave($__internal_4c319ee45d5d86def080c1762e9b9187855cf85068355b542528ed337aac364d_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_e10ad08a8af9ce6140cd329e09045ab3d5d43c438cabd0a1b862a3264f4c6126 = $this->env->getExtension("native_profiler");
        $__internal_e10ad08a8af9ce6140cd329e09045ab3d5d43c438cabd0a1b862a3264f4c6126->enter($__internal_e10ad08a8af9ce6140cd329e09045ab3d5d43c438cabd0a1b862a3264f4c6126_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_e10ad08a8af9ce6140cd329e09045ab3d5d43c438cabd0a1b862a3264f4c6126->leave($__internal_e10ad08a8af9ce6140cd329e09045ab3d5d43c438cabd0a1b862a3264f4c6126_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_d38feac966458ff8fffe3c0038f62b6ef9d492ddfdd1935ac1f0ecc17a10f575 = $this->env->getExtension("native_profiler");
        $__internal_d38feac966458ff8fffe3c0038f62b6ef9d492ddfdd1935ac1f0ecc17a10f575->enter($__internal_d38feac966458ff8fffe3c0038f62b6ef9d492ddfdd1935ac1f0ecc17a10f575_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_d38feac966458ff8fffe3c0038f62b6ef9d492ddfdd1935ac1f0ecc17a10f575->leave($__internal_d38feac966458ff8fffe3c0038f62b6ef9d492ddfdd1935ac1f0ecc17a10f575_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_93cfacb70a69a6d5e7497a143651e60b32000363ef612d07a0a438707713a65f = $this->env->getExtension("native_profiler");
        $__internal_93cfacb70a69a6d5e7497a143651e60b32000363ef612d07a0a438707713a65f->enter($__internal_93cfacb70a69a6d5e7497a143651e60b32000363ef612d07a0a438707713a65f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_93cfacb70a69a6d5e7497a143651e60b32000363ef612d07a0a438707713a65f->leave($__internal_93cfacb70a69a6d5e7497a143651e60b32000363ef612d07a0a438707713a65f_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
