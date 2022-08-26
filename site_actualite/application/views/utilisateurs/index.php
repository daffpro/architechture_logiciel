<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Utilisateurs  Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('utilisateurs/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Nom utilisateur</th>
                    <th>Password</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Id profil</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($utilisateurs) && $utilisateurs!=null)
           {
           foreach($utilisateurs as $u){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $u['nom_utilisateur']; ?></td>
                    <td><?php echo $u['password']; ?></td>
                    <td><?php echo $u['nom']; ?></td>
                    <td><?php echo $u['prenom']; ?></td>
                    <td><?php echo $u['id_profil']; ?></td>
                     <td><a href="<?php echo site_url('utilisateurs/edit/'.$u['id_utilisateur']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('utilisateurs/remove/'.$u['id_utilisateur']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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

