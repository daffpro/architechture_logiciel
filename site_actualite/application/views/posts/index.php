 <!-- DataTables -->
 <link rel="stylesheet" href="<?php echo base_url('resources/plugins/datatables.net-bs');  ?>/css/dataTables.bootstrap.min.css">
<!-- DataTables -->
<script src="<?php echo base_url('resources/plugins/datatables.net');  ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('resources/plugins/datatables.net-bs');  ?>/js/dataTables.bootstrap.min.js"></script>
 <script>
                  $(function () {
                    $('#example1').DataTable()
                    $('#example2').DataTable({
                      'paging'      : true,
                      'lengthChange': false,
                      'searching'   : false,
                      'ordering'    : true,
                      'info'        : true,
                      'autoWidth'   : false
                    })
                  })
                  </script>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Posts  Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('posts/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                      <script>
                              var site_url="<?php echo site_url(); ?>";
                                  $(document).ready(function () {  
                                      $('.changeclm').on('change', function (e) { 
                                      var value = $(this).val();
                                      var clm_name = $('option:selected', this).attr('clm_name');

                                      var id = $('option:selected', this).attr('id');     
                                      // alert('>>>'+id+'<<<->>'+clm_name+'<<-->>'+value);
                                      if(value=='')
                                      {
                                        alert('select any column');
                                      }
                                      else
                                      {
                                         if(confirm('Are you sure you want to change?')){
                                                //  alert(value);
                                            $.ajax({
                                            type: 'POST',
                                            data: { value: value,clm_name:clm_name,id:id },
                                            url: site_url +"posts/get_search_values_by_clm",
                                            success: function (responsedata) {
                                                //  alert(responsedata);
                                                
                                                $('#view-load-id').html(responsedata); 
                                            },
                                            error: function (jqXHR, textStatus, errorThrown) {
                                                alert(jqXHR.responseText)
                                            }
                                            });  
                                          }
                                          else{
                                              return false;
                                          }

                                  
                                      }
                                      });
                                  });
                                  </script>
                <script>
               var site_url="<?php echo site_url(); ?>";
                  $(document).ready(function () { 
                    $('.clmchange').on('change', function (e) { 
                      var value = $(this).val();
                      if(value=='')
                      {
                        alert('select any column');
                      }
                      else
                      {
                    //  alert(value);
                        $.ajax({
                        type: 'POST',
                        data: { value: value },
                        url: site_url +"/posts/get_search_values_by_"+value,
                        success: function (responsedata) {
                            //   alert(responsedata);
                            
                            $('.tabledata-s').html(responsedata); 
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(jqXHR.responseText)
                        }
                        });
                      }
                      });

                       
                  });
                  </script>
    <div class="col-md-12">
            <?php echo form_open('posts/search_by_clm'); ?>
        <div class="col-md-2"> 
           <h4 class="box-title pull-right">Search by</h4>
        </div>
        <div class="col-md-2"> 
            <div class="form-group">
            <select name="column_name" class="form-control clmchange"  >
                <option value="">select </option>
                <option value="id_categorie">id_categorie </option>
                <option value="id_utilisateur">id_utilisateur </option>
              </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
            <select name="value_id" class="form-control tabledata-s">
                <option value="">select </option>
              </select>
            </div>
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-success pull-left" value="search">
        </div>
            <?php echo form_close(); ?>
    </div>
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Id categorie</th>
                    <th>Id utilisateur</th>
                    <th>Titre article</th>
                    <th>Description article</th>
                    <th>Corps article</th>
                    <th>Statut</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($posts) && $posts!=null)
           {
           foreach($posts as $p){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $p['id_categorie']; ?></td>
                    <td><?php echo $p['id_utilisateur']; ?></td>
                    <td><?php echo $p['titre_article']; ?></td>
                    <td><?php echo $p['description_article']; ?></td>
                    <td><?php echo $p['corps_article']; ?></td>
                    <td><?php echo $p['statut']; ?></td>
                     <td><a href="<?php echo site_url('posts/edit/'.$p['id_article']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a
                            onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('posts/remove/'.$p['id_article']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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

