{% extends 'layout.php' %}

{% block head %}
<title>Blog</title>
{% endblock %}

{% block navbar %}
navbar-inverse
{% endblock %}

{% block content %}
<section id="blog">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>My <span class="text-primary">Blog</span></h2>
                    <hr class="grey">
                </div>
            </div>
        </div><!-- /.row -->

    </div><!-- /.container -->
    {% for key, post in listPost %}
    {% if key is odd %}
        {% set odd = 'odd' %}
    {% endif %}
    <div class="container blog {{ odd }}">

        <div class="row blog-heading">
            <div class="col-lg-12 text-center">
                <h3>{{ post.title }}</h3>
            </div>
        </div><!-- /.row -->

        <div class="row blog-info">
            <div class="col-lg-12">
                <p>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i> {{ post.updateDate|date("d/m/Y") }}
                </span>
                 <span>
                    <i class="fa fa-user" aria-hidden="true"></i> {{ post.author }}
                </span>
                </p>
            </div>
        </div><!-- /.row -->

        <div class="row blog-lead">
            <div class="col-lg-12">
                <p>{{ post.lead|nl2br }}</p>
                <p class="more text-right">
                    <a href="/post-{{ post.id }}">Read More</a>
                </p>
            </div>
        </div><!-- /.row -->    
        
    </div><!-- /.container -->
    {% endfor %}
</section>
{% endblock %}