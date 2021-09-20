</main>
<footer>
    <div class="grid-5 gtab-3 gmob-2 yama_padding">
        <div class="block_normal">
            <img class="footer_nissan" src="<?= base_url() . 'assets/front/icons/nissan-logo.svg' ?>">
            <img class="footer_yama" src="<?= base_url() . 'assets/front/icons/yama-logo.svg' ?>">
        </div>
        <div class="block_normal">
            <h1>oferta</h1>
            <a href="link">Samochody nowe</a>
            <a href="link">Dostępne od ręki</a>
            <a href="link">Serwis mechaniczny</a>
            <a href="link">Serwis blacharsko-lakierniczy</a>
            <a href="link">Finansowanie</a>
            <a href="link">Ubezpieczenia</a>
        </div>
        <div class="block_normal" id="models-col">
            <h1>modele</h1>
            <a href="link">Micra</a>
            <a href="link">Juke</a>
            <a href="link">Nowy Qashqai</a>
            <a href="link">X-Trail</a>
            <a href="link">Navara</a>
            <a href="link">Leaf</a>
            <a href="link">E-NV200</a>
            <a href="link">GT-R</a>
        </div>
        <div class="block_normal">
            <h1>Nissan Yama</h1>
            <a href="link">O nas</a>
            <a href="link">Salony</a>
            <a href="link">Aktualności</a>
            <a href="link">Kontakt</a>
            <a href="link">Numer konta</a>
            <a href="link">Polityka RODO</a>
            <a href="link">Pliki Cookies</a>
        </div>
        <div class="block_normal">
            <h1>Social Media</h1>
            <a href="link">Facebook</a>
            <a href="link">Instagram</a>
            <a href="link">LinkedIn</a>
        </div>
    </div>
    <div class="copyright yama_padding">
        <div>Copyright © Grupa Yama 2021. Wszystkie prawa zastrzeżone.</div>
        <div id="toright">Created with love by<a href="#">AdAwards</a></div>
    </div>
</footer>
<script type="text/javascript" src="<?= assets(); ?>js/jquery-3.4.1.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script> -->
<script type="text/javascript" src="<?= assets(); ?>js/lc_lightbox.lite.js"></script>
<script type="text/javascript" src="<?= assets(); ?>js/lightbox.js"></script>
<script type="text/javascript" src="<?= assets(); ?>js/qanim.js"></script>
<script type="text/javascript" src="<?= assets(); ?>js/quavosh-slider.js"></script>
<?php if ($cp == 'kontakt') : ?><script src="https://www.google.com/recaptcha/api.js?render=<?= @$settings->captcha ?>"></script> <?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js"></script>

<?php
$slider = 0;
if ($cp == 'main') {
    $slider = 1;
} elseif ($cp == 'oferty') {
    $slider = 1;
} elseif ($cp == 'poradnik') {
    $slider = 1;
}
?>

<script>
    var navbar_on = false;
    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });

    window.onload = function() {
        //put here all library functions
        qanim();
        quavosh_slider(<?= $slider; ?>);
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