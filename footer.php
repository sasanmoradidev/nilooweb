<?php
$options = get_option('nilooweb');
global $nilooweb; ?>

<!-- start footer-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <ul id="footer-cat">
                    <li class="footer-title">خرید</li>
                    <li>
                        <a class="link-hover" href="/"><span>خرید لباس</span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/3/"><span>لباس مردانه</span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/4/"><span>لباس زنانه</span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/5/"><span> لباس بچگانه </span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/256/"><span> خرید لوازم آرایشی </span> </a>
                    </li>

                </ul>
            </div>
            <div class="col-2">
                <ul id="footer-service">
                    <li class="footer-title">خدمات مشتریان</li>
                    <li>
                        <a class="link-hover" href="/faq/" target="_blank"><span> پرسش های متداول </span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/content/3/terms-and-conditions-of-use" target="_blank"><span> شرایط بازگشت </span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/content/12/Shopping-Guide" target="_blank"><span> راهنمای خرید </span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/organs/" target="_blank"><span> فروش B2B </span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="https://ecrating.ir/Clientdomains"><span> سنجش رضایتمندی </span> </a>
                    </li>
                </ul>
            </div>
            <div class="col-2">
                <ul id="footer-info">
                    <li class="footer-title">اطلاعات مدلایت</li>
                    <li>
                        <a class="link-hover" href="/content/4/about-us" target="_blank"><span> درباره ما </span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/content/2/legal-notice" target="_blank"><span> قوانین و مقررات </span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/content/5/Contact-us" target="_blank"><span> تماس با ما </span> </a>
                    </li>
                    <li>
                        <a class="link-hover" href="/banijobs?step=0" target="_blank"><span> فرصت های شغلی </span> </a>
                    </li>
                </ul>
            </div>

            <div class="col-3">
                <div id="footer-contact">
                    <p>
                        <span> میزبان صدای گرمتان هستیم</span>
                    </p>
                    <p class="time-work">7 روز هفته - 24 ساعته </p>
                    <div class="footer-contact-info">
                        <span>تلفن:</span><a href="tel:+982149215" class="ltr"><?php echo $options['phone']; ?></a>
                    </div>
                    <div class="footer-contact-info">
                        <span>پیامک:</span><a href="sms:+9810001654">10001654</a>
                    </div>
                    <div class="footer-contact-info float-none">
                        <span>ایمیل:</span><a href="mailto:<?php echo $options['email']; ?>"><?php echo $options['email']; ?></a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div id="footer-social">
                    <a href="/">
                        <img src="<?php echo $options['footerlogo']['url']; ?>" alt="مدلایت">
                    </a>
                    <a href="<?php echo $options['instagram']; ?>" class="app-download">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/app-download.svg" alt="دانلود اپلیکیشن">
                        <span> صفحه اینستاگرام</span>
                    </a>
                    <ul class="footer-social-icon">
                        <li>
                            <a href="https://www.instagram.com/banimodecom">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/footer-insta.svg" alt="اینستاگرام">
                        </a>
                        </li>
                        <li>
                            <a href="https://www.t.me/banimodecom">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/footer-telegram.svg" alt="تلگرام">
                        </a>
                        </li>
                        <li>
                            <a href="https://www.aparat.com/banimode">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/footer-aparat.svg" alt="آپارات">
                        </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/Banimodeir">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/footer-twitter.svg" alt="تويیتر">
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="footer-title" id="footer-about-title"><?php echo $options['copyrighttitle']; ?></h1>

            </div>

            <div class="col-7" id="footer-about">

                <p id="footertextlbl" style="text-align: justify;">
                  <?php echo $options['copyrightdesc']; ?>
                </p>

            </div>
            <div class="col-5">
                <ul id="footer-namad">
                    <li onclick="window.open(&quot;https://logo.samandehi.ir/Verify.aspx?id=270446&amp;p=uiwkjyoeobpdaodsaodsgvka&quot;, &quot;Popup&quot;,&quot;toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30&quot;)">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/footer/samandehi.png@2x.png" alt="نشان ملی ثبت">
                    </li>
                    <li onclick="window.open('https://ecunion.ir/verify/banimode.com?token=19111185c2a0339984fd', 'Popup','toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30')">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/footer/logo-itehad@2x.png" alt="اتحادیه کسب و کارهای مجازی">
                    </li>
                    <li data-toggle="modal" data-target="#anjoman"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/desktop/footer/eanjoman-foot.png" alt="انجمن کسب و کار اینترنتی">
                    </li>
                    <li>
                        <a target="_blank" rel="origin" href="https://trustseal.enamad.ir/?id=92281&Code=pGY3jgvOFAbMqVFPL4LW"><img src="https://Trustseal.eNamad.ir/logo.aspx?id=92281&Code=pGY3jgvOFAbMqVFPL4LW" alt="" style="cursor:pointer" id="pGY3jgvOFAbMqVFPL4LW"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row" id="footer-copyright">
            <div class="col-6">
                <p class="text-right">© کلیه حقوق این وب سایت متعلق به مدلایت است.</p>
            </div>
            <div class="col-6">
                <p class="text-left" dir="ltr">© Copyright 2021 modlight.com</p>
            </div>
        </div>
    </div>
    <div class="modal fade" id="anjoman">
        <div class="modal-dialog modal-dialog-centered select-size">
            <div class="modal-content">
                <button class="close" data-dismiss="modal" type="button">
            <span class="font-icon icon-cancel"></span>
        </button>
                <div class="modal-body">
                    <img src="/landing/eanjoman/esenfi.jpg" alt="انجمن کسب و کار اینترنتی">
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- end footer-->

<?php wp_footer() ?>
</body>
</html>
