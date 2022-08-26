<div class="row">
    <div class="col-md-12">
            <?php echo form_open('categorie/add'); ?>
             <!-- <div class="col-md-6">
               <label for="id_categorie" class="control-label"> <span class="text-danger"></span>Id categorie</label>
                <div class="form-group">
                  <input type="text" name="id_categorie" value="<?php echo $this->input->post('id_categorie'); ?>" class="form-control " id="id_categorie" />
                   <span class="text-danger"><?php echo form_error('id_categorie');?></span>
               </div>
             </div> -->
             <div class="col-md-6">
               <label for="nom_categorie" class="control-label"> <span class="text-danger"></span>Nom categorie</label>
                <div class="form-group">
                  <input type="text" name="nom_categorie" value="<?php echo $this->input->post('nom_categorie'); ?>" class="form-control " id="nom_categorie" />
                   <span class="text-danger"><?php echo form_error('nom_categorie');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="description" class="control-label"> <span class="text-danger"></span>Description</label>
                <div class="form-group">
                  <input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control " id="description" />
                   <span class="text-danger"><?php echo form_error('description');?></span>
               </div>
             </div>
             <!-- <div class="col-md-6">
               <label for="created_at" class="control-label"> <span class="text-danger"></span>Created at</label>
                <div class="form-group">
                  <input type="text" name="created_at" value="<?php echo $this->input->post('created_at'); ?>" class="form-control " id="created_at" />
                   <span class="text-danger"><?php echo form_error('created_at');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="updated_at" class="control-label"> <span class="text-danger"></span>Updated at</label>
                <div class="form-group">
                  <input type="text" name="updated_at" value="<?php echo $this->input->post('updated_at'); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="updated_at" />
                   <span class="text-danger"><?php echo form_error('updated_at');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="deleted_at" class="control-label"> <span class="text-danger"></span>Deleted at</label>
                <div class="form-group">
                  <input type="text" name="deleted_at" value="<?php echo $this->input->post('deleted_at'); ?>" class="form-control " id="deleted_at" />
                   <span class="text-danger"><?php echo form_error('deleted_at');?></span>
               </div>
             </div> -->
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
