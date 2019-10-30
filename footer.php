<?php global $meetup; ?>
      <!-- Start: Footer -->
      <div class="container-fluid footer">
        <div class="row contact">
          <div class="col-md-6 contact-form">
          <?php if(is_active_sidebar('footer-1')) {
            dynamic_sidebar('footer-1');

            }; ?>
          </div>
          <div class="col-md-4 col-md-offset-1 content-ct">
            <h3><span class="ti-twitter"></span> Twitter Feed</h3>
            <p>Lorem <a href="#">#Ipsum</a> is a dummy text used as a text filler in designs. This is just a dummy text. via <a href="#">@designerdada</a> </p>
            <hr>
            <p>Lorem Ipsum is a <a href="#">#dummy</a> text used as a text filler in designs. This is just a dummy text. via <a href="#">@designerdada</a> </p>
            <hr>
            <p>Lorem Ipsum is a <a href="#">#dummy</a> text used as a text filler in designs. This is just a dummy text. via <a href="#">@designerdada</a> </p>
          </div>
        </div>
        <div class="row footer-credit">
          <style>
              .footer-credit ul li a,.footer-credit a,.footer-credit p{
                color:<?php echo esc_attr($meetup['plcclr'])?>;
              }

            </style>
          <div class="col-md-6 col-sm-6">
            <p><?php echo esc_html($meetup['year'])?>, <a href="<?php echo esc_attr($meetup['comlinkurl'])?>"><?php echo esc_attr($meetup['comlink'])?></a> | <?php echo esc_attr($meetup['cprreserved'])?></p>
          </div>
          <div class="col-md-6 col-sm-6"> 

            <ul class="footer-menu" style="color:<?php echo esc_attr($meetup['plcclr']);?>">
              <li><a href="#"><?php echo esc_html($meetup['about'])?></a></li>
              <li><a href="#"><?php echo esc_html($meetup['policy'])?></a></li>
              <li><a href="#"><?php echo esc_html($meetup['condition'])?></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End: Footer -->

      <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-29231762-2', 'auto');
      ga('send', 'pageview');
      </script>
      <?php wp_footer(); ?>
    </body>
    </html>