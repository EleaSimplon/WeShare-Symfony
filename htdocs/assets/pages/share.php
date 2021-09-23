<?php

include '../include/header.php';

?>

<section class="share-page">

    <div class="header-img">

    <div class="row">
        <div class="col s12 m6 l4 right">
            <h1><span>SHARE</span><br>your experience</h1>
        </div>
    </div>

    </div> 

    
    
    <!-- ********** FORM TO SHARE EXPERIENCE ********** -->
    
    <div class="container share-container">
        <!--   Form Section   -->
        <div class="card">
            <div class="card-content">
                <form>
                    <!-- ********** NICK NAME **********-->
                    <div class="row">
                        <div class="input-field col s12 l12">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" id="autocomplete-input" class="autocomplete" disabled="true">
                            <label for="autocomplete-input">Nick name User</label>
                        </div>
                    </div> 
                    <!-- ********** RATE RANGE **********-->
                    <div class="row">
                        <div class="input-field col s12 l12">
                            <h5><i class="material-icons prefix">star_half</i> Rate</h5>
                            <p class="range-field">
                                <input type="range" id="test5" min="0" max="5" />
                            </p>
                        </div>
                    </div>
                    <!-- ********** CHECK SWITCH **********-->
                    <h5><i class="material-icons prefix">check</i> Choose a category</h5>
                    <div class="row switch-choice">
                        
                        <div class="col s12 l3">
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span>
                                    Activity
                                </label>
                            </div>
                        </div>
                        <div class="col s12 l3">
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span>
                                    Restauration
                                </label>
                            </div>
                        </div>
                        <div class="col s12 l3">
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever"></span>
                                    Destination
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- ********** TITLE **********-->
                    <div class="row">
                        <div class="input-field col s12 l12">
                            <i class="material-icons prefix">title</i>
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Title</label>
                        </div>
                    </div>
                    <!-- ********** DESCRIPTION **********-->
                    <div class="input-field col s12">
                        <textarea id="description" class="materialize-textarea" placeholder="Share your experience with the community !"></textarea>
                    </div>
                    <!-- ********** UPLOAD PHOTO **********-->
                    <div class="row">
                        <h5><i class="material-icons prefix">vertical_align_bottom</i> Upload a picture</h5>
                        <div class="input-field col s12 l12">    
                            <div class="file-field input-field">
                                <div class="btn brown darken-1">
                                    <span>Upload</span>
                                    <input type="file" />
                                </div>
                                
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload file" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ********** BTN **********-->
                    <div class="row">
                        <div class="input-field col s12 l12">    
                        <button class="btn btn-large waves-effect waves-light brown darken-2 col s12" style="margin-top: 20px;" type="submit" name="action">
                            SUBMIT
                            <i class="material-icons right">send</i>
                        </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>

<script>
    //Parallax
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems);
    });
</script>

<?php

    include '../include/footer.php';

?>