      
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h4 class="white-text">We Share®</h4>
                        <p class="grey-text text-lighten-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo.</p>
                    </div>
                    <div class="col l3 s12 offset-l3">
                        <h5 class="white-text">Liens <i class="material-icons">link</i></h5>
                        <ul class="footer-links">
                            <li><a class="white-text" href="#!">Comment ça marche ?</a></li>
                            <li><a class="white-text" href="{{ path('campaign_index') }}">Voir les campagnes</a></li>
                            <li><a class="white-text" href="{{ path('campaign_new') }}">Créer une campagne</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made with love by Eléa<i class="material-icons">copyright</i></a>
                </div>
            </div>
        </footer>
        
        <!----- ***** JQUERY CDN *****------>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!----- ***** MATERIALIZE CDN SCRIPT *****------>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>      

        <!----- ***** SIMPLEPARALLAX CDN SCRIPT *****------>
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script> -->

        <!-- ***** FLICKITY CAROUSEL ***** -->
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

        <!-- ***** BOXICON ICON ***** -->
        <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>

        <!-- ***** MARKDOWN EDITOR DESCRIPTION ***** -->
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <script>
            var simplemde = new SimpleMDE({ element: document.getElementById("description") });
        </script>

        <!----- ***** JS SCRIPT *****------>
        <script src="/js/rating.js"></script>
        <script src="/js/carousel-index.js"></script>
        <script src="/js/materialize.js"></script>

    </body>
</html>