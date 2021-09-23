<?php

include '../include/header.php';

?>

<!-- {# ************** SECTION CONTAINER HEADER IMG **************#} -->

    <!-- {# ************** SECTION FORMULAIRE **************#} -->
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 center">
                    <h4>Sign in</h4>
                </div>
            </div>
            <!--   Form Section   -->
            <div class="card">
                <div class="card-content">
                    <div class="row">

                        <form method="post">
                            <!-- {% if error %}
                                <div class="alert alert-danger">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
                            {% endif %} -->

                            <!-- {% if app.user %} -->
                                <!-- <div class="mb-3">
                                    You are logged in as {{ app.user.username }}, <a href="{{ path('app_logout') }}">Logout</a>
                                </div> -->
                            <!-- {% endif %} -->

                        
                            <label for="inputEmail">Email</label>
                            <input type="email" value="{{ last_username }}" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus>
                            
                            <label for="inputPassword">Mot de passe</label>
                            <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required>

                            <!-- <input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}"> -->
                            
                            <div class="input-field col s12 l12">    
                                <button class="btn btn-large waves-effect waves-light brown darken-2 col s12" style="margin-top: 20px;" type="submit" name="action">
                                    Create
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

<?php

include '../include/footer.php';

?>