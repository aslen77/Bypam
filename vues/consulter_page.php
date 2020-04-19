<div class="col-lg-9 col-md-9" >
                       <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title">
                                     <?php  
                                     if(isset($_GET['action']) && $_GET['action']=="supprimer")
                                     {
                                        $page=new page();
                                        $page->id=$_GET['id_page'];
                                        $page->supprimer();
                                       
                                        header("Location: personnaliser.php?p=consulter_page&supp&menu&id_page=".$_GET['id_page']."&id_app=".$_SESSION['id_app']."");
                                     }
                                     else if(isset($_POST['id_page']))
                                     {
                                        $page=new page($_POST['id_page'],$_SESSION['id_app'],$_POST['titre'],$_POST['diriger_vers'],$_POST['type']);
                                        $page->modifier();
                                        alert("Modification du page effectué avec succée","success");                                        
                                     }
                                     else if(isset($_GET['supp']))
                                         alert("Suppression de la page effectué avec succée","success");
                                    else
                                     alert("Les pages d'application: $app->nom","info");

                                      ?> 
                                    </h5>
                               
                                  <table border=0 style="width:100%;" >
                                    <thead style="text-align: center; font-weight: bold; color:#6C7279; border-style: solid ; border-color:#A1A6A9; ">
                                        <tr><td>Titre</td><td>Diriger vers</td><td>Type de la page</td><td colspan="2">Action</td></tr></thead>
                                    <tbody style="border-style: solid ; border-color:#A1A6A9; ">
                                        <?php
                                            $i=0;
                                            $p=new Page();
                                            $condition="where id_application='".$_GET['id_app']."'";
                                            while($i<compteurTable("page",$condition))
                                            {
                                                $p->affiche($i,$condition);
                                                echo'<form method="post">
                                                <input type="hidden" name="id_page" value="'.$p->id.'"/>
                                                <tr>
                                                <td ><input name="titre" value="'.$p->titre.'" style="width:130px;"  id="exampleName"  type="text" class="form-control"></td>
                                                         <td>'; 
                                                         ?>                                                         
                                                         <select name="diriger_vers" required  >
                                                               <option></option>
                                                                <?php
                                                                  $j=0;
                                                                    $m=new Menu();
                                                                    $condition2="where  id_application='".$p->id_application."' ORDER BY ordre ASC";
                                                                    while($j<compteurTable("menu",$condition2))
                                                                      {
                                                                         $m->affiche($j,$condition2);
                                                                         if($m->id==$p->diriger_vers)
                                                                         echo'<option selected value="'.$m->id.'">'.$m->libelle.'</option>';
                                                                     else
                                                                        echo'<option value="'.$m->id.'">'.$m->libelle.'</option>';
                                                                          $j++;
                                                                        }
                                                                 ?>
                                                                </select>
                                                            </td>
                                                            <td>                                                       
                                                            <select name="type" style="width:130px;"  id="exampleName" class="form-control">
                                                                <option></option>
                                                                <option <?php if($p->type=="Formulaire")echo"selected"; ?>>Formulaire</option>
                                                                <option <?php if($p->type=="Table de données")echo"selected"; ?>>Table de données</option>
                                                            </select>
                                                        </td>
                                                <?php
                                                echo'<td><button  onclick="javascript:return confirm(\'voulez-vous vraiment modifier?\');"  type="submit" class="btn btn-success btn-sm">Modifier</button></td>
                                                <td><a class="btn btn-danger btn-sm" onclick="javascript:return confirm(\'voulez-vous vraiment supprimer?\');" href="personnaliser.php?p=consulter_page&page&action=supprimer&id_page='.$p->id.'&menu&id_app='.$p->id_application.'">Supprimer</a></td>
                                                </tr></form> ';
                                                $i++;
                                                }                                       
                                         ?>
                                    </tbody>
                                  </table> 
                                          
                            </div>
                    </div>
                </div>