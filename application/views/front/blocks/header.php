<body>
  <script type="text/javascript">
    function changeLang(lang) {
      $.ajax({
        url: "<?php echo base_url(); ?>home/change/" + lang + "",
        success: function() {
          location.reload();
        }
      });
    }
  </script>

  <?php if ($_SESSION['lang'] != 'pl') : ?>
    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({
          pageLanguage: 'pl',
          layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT
        }, 'google_translate_element');
      }
      jQuery('.lang-select').click(function() {
        var theLang = jQuery(this).attr('data-lang');
        jQuery('.goog-te-combo').val(theLang);
        window.location = jQuery(this).attr('href');
        location.reload();
      });
    </script>
  <?php endif; ?>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <style>
    .goog-te-banner-frame.skiptranslate {
      display: none !important;
    }

    .cc-animate.cc-revoke.cc-bottom {
      transform: unset !important;
    }
  </style>
  <header>
    <nav class="flex_box yama_padding">
      <img class="nissan_logo" src="<?= base_url('assets/front/icons/nissan-logo.svg'); ?>">
      <div class="nav_separator"></div>
      <div class="logo_box">
        <img class="yama_logo" src="<?= base_url('assets/front/icons/yama-logo-white.svg'); ?>">
        <span class="hamburger smooth" onclick="toggle_nav()"><i class="line_middle"></i></span>
      </div>
    </nav>
    <div class="yama_menu yama_padding" id="sidemenu">
      <div class="flex_box flex_r"><span class="cross" onclick="toggle_nav()"><img class="smooth" src="<?= base_url('assets/front/icons/cross.svg'); ?>"></span></div>
      <div class="flex_box flex_r">
        <div class="menu_logo" style="background-image:url(<?= base_url('assets/front/icons/menu_logo.svg'); ?>)"></div>
        <div class="menu_box">
          <h1>Samochody nowe</h1>
          <h1>Dostępne od ręki</h1>
          <h1>Usługi</h1>
          <h1>O nas</h1>
          <h1>Aktualności</h1>
          <h1>Kontakt</h1>
        </div>
      </div>
    </div>
  </header>
  <main>