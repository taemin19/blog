{% extends 'layout.php' %}

{% block head %}
<title>Post-{{ post.id }} | Blog</title>
{% endblock %}

{% block navbar %}
navbar-inverse
{% endblock %}

{% block content %}
<section id="post" class="post">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>Blog <span class="text-primary">Post</span></h2>
                    <hr class="grey">
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="post-block">

                    <div class="post-heading">
                        <h3>{{ post.title }}</h3>
                    </div>

                    <div class="post-info">
                        <span class="text-left">
                        	<i class="fa fa-calendar" aria-hidden="true"></i> {{ post.updateDate|date("d/m/Y") }}
                        </span>
                        <span class="text-right">
                        	<i class="fa fa-user" aria-hidden="true"></i> {{ post.author }}
                        </span>
                    </div>
                    <hr>
                    <div class="post-lead">
                        <p>{{ post.lead|nl2br }}</p>
                    </div>

                    <div class="post-content">
                        <p>{{ post.content|nl2br }}</p>
                    </div>
                    
                    <div>
                        <p><a href="/admin/post-update-{{ post.id }}" class="btn btn-inline btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></p>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->   

    </div><!-- /.container -->
</section>
{% endblock %}