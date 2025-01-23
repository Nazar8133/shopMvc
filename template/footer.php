</ul>
</div>
</div>
</div>
</div>
<!-- Footer ================================================================== -->
<div  id="footerSection">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h5>КОРИСНІ СТОРІНКИ</h5>
                <?php
                foreach ($menuList as $tmp): ?>
                    <a href='<?php if ($tmp['page']=='catalog'){ echo '/catalog/0/1/null/null';} else{ echo '/page/'.$tmp['page'];}?>'><?=$tmp['name']?></a>
                <?php endforeach; ?>
            </div>
            <div id="socialMedia" class="span3 pull-right">
                <h5>SOCIAL MEDIA </h5>
                <a href="#"><img width="60" height="60" src="/template/themes/images/facebook.png" title="facebook" alt="facebook"/></a>
                <a href="#"><img width="60" height="60" src="/template/themes/images/twitter.png" title="twitter" alt="twitter"/></a>
                <a href="#"><img width="60" height="60" src="/template/themes/images/youtube.png" title="youtube" alt="youtube"/></a>
            </div>
        </div>
        <p class="pull-right">&copy; Bootshop</p>
    </div><!-- Container End -->
</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="/template/themes/js/jquery.js" type="text/javascript"></script>
<script src="/template/themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/template/themes/js/google-code-prettify/prettify.js"></script>

<script src="/template/themes/js/bootshop.js"></script>
<script src="/template/themes/js/jquery.lightbox-0.5.js"></script>

<!-- Themes switcher section ============================================================================================= -->
<span id="themesBtn"></span>
</body>
</html>
