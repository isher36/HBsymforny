<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_3512d7f7d1dda4566798b5c98c1b3f51d3a2b8e2cf8a541d1e85372e4f22e2ee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9fb4d81803d719ee09bbb7de5956642e40d1061706df52675af9d0aa0d9332ee = $this->env->getExtension("native_profiler");
        $__internal_9fb4d81803d719ee09bbb7de5956642e40d1061706df52675af9d0aa0d9332ee->enter($__internal_9fb4d81803d719ee09bbb7de5956642e40d1061706df52675af9d0aa0d9332ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9fb4d81803d719ee09bbb7de5956642e40d1061706df52675af9d0aa0d9332ee->leave($__internal_9fb4d81803d719ee09bbb7de5956642e40d1061706df52675af9d0aa0d9332ee_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_59e5a47b9a0525abb0545e09b82adbc191d73a30520989223449983093f801fe = $this->env->getExtension("native_profiler");
        $__internal_59e5a47b9a0525abb0545e09b82adbc191d73a30520989223449983093f801fe->enter($__internal_59e5a47b9a0525abb0545e09b82adbc191d73a30520989223449983093f801fe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_59e5a47b9a0525abb0545e09b82adbc191d73a30520989223449983093f801fe->leave($__internal_59e5a47b9a0525abb0545e09b82adbc191d73a30520989223449983093f801fe_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_2bc10f48249c4413178f3a2be7a3dc4165b7a2eeb03bb7648ed95aabcc28cb43 = $this->env->getExtension("native_profiler");
        $__internal_2bc10f48249c4413178f3a2be7a3dc4165b7a2eeb03bb7648ed95aabcc28cb43->enter($__internal_2bc10f48249c4413178f3a2be7a3dc4165b7a2eeb03bb7648ed95aabcc28cb43_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_2bc10f48249c4413178f3a2be7a3dc4165b7a2eeb03bb7648ed95aabcc28cb43->leave($__internal_2bc10f48249c4413178f3a2be7a3dc4165b7a2eeb03bb7648ed95aabcc28cb43_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_fa84ab9360d304fb183c1ba3c146c458a74fad47d4f7717580969b3991819836 = $this->env->getExtension("native_profiler");
        $__internal_fa84ab9360d304fb183c1ba3c146c458a74fad47d4f7717580969b3991819836->enter($__internal_fa84ab9360d304fb183c1ba3c146c458a74fad47d4f7717580969b3991819836_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_fa84ab9360d304fb183c1ba3c146c458a74fad47d4f7717580969b3991819836->leave($__internal_fa84ab9360d304fb183c1ba3c146c458a74fad47d4f7717580969b3991819836_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
