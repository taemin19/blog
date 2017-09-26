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
                    <h2>Create <span class="text-primary">Post</span></h2>
                    <hr class="grey">
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container">
    	<div class="row">
    		<div class="col-lg-12">
    			<h3>Post List <a href="#add-form" class="page-scroll btn btn-inline btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></h3>
    		</div>
    		
    		<div class="col-lg-12">
    			<table class="table table-striped">
   					<thead>
						<tr>
						  <th>Title</th>
						  <th>Content</th>
						  <th>Author</th>
						  <th>Actions</th>
						</tr>
					</thead>
					<tbody>
						{% for key, post in listPost %}
						<tr>
						  <th scope="row">{{ post.title }}</th>
						  <td>{{ post.content }}</td>
						  <td>{{ post.author }}</td>
						  <td><a href="/admin/post-update-{{ post.id }}" class="btn btn-inline btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
						</tr>
						{% endfor %}
					</tbody>
				</table>
    		</div>
    		
    	</div>
    </div>

    <div id="add-form" class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Add Post</h3>
			</div>
			<div class="col-lg-12">

				{% include 'flash.php' %}

				<form action="" method="post">
					{% if user.hasFlash('validFields') %}
                        {% set value = user.getFlash('validFields') %}
                    {% endif %}

					{{ forms.input('author', 'Author', value.author, {placeholder: 'Name...'}) }}

					{{ forms.input('title', 'Title', value.title, {placeholder: 'Title...'}) }}

					{{ forms.textarea('lead', 'Lead', value.lead, {placeholder: 'Lead...', rows: 3}) }}

					{{ forms.textarea('content', 'Content', value.content, {placeholder: 'Content...', rows: 20}) }}

					<button type="submit" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i>Submit</button>
				</form>
			</div>
		</div>
	</div>
</section>
{% endblock %}