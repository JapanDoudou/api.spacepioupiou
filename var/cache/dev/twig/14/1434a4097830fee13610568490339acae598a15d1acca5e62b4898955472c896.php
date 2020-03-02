<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_9f460c67d4c8612f75152d098c173e51414ec1926af593c3d9b259e043fadee4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'aside' => [$this, 'block_aside'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link href=\"https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cyborg/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-l7xaoY0cJM4h9xh1RfazbgJVUZvdtyLWPueWNtLAphf/UbBgOVzqbOTogxPwYLHM\" crossorigin=\"anonymous\">
        <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        echo "\">
        ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "    </head>
    <body>
    <!-- Pattern de remplissage -->
    <style type=\"text/css\">
        svg {
            background: rgb(255,255,255,0.1);
            position:absolute;
            top:0;
            left:0;
            z-index:-1;
        }
        polygon {
            fill: rgb(0,0,0,0);
            stroke-width: 1.8;
            stroke: rgba(97,25,155,0.2);
        }
    </style>
    <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"  width=\"100%\" height=\"100%\">
        <defs>
            <pattern id=\"hexagons\" width=\"50\" height=\"43.4\"
                     patternUnits=\"userSpaceOnUse\"
                     patternTransform=\"scale(2) translate(2) rotate(45)\">
                <polygon
                        points=\"24.8,22 37.3,29.2 37.3,43.7 24.8,50.9 12.3,43.7 12.3,29.2\"
                        id=\"hex\" />
                <use xlink:href=\"#hex\" x=\"25\" />
                <use xlink:href=\"#hex\" x=\"-25\" />
                <use xlink:href=\"#hex\" x=\"12.5\" y=\"-21.7\" />
                <use xlink:href=\"#hex\" x=\"-12.5\" y=\"-21.7\" />
            </pattern>
        </defs>
        <rect width=\"100%\" height=\"100%\" fill=\"url(#hexagons)\" />
    <img src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/title.png"), "html", null, true);
        echo "\" alt=\"title game\" id=\"titleImg\">
    <header>
        <nav class=\"navbar navbar-light bg-light\">
            <a class=\"navbar-brand\" href=\"#\">
                <img src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo.png"), "html", null, true);
        echo "\" width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\">
                Space PiouPiou - Accueil
            </a>
        </nav>
    </header>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-xs-12 col-md-8\">
                ";
        // line 53
        $this->displayBlock('body', $context, $blocks);
        // line 54
        echo "            </div>
            <div class=\"col-xs-12 col-md-4\">
                ";
        // line 56
        $this->displayBlock('aside', $context, $blocks);
        // line 57
        echo "            </div>
        </div>



    </div>
    <script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\" integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\" integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\" crossorigin=\"anonymous\"></script>
        ";
        // line 66
        $this->displayBlock('javascripts', $context, $blocks);
        // line 67
        echo "    </body>
</html>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 8
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 53
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 56
    public function block_aside($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "aside"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 66
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

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
        return array (  193 => 66,  181 => 56,  169 => 53,  157 => 8,  144 => 5,  135 => 67,  133 => 66,  122 => 57,  120 => 56,  116 => 54,  114 => 53,  103 => 45,  96 => 41,  62 => 9,  60 => 8,  56 => 7,  51 => 5,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>
        <link href=\"https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cyborg/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-l7xaoY0cJM4h9xh1RfazbgJVUZvdtyLWPueWNtLAphf/UbBgOVzqbOTogxPwYLHM\" crossorigin=\"anonymous\">
        <link rel=\"stylesheet\" href=\"{{ asset('css/style.css') }}\">
        {% block stylesheets %}{% endblock %}
    </head>
    <body>
    <!-- Pattern de remplissage -->
    <style type=\"text/css\">
        svg {
            background: rgb(255,255,255,0.1);
            position:absolute;
            top:0;
            left:0;
            z-index:-1;
        }
        polygon {
            fill: rgb(0,0,0,0);
            stroke-width: 1.8;
            stroke: rgba(97,25,155,0.2);
        }
    </style>
    <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"  width=\"100%\" height=\"100%\">
        <defs>
            <pattern id=\"hexagons\" width=\"50\" height=\"43.4\"
                     patternUnits=\"userSpaceOnUse\"
                     patternTransform=\"scale(2) translate(2) rotate(45)\">
                <polygon
                        points=\"24.8,22 37.3,29.2 37.3,43.7 24.8,50.9 12.3,43.7 12.3,29.2\"
                        id=\"hex\" />
                <use xlink:href=\"#hex\" x=\"25\" />
                <use xlink:href=\"#hex\" x=\"-25\" />
                <use xlink:href=\"#hex\" x=\"12.5\" y=\"-21.7\" />
                <use xlink:href=\"#hex\" x=\"-12.5\" y=\"-21.7\" />
            </pattern>
        </defs>
        <rect width=\"100%\" height=\"100%\" fill=\"url(#hexagons)\" />
    <img src=\"{{ asset('img/title.png') }}\" alt=\"title game\" id=\"titleImg\">
    <header>
        <nav class=\"navbar navbar-light bg-light\">
            <a class=\"navbar-brand\" href=\"#\">
                <img src=\"{{ asset('img/logo.png') }}\" width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\">
                Space PiouPiou - Accueil
            </a>
        </nav>
    </header>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-xs-12 col-md-8\">
                {% block body %}{% endblock %}
            </div>
            <div class=\"col-xs-12 col-md-4\">
                {% block aside %}{% endblock %}
            </div>
        </div>



    </div>
    <script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\" integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\" integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\" crossorigin=\"anonymous\"></script>
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/var/www/html/SpaceAPI/api.spacepioupiou/templates/base.html.twig");
    }
}
