    <?php 
                $ListArticle = new MyCms;

                  $resArt=$ListArticle->ListMenu($menu);
                  
                
               /**/

        ?>
    <div class="titrebox">
      <?php 
        echo '<h5 class="title gothic">'.ucfirst(html_entity_decode( $resArt[0]['textMenu'])).'</h5>';
         ?>
    </div>
     <?php 
                                                
        echo'<ul class="submenu">';
        for($i=0;$i<sizeof($resArt);$i++){
            echo '<li><a href="page.php?cat='.$menu.'&id='.$resArt[$i]['menulink'].'">'.utf8_encode(html_entity_decode( $resArt[$i]['subMenu'])).'</a></li>';
            /*echo '<li><a href="'.$resArt[$i]['menulink'].'.php?id='.$resArt[$i]['idSousMenu'].'">'.html_entity_decode( $resArt[$i]['subMenu']).'</a></li>';*/
        }
        echo'</ul>';

     ?> 