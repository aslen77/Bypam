<div class="row">
                    <div class="col-12">
                      <div class="row portfolio-grid">
<?php
$i=0;
$c=new Categorie();
$c->affiche(0,"where id='".$app->categorie."'");
$t=new Template();
while($i<compteurTable("template","where id_categorie='".$app->categorie."'"))
{
	$t->affiche($i,"where id_categorie='".$app->categorie."'");
?>
 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <figure class="effect-text-in">
						   <div class="column">
						   <img class="img-thumbnail" height="300" src="images/templates/<?php echo $c->libelle; ?>/<?php echo $t->photo; ?>" alt="image small"/>
							</div>
							<figcaption>
                              <h4 style="color:black;"><?php echo $t->libelle; ?></h4>
                              <p>
							  <a class="btn btn-dark btn-sm" data-title="<?php echo $t->libelle; ?>" class="example-image-link" href="images/templates/<?php echo $c->libelle; ?>/<?php echo $t->photo; ?>" data-lightbox="example-set">
							  Visualiser
							  <img style="width:0px;height:0px;" src="images/templates/<?php echo $c->libelle; ?>/<?php echo $t->photo; ?>" />
							  </a>
							  <a href="personnaliser_template.php?personnalier&id_app=<?php echo $_GET['id_app']; ?>&id_t=<?php echo $t->id; ?>" class="btn btn-dark btn-sm">
								Choisir
							  </a>        
							 </p>
                          </figure>
                        </div>
						</figcaption>
<?php
$i++;
}
?>						
					</div>
					</div>
</div>