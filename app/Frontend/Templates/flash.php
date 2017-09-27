{% if user.hasFlash('success') %}
    <p class="alert alert-success" role="alert">{{ user.getFlash('success') }}</p>
{% endif %}

{% if user.hasFlash('info') %}
    <p class="alert alert-info" role="alert">{{ user.getFlash('info') }}</p>
{% endif %}

{% if user.hasFlash('errors') %}
<ul class="alert alert-danger" role="alert">
	{% for error in user.getFlash('errors') %}
		<li>{{ error }}</li>
	{% endfor %}
</ul>
{% endif %}