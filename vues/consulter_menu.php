				<div class="col-lg-9 col-md-9" >
                       <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title">
                                     <?php  
                                     if(isset($_GET['action']) && $_GET['action']=="supprimer")
                                     {
                                        $menu=new Menu();
                                        $menu->id=$_GET['id_menu'];
                                        $menu->supprimer();
                                        header("Location: personnaliser.php?p=consulter_menu&supp&menu&id_menu=".$_GET['id_menu']."&id_app=".$_GET['id_app']."");
                                     }
                                     else if(isset($_POST['id_menu']))
                                     {
                                        $menu=new Menu($_POST['id_menu'],$_GET['id_app'],$_POST['libelle'],$_POST['lien'],$_POST['ordre']);
                                        $menu->modifier();
                                        alert("Modification du menu effectué avec succée","success");                                        
                                     }
                                     else if(isset($_GET['supp']))
                                         alert("Suppression de menu effectué avec succée","success");
                                     else
										alert("Menu du site: $app->nom","info");
                                      ?> 
                                    </h5>
                                  <table border=0 style="width:100%;" >
                                    <thead style="text-align: center; font-weight: bold; color:#6C7279; border-style: solid ; border-color:#A1A6A9; ">
                                        <tr><td>Libellé</td><td>Lien</td><td>Ordre</td><td colspan="2">Action</td></tr></thead>
                                    <tbody style="border-style: solid ; border-color:#A1A6A9; ">
                                        <?php
                                            $i=0;
                                            $m=new Menu();
                                            $condition="where  id_application='".$app->id."' ORDER BY ordre ASC";
                                                while($i<compteurTable("menu",$condition))
                                                {
                                                $m->affiche($i,$condition);
                                                echo'<form method="post"><input type="hidden" name="id_menu" value="'.$m->id.'"/>
                                                <tr>
                                                <td ><input name="libelle" value="'.$m->libelle.'" style="width:130px;"  id="exampleName" placeholder="Libellé" type="text" class="form-control"></td>
                                                        <td>
                                                    <input name="lien" style="width:130px;"  id="exampleName" placeholder="Lien" value="'.$m->lien.'" type="text" class="form-control">
                                                         </td>
                                                         <td>
                                                <input value="'.$m->ordre.'" name="type" style="width:130px;"  id="exampleName" placeholder="type" type="number" class="form-control">
                                                 </td>
                                                <td><button  onclick="javascript:return confirm(\'voulez-vous vraiment modifier?\');"  type="submit" class="btn btn-success btn-sm">Modifier</button></td>
                                                <td><a class="btn btn-danger btn-sm" onclick="javascript:return confirm(\'voulez-vous vraiment supprimer?\');" href="index.php?p=consulter_menu&menu&action=supprimer&id_menu='.$m->id.'&id_app='.$app->id.'">Supprimer</a></td>
                                                </tr></form> ';
                                                $i++;
                                                }                                       
                                         ?>
                                    </tbody>
                                  </table> 
                            </div>
                    </div>
                </div>