{% macro input(name, label, value = null, options = []) %}
<div class="form-group">
    <label for="{{ name }}">{{ label }}</label>
    <input type="{{ options.type|default('text') }}" value="{{ value }}" class="form-control" name="{{ name }}" id="{{ name }}" placeholder="{{ options.placeholder }}">
</div>
{% endmacro %}

{% macro textarea(name, label, value = null, options = []) %}
<div class="form-group">
    <label for="{{ name }}">{{ label }}</label>
    <textarea class="form-control" rows="{{options.rows|default('5') }}" cols="{{ options.cols|default('40') }}" name="{{ name }}" id="{{ name }}" placeholder="{{ options.placeholder }}">{{ value }}</textarea>
</div>
{% endmacro %}