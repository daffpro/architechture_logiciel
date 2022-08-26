<div class="row justify-content-center">
    
            <!-- <?php //echo form_open_multipart('posts/add'); ?> -->
            <?php echo form_open_multipart('posts/add','role="studentForm" '); ?>
          <div class="col-md-12">
            <div class="row justify-content-center align-items-center post-add">
                <div class="col-md-8">
                    <label for="id_categorie" class="control-label"> <span class="text-danger"></span>Categorie article</label>
                    <div class="form-group">
                      <select name="id_categorie" class="form-control"> 
                        <option value="">select categorie</option>
                        <?php
                              foreach($all_categorie as   $categorie)
                              {
                                  $selected = ($categorie['id_categorie'] == $this->input->post('id_categorie')) ? ' selected="selected"' : ""; 
                                      echo '<option value="'.$categorie['id_categorie'].'" '.$selected.'>'.$categorie['nom_categorie'].'</option>'; 
                              } 
                              ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('id_categorie');?></span>
                          </div>
                </div>
              
                <div class="col-md-8">
                  <label for="titre_article" class="control-label"> <span class="text-danger"></span>Titre article</label>
                    <div class="form-group">
                      <input type="text" name="titre_article" value="<?php echo $this->input->post('titre_article'); ?>" class="form-control " id="titre_article" />
                      <span class="text-danger"><?php echo form_error('titre_article');?></span>
                  </div>
                </div>
                <div class="col-md-8">
                    <label for="description_article" class="control-label"> <span class="text-danger"></span>Description article</label>
                    <div class="form-group">
                    <textarea name="description_article" class="form-control  " id="description_article"><?php echo $this->input->post('description_article'); ?></textarea>
                      <span class="text-danger"><?php echo form_error('description_article');?></span>
                    </div>
                </div>
               
            </div>
          </div>

                <div class="col-md-12">
                  <label for="corps_article" class="control-label"> <span class="text-danger"></span>Corps article</label>
                  <div class="form-group">
                  <textarea name="corps_article" class="form-control" id="corps_article"><?php echo $this->input->post('corps_article'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('corps_article');?></span>
                  </div>
                </div>
            <div class="drop-zone col-md-12">
                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                <input type="file" name="myFile" class="drop-zone__input">
            </div>
                <div class="col-md-8">
                  <label for=" " class="control-label"> </label>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">  
                      <i class="fa fa-check"></i> Save 
                            </button> 
                  </div>
                </div>
            <?php echo form_close(); ?>
        
    </div>
</div>


