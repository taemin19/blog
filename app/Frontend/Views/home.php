{% extends 'layout.php' %}
{% import "forms.php" as forms %}

{% block head %}
<title>Home</title>
{% endblock %}

{% block navbar %}
navbar-default
{% endblock %}

{% block content %}

<header>
  <div class="container">
    <div class="row">

      <div class="header-content">
        <div class="header-content-inner">
          <h1>John Doe</h1>
          <h3>Web Developper</h3>
             <ul class="list-inline social-buttons">
               <li>
                  <a href="#" class="btn btn-outline btn-xl"><i class="fa fa-github fa-fw"></i> Github</a>
               </li>
               <li>
                  <a href="#" class="btn btn-outline btn-xl"><i class="fa fa-linkedin fa-fw"></i> Linkedin</a>
               </li>
            </ul>
            <p>
               <a href="#about" class="page-scroll">About Me <i class="fa fa-arrow-circle-down"></i></a>
            </p>
        </div>
      </div>    
    </div>
  </div>
</header>

<section id="about" class="about">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>About <span class="text-primary">Me</span></h2>
                    <hr class="grey">
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-4">
                <div class="feature-image">
                    <img src="img/blog-image.png" class="img-responsive" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="feature-item">
                    <h3>Hello, I am John Doe<br/>Web Developper</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br/>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div><!-- /.row -->   

        <div class="row">
            <div class="feature-button">
                <a href="#" class="btn btn-inline btn-xl page-scroll">View my CV</a>
            </div>
        </div>

    </div><!-- /.container -->
</section>

<section id="skills" class="skills">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>My <span class="text-primary">Skills</span></h2>
                    <hr class="light">
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <div class="feature-item">
                    <i class="icon-screen-smartphone text-primary"></i>
                    <h4>HTML</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                            80%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature-item">
                    <i class="icon-camera text-primary"></i>
                    <h4>CSS</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                            80%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="feature-item">
                    <i class="icon-present text-primary"></i>
                    <h4>JAVA SCRIPT</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                            70%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature-item">
                    <i class="icon-lock-open text-primary"></i>
                    <h4>php</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                            90%
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->   

    </div><!-- /.container -->
</section>

<section id="contact" class="contact">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>Contact <span class="text-primary">Me</span></h2>
                    <hr class="light">
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-5">
                <div class="contact-info">
                    <ul>
                        <li>
                            <div class="contact-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-body">
                                <h4>Address</h4>
                                <p class="text-muted">My adress</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-body">
                                <h4>Email</h4>
                                <p class="text-muted">myemail@email.com</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-body">
                                <h4>Phone</h4>
                                <p class="text-muted">+33 0000000000</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7">

                {% include 'flash.php' %}
                
                <form action="" method="post">
                    {% if user.hasFlash('validFields') %}
                        {% set value = user.getFlash('validFields') %}
                    {% endif %}

                    {{ forms.input('name', 'Name', value.name, {placeholder: 'Your Name...'}) }}
                    
                    {{ forms.input('email', 'Email', value.email, {placeholder: 'Your Email...'}) }}
                    
                    {{ forms.input('subject', 'Subject', value.subject, {placeholder: 'Subject...'}) }}
                    
                    {{ forms.textarea('message', 'Message', value.message, {placeholder: 'Your Message...'}) }}
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
        
    </div><!-- /.container -->
</section>

<section id="social" class="social">
    <div class="container">
        <div class="row">
            <div class="social-content text-center">
                <ul class="list-inline">
                    <li class="social-icon">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="social-icon">
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                     <li class="social-icon">
                        <a href="#"><i class="fa fa-github"></i></a>
                    </li>
                     <li class="social-icon">
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div><!-- /.row -->   
    </div>
</section>

{% endblock %}