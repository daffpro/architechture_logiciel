<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Categorie  Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('categorie/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Id categorie</th>
                    <th>Nom categorie</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Deleted at</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($categorie) && $categorie!=null)
           {
           foreach($categorie as $c){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $c['id_categorie']; ?></td>
                    <td><?php echo $c['nom_categorie']; ?></td>
                    <td><?php echo $c['description']; ?></td>
                    <td><?php echo $c['created_at']; ?></td>
                    <td><?php echo $c['updated_at']; ?></td>
                    <td><?php echo $c['deleted_at']; ?></td>
                     <td><a href="<?php echo site_url('categorie/edit/'.$c['id_categorie']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('categorie/remove/'.$c['id_categorie']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                     </td>
                    </tr>
                     <?php }
                    
                           }else{
                                  echo 'No data found';
                             }

          ?>
                    </tbody>
                </table>
                <div class="pull-right">
                      <?php echo $this->pagination->create_links(); ?> 
                </div>
            </div>

        </div>
    </div>

</div>

