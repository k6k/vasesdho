 
             <?php  
                        //On va verifier qu'on a des variables dans l'url
                   $ListArticle = new MyCms;
                  
                    if(isset($_GET['sec'])){
                       
                            //Choix de la fonction & paramètres
                               /**/
                               
                                $fonction='ListSectionCat'; 
                                $fonction2='CatArticle'; 
                                $element = $_GET['sec'];
                                $ifSec=1;//On verifie si l'url contient une variable Sec 
                                $index = 'nomCategorie';
                               
                                $ifId=1;//On vvérifie si on a bien un Id dans l'url
                                $limite =7;

                    }elseif(isset($_GET['cat'])){

                            
                            if(isset($_GET['id'])){
                                  $fonction='LireArticle'; 
                                  $fonction2='CatArticle'; 
                                  $element = $_GET['id'];
                                  $ifSec=0;
                                  $index = 'titreArticle';
                                  $limite =$_GET['cat'];
                                  $ifId=2;
                                  
                               }
                               else{
                                  $fonction='CatArticle'; 
                                  $fonction2='CatArticle'; 
                                  $element = $_GET['cat'];
                                  $ifSec=0;
                                  $index = 'titreArticle';
                                  $limite =7;
                                  $ifId=0;
                                  $link = 'cat='.$_GET['cat'].'';
                               }

                    }
                    else{
                            
                            //Choix de la fonction & paramètres 
                            $fonction='CatArticle'; 
                            $fonction2='CatArticle'; 
                            $element = 'non_classe';
                            $ifSec=0;
                            $ifId=0;
                            $index = 'titreArticle';
                            $limite =7;
                            $link = 'cat='.$_GET['cat'].'';
                    }

                    
                    $ordre  ="DESC";
                    $resArt_content   = $ListArticle->$fonction($element,$limite,$ordre);

                    if(isset($_GET['cat'])){
                       $element_cat = $_GET['cat'];
                    }else{
                       $element_cat = $_GET['sec'];
                    }
                    $lim = 7;
                    /*$resArt_content_cat = $ListArticle->$fonction2($element_cat,$limite,$ordre);*/
                    $resArt_content_cat = $ListArticle->CatArticle($element_cat,$lim,$ordre);
                    /* var_dump($resArt_content);
                   var_dump(sizeof($resArt_content_cat));*/

                    /*echo $element_cat.'/'.$lim.'/'.$ordre.'/'.$fonction2;*/

               ?>