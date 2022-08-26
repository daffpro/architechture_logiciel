<div class="row">
    <div class="col-md-12">
            <?php echo form_open('profil/add'); ?>
             <div class="col-md-6">
               <label for="nom_profil" class="control-label"> <span class="text-danger"></span>Nom profil</label>
                <div class="form-group">
                  <input type="text" name="nom_profil" value="<?php echo $this->input->post('nom_profil'); ?>" class="form-control " id="nom_profil" />
                   <span class="text-danger"><?php echo form_error('nom_profil');?></span>
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
