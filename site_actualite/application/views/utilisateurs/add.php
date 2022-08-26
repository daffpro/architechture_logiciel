<div class="row">
    <div class="col-md-12">
            <?php echo form_open('utilisateurs/add'); ?>
             <div class="col-md-6">
               <label for="nom_utilisateur" class="control-label"> <span class="text-danger">*</span>Nom utilisateur</label>
                <div class="form-group">
                  <input type="text" name="nom_utilisateur" value="<?php echo $this->input->post('nom_utilisateur'); ?>" class="form-control " id="nom_utilisateur" />
                   <span class="text-danger"><?php echo form_error('nom_utilisateur');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="password" class="control-label"> <span class="text-danger">*</span>Password</label>
                <div class="form-group">
                  <input type="text" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control " id="password" />
                   <span class="text-danger"><?php echo form_error('password');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="nom" class="control-label"> <span class="text-danger">*</span>Nom</label>
                <div class="form-group">
                  <input type="text" name="nom" value="<?php echo $this->input->post('nom'); ?>" class="form-control " id="nom" />
                   <span class="text-danger"><?php echo form_error('nom');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="prenom" class="control-label"> <span class="text-danger">*</span>Prenom</label>
                <div class="form-group">
                  <input type="text" name="prenom" value="<?php echo $this->input->post('prenom'); ?>" class="form-control " id="prenom" />
                   <span class="text-danger"><?php echo form_error('prenom');?></span>
               </div>
             </div>
            <div class="col-md-6">
                <label for="id_profil" class="control-label"> <span class="text-danger">*</span>  Id profil</label>
                 <div class="form-group">
                  <select name="id_profil" class="form-control"> 
                    <option value="">select id_profil</option>
                     <?php
                          foreach($all_profil as   $profil)
                          {
                              $selected = ($profil['id_profil'] == $this->input->post('id_profil')) ? ' selected="selected"' : ""; 
                                   echo '<option value="'.$profil['id_profil'].'" '.$selected.'>'.$profil['id_profil'].'</option>'; 
                          } 
                          ?>
                        </select>
                        <span class="text-danger"><?php echo form_error('id_profil');?></span>
                      </div>
              </div>
             <div class="col-md-6">
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
</div>
