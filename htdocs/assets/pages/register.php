<?php

include '../include/header.php';

?>
    
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 center">
                    <h4>Sign up</h4>
                </div>
            </div>
            <!--   Form Section   -->
            <div class="card">
                <div class="card-content">
                    <div class="row">

                        <form action="">
                            
                            <label for="inputEmail">Email</label>
                            <input type="email" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus>

                            <label for="inputEmail">Nick Name</label>
                            <input type="text" name="userName" id="inputName" class="form-control" required autofocus>
                            
                            <label for="inputPassword">Password</label>
                            <p>Must contains at least 8 characters, 1 MAJ </p>
                            <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required>


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