</main>
<footer>

</footer>
<script type="text/javascript" src="<?= assets(); ?>js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?= assets(); ?>js/bootstrap.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script> -->
<script type="text/javascript" src="<?= assets(); ?>js/lc_lightbox.lite.js"></script>
<script type="text/javascript" src="<?= assets(); ?>js/lightbox.js"></script>
<script type="text/javascript" src="<?= assets(); ?>js/qanim.js"></script>
<?php if ($cp == 'kontakt') : ?><script src="https://www.google.com/recaptcha/api.js?render=<?= @$settings->captcha ?>"></script> <?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js"></script>

<script>
    var navbar_on = false;
    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
        // ... more custom settings?
    });

    function set_size() {
        if (window.screen.width > 1024) {
            var body = document.getElementById('body');
            var h = body.getBoundingClientRect().height;
            var m = (h * 1.0) / 0.75;
            var value = Math.round(-1 * (m - h));
            var text = value.toString() + "px";
            body.style.marginBottom = text;
        }

    }

    window.onload = function() {
        //put here all library functions
        qanim();
    };

    function reset_bar() {
        document.getElementById('sidemenu').style.left = 100 + "%";
        navbar_on = false;
    }
    window.onresize = reset_bar;
    grecaptcha.ready(function() {
        grecaptcha.execute('<?= @$settings->captcha ?>', {
            action: 'homepage'
        }).then(function(token) {

        });
    });

    function toggle_nav() {
        var element = document.getElementById('sidemenu');
        if (navbar_on == false) {
            navbar_on = true;
            element.style.left = 0 + "%";

        } else {
            navbar_on = false;
            element.style.left = 100 + "%";
        }
    }
</script>
<script>
    window.addEventListener("load", function() {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "<?= $settings->first_color; ?>",
                    "text": "#fff"
                },
                "button": {
                    "background": "#eee",
                    "text": "#1C2331!important"
                }
            },
            "type": "opt-out",
            "content": {
                "message": "Nasza strona internetowa korzysta z plików cookie. Dzięki temu możemy zapewnić naszym użytkownikom satysfakcjonujące wrażenia z przeglądania naszej witryny i jej prawidłowe funkcjonowanie.",
                "dismiss": "Rozumiem",
                "deny": "",
                "allow": "Rozumiem",
                "link": "Czytaj więcej...",
                "href": "<?php echo base_url(); ?>uploads/<?= $settings->privace;  ?>"
            }
        })
    });
</script>
<?php if ($cp == 'kontakt') : ?>

    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('<?= @$settings->captcha ?>', {
                action: 'homepage'
            }).then(function(token) {

            });
        });
    </script>
    <script type="text/javascript">
        $('#contact-form').submit(function(event) {
            event.preventDefault();
            var email = $('#email').val();

            grecaptcha.ready(function() {
                grecaptcha.execute('<?= @$settings->captcha ?>', {
                    action: 'mailer/send'
                }).then(function(token) {
                    $('#contact-form').prepend('<input type="hidden" name="token" value="' + token + '">');
                    $('#contact-form').unbind('submit').submit();
                });;
            });
        });
    </script>
<?php endif; ?>

</body>

</html>