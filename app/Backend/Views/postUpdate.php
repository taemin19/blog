{% extends 'layout.php' %}
{% import "forms.php" as forms %}

{% block head %}
<title>Blog | Add post</title>
{% endblock %}

{% block navbar %}
navbar-inverse
{% endblock %}

{% block content %}
<section>
	<div class="container">
		<div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>Edit <span class="text-primary">Post</span></h2>
                    <hr class="grey">
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="post-block">

                    <div class="post-heading">
                        <h3>{{ post.title }} <a href="#update-form" class="page-scroll btn btn-inline btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Update</a></h3>
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

                </div>
            </div>
        </div><!-- /.row -->   
    </div><!-- /.container -->

    <div id="update-form" class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Update Post</h3>
            </div>
            <div class="col-lg-12">

                {% include 'flash.php' %}

                <form action="" method="post">
                    {% if user.hasFlash('validFields') %}
                        {% set value = user.getFlash('validFields') %}
                    {% endif %}

                    {{ forms.input('author', 'Author', value.author|default(post.author), {placeholder: 'Name...'}) }}

                    {{ forms.input('title', 'Title', value.title|default(post.title), {placeholder: 'Title...'}) }}

                    {{ forms.textarea('lead', 'Lead', value.lead|default(post.lead), {placeholder: 'Lead...', rows: 3}) }}

                    {{ forms.textarea('content', 'Content', value.content|default(post.content), {placeholder: 'Content...', rows: 20}) }}

                    <button type="submit" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i>Submit</button>
                </form>
            </div>
        </div>
    </div>

</section>
{% endblock %}