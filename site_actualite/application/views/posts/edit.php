<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Posts Edit</h3>
            <?php echo form_open('posts/edit/'.$posts['id_article']); ?>
            <div class="box-body">
              <div class="row clearfix">
<div class="col-md-6">
            <label for="id_categorie" class="control-label">  <span class="text-danger"></span>  Id categorie</label>
            <div class="form-group">
              <select name="id_categorie" class="form-control">
                <option value="">select id_categorie</option>
                <?php  
 
                          foreach($all_categorie as   $categorie)
                          { 
                              $selected = ($categorie['id_categorie'] == $posts['id_categorie']) ? ' selected="selected"' : "";
                            
                              echo '<option value="'.$categorie['id_categorie'].'" '.$selected.'>'.$categorie['id_categorie'].'</option>'; 
                          } 
                          ?>
                        </select>
                        <span class="text-danger"><?php echo form_error('id_categorie');?></span>
                      </div>
                    </div>
<div class="col-md-6">
            <label for="id_utilisateur" class="control-label">  <span class="text-danger"></span>  Id utilisateur</label>
            <div class="form-group">
              <select name="id_utilisateur" class="form-control">
                <option value="">select id_utilisateur</option>
                <?php  
 
                          foreach($all_utilisateurs as   $utilisateurs)
                          { 
                              $selected = ($utilisateurs['id_utilisateur'] == $posts['id_utilisateur']) ? ' selected="selected"' : "";
                            
                              echo '<option value="'.$utilisateurs['id_utilisateur'].'" '.$selected.'>'.$utilisateurs['id_utilisateur'].'</option>'; 
                          } 
                          ?>
                        </select>
                        <span class="text-danger"><?php echo form_error('id_utilisateur');?></span>
                      </div>
                    </div>
           <div class="col-md-6">
               <label for="titre_article" class="control-label">  <span class="text-danger"></span>Titre article</label>
                <div class="form-group">
                  <input type="text" name="titre_article" value="<?php echo ($this->input->post('titre_article') ? $this->input->post('titre_article') : $posts['titre_article']); ?>" class="form-control" id="titre_article" />
                    <span class="text-danger"><?php echo form_error('titre_article');?></span>
               </div>
             </div> 
              <div class="col-md-6">
                <label for="description_article" class="control-label">  <span class="text-danger"></span>Description article</label>
                <div class="form-group">
                 <textarea name="description_article" class="form-control    " id="description_article"><?php echo ($this->input->post('description_article') ? $this->input->post('description_article') : $posts['description_article']); ?></textarea>
                 <span class="text-danger"><?php echo form_error('description_article');?></span>
                </div>
              </div> 
              
 <div class="col-md-6">
                <label for="corps_article" class="control-label">  <span class="text-danger"></span>Corps article</label>
                <div class="form-group">
                 <textarea name="corps_article" class="form-control    " id="corps_article"><?php echo ($this->input->post('corps_article') ? $this->input->post('corps_article') : $posts['corps_article']); ?></textarea>
                 <span class="text-danger"><?php echo form_error('corps_article');?></span>
                </div>
              </div> 
              
           <div class="col-md-6">
               <label for="statut" class="control-label">  <span class="text-danger"></span>Statut</label>
                <div class="form-group">
                  <input type="text" name="statut" value="<?php echo ($this->input->post('statut') ? $this->input->post('statut') : $posts['statut']); ?>" class="form-control" id="statut" />
                    <span class="text-danger"><?php echo form_error('statut');?></span>
               </div>
             </div> 
                     </div>
      </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Save
              </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
