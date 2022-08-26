<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Profil Edit</h3>
            <?php echo form_open('profil/edit/'.$profil['id_profil']); ?>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="nom_profil" class="control-label">  <span class="text-danger"></span>Nom profil</label>
                <div class="form-group">
                  <input type="text" name="nom_profil" value="<?php echo ($this->input->post('nom_profil') ? $this->input->post('nom_profil') : $profil['nom_profil']); ?>" class="form-control" id="nom_profil" />
                    <span class="text-danger"><?php echo form_error('nom_profil');?></span>
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
