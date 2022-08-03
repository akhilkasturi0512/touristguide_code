
<?php $__env->startSection('title'); ?>
<title><?php echo e($data['title']); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinecss'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/assets/css/datatables.css')); ?>">
<style>

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="page-body">



  <div class="container-fluid">
      <div class="row">
        <!-- Zero Configuration  Starts-->

        <div class="col-sm-12 col-xl-12 xl-100">
            <div class="card">
              <div class="card-header pb-0">
                <h5>Detail of <?php echo e($hostelOwner->name); ?></span>

              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3 tabs-responsive-side">
                    <div class="nav flex-column nav-pills border-tab nav-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#info-home" role="tab" aria-controls="v-pills-home" aria-selected="true"> <i class="fas fa-home"></i> Basic Details</a>
                        <a class="nav-link " id="v-pills-profile-tab" data-bs-toggle="pill" href="#info-documents" role="tab" aria-controls="v-pills-profile" aria-selected="false"> <i class="far fa-file-pdf"></i> Documents</a>
                        <a class="nav-link " id="v-pills-messages-tab" data-bs-toggle="pill" href="#info-bank" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-bank"></i> Bank Details</a>
                        <a class="nav-link " id="v-pills-messages-tab" data-bs-toggle="pill" href="#info-property" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-building"></i> Service Property</a>
                        <!--<a class="nav-link " id="v-pills-messages-tab" data-bs-toggle="pill" href="#info-mess" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-clock"></i> Mess Details</a>-->
                        <!--<a class="nav-link " id="v-pills-messages-tab" data-bs-toggle="pill" href="#info-room" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-person-booth"></i> Room Details</a>-->
                        <a class="nav-link " id="v-pills-messages-tab" data-bs-toggle="pill" href="#info-booking" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="far fa-check-circle"></i> Booking Details</a>
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="tab-content" id="v-pills-tabContent">
                      <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col" width="200">Name</th>
                                  <td scope="col"  width="500"><?php echo e($hostelOwner->name); ?></td>
                                </tr>
                                <?php if($hostelOwner->profile_image): ?>
                                <tr>
                                    <th scope="col" width="200" style="padding-bottom: 49px;">Profile</th>
                                    <td><img style="width:100px;height:100px" src="<?php echo e(url($hostelOwner->profile_image)); ?>"></td>
                                </tr>
                                <?php endif; ?>

                                <tr>
                                  <th scope="col" width="200">E-mail</th>
                                  <td scope="col"  width="500"><?php echo e($hostelOwner->email); ?></td>
                                </tr>

                                <tr>
                                  <th scope="col" width="200">Mobile</th>
                                  <td scope="col"  width="500"><?php echo e($hostelOwner->mobile); ?></td>
                                </tr>

                                <tr>
                                    <th scope="col" width="200">Address</th>
                                    <td scope="col"  width="500"><?php echo e($hostelOwner->address); ?></td>
                                </tr>

                                <tr>
                                    <th scope="col" width="200">City</th>
                                    <td scope="col"  width="500"><?php echo e($city->name); ?></td>
                                </tr>

                                <tr>
                                    <th scope="col" width="200">State</th>
                                    <td scope="col"  width="500"><?php echo e($state->name); ?></td>
                                </tr>

                                <tr>
                                  <th scope="col" width="200">Status</th>
                                  <td scope="col"  width="500"><?php echo ($hostelOwner->status=='1')?'<span class="badge badge-success"> Active </span>':'<span class="badge badge-danger"> INActive </span>'; ?></td>
                                </tr>


                              </thead>

                            </table>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="info-documents" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col" width="200">Aadhar Card</th>
                                  <td scope="col"  width="500"><?php echo e(($hostelOwner->documents)?$hostelOwner->documents->aadharcard:'N/A'); ?></td>
                                </tr>

                                

                                <tr>
                                  <th scope="col" width="200">Pan Card</th>
                                  <td scope="col"  width="500"><?php echo e(($hostelOwner->documents)?$hostelOwner->documents->pancard:'N/A'); ?></td>
                                </tr>

                                <tr>
                                  <th scope="col" width="200">Other</th>
                                  <td scope="col"  width="500"><?php echo e(($hostelOwner->documents)?$hostelOwner->documents->other:'N/A'); ?></td>
                                </tr>

                                <tr>
                                    <th scope="col" width="200">Business Pancard</th>
                                    <td scope="col"  width="500"><?php echo e(($hostelOwner->documents)?$hostelOwner->documents->business_pancard:'N/A'); ?></td>
                                </tr>

                                <tr>
                                    <th scope="col" width="200">Business Name</th>
                                    <td scope="col"  width="500"><?php echo e(($hostelOwner->documents)?$hostelOwner->documents->business_name:'N/A'); ?></td>
                                </tr>

                                <tr>
                                    <th scope="col" width="200">Status</th>
                                    <td scope="col"  width="500"><?php echo ($hostelOwner->status=='1')?'<span class="badge badge-success"> Active </span>':'<span class="badge badge-danger"> INActive </span>'; ?></td>
                                </tr>
                              </thead>

                            </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="info-bank" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col" width="200">Bank Name</th>
                                  <td scope="col"  width="500"><?php echo e(($hostelOwner->bank)?$hostelOwner->bank->name:'N/A'); ?></td>

                                </tr>

                                <tr>
                                  <th scope="col" width="200">IFSC Code</th>

                                  <td scope="col"  width="500"><?php echo e(($hostelOwner->bank)?$hostelOwner->bank->ifsc_code:'N/A'); ?></td>

                                </tr>

                                <tr>
                                  <th scope="col" width="200">Account Number</th>

                                  <td scope="col"  width="500"><?php echo e(($hostelOwner->bank)?$hostelOwner->bank->account_no:'N/A'); ?></td>

                                </tr>

                                <tr>
                                    <th scope="col" width="200">Business Pancard</th>

                                    <td scope="col"  width="500"><?php echo e(($hostelOwner->bank)?$hostelOwner->bank->micr_no:'N/A'); ?></td>

                                </tr>

                                <tr>
                                    <th scope="col" width="200">Business Name</th>

                                    <td scope="col"  width="500"><?php echo e(($hostelOwner->bank)?$hostelOwner->bank->branch:'N/A'); ?></td>

                                </tr>

                              </thead>

                            </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="info-property" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="table-responsive">
                            <table class="display table data-table">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Business Name</th>
                                    <th>Category</th>
                                    <th>Min. Price</th>
                                    <th>Max. Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $service_property; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$key); ?></td>
                                            <td><?php echo e(($val2)?$val2->business_name:'N/A'); ?></td>
                                            <td><?php echo e(($val2)?$val2->businesscat->name:'N/A'); ?></td>
                                            <td><i class="fa fa-inr"></i> <?php echo e(($val2)?$val2->min_price:'N/A'); ?></td>
                                            <td><i class="fa fa-inr"></i> <?php echo e(($val2)?$val2->max_price:'N/A'); ?></td>
                                            <td> <?php echo e(($val2)?$val2->description:'N/A'); ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="<?php echo e(route('service_property-edit',$val2->id)); ?>">Edit</a>
                                                <a class="btn btn-primary" href="<?php echo e(route('service_property-view',$val2->id).'#info-home'); ?>">View</a>
                                            </td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                          </div>
                      </div>
                     
                     
                      
                      
                      <div class="tab-pane fade" id="info-booking" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="table-responsive">

                            <table class="table display data-table">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    
                                    <th>Unique Id</th>
                                    <th>Payment Type</th>
                                    <th>Booking Date</th>
                                    <th>Transaction Id</th>
                                    <th>Payment Status</th>


                                  </tr>
                                </thead>
                                <tbody>
                                    <?php if($booking): ?>
                                    <?php $__currentLoopData = $booking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                        <tr>
                                        <td><?php echo e(++$key); ?></td>
                                        <td><?php echo e(($val2->users)?$val2->users->name:'N/A'); ?></td>
                                        
                                        <td><?php echo e($val2->unique_id); ?></td>
                                        <td><?php echo e($val2->payment_type); ?></td>
                                        <td><?php echo e($val2->booking_date); ?></td>
                                        <td><?php echo e($val2->transaction_id); ?></td>
                                        <td><?php echo e($val2->payment_status); ?></td>
                                        </tr>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagejs'); ?>


<script src="<?php echo e(asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(asset('admin/assets/js/kitfile.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>


$(document).ready(() => {
          let url = location.href;

          if (location.hash) {
            const hash = url.split("#");
            $('a[href="#'+hash[1]+'"]').tab("show");
            url = location.href.replace(/\/#/, "#");
            history.replaceState(null, null, url);
            setTimeout(() => {
              $(window).scrollTop(0);
            }, 400);
          }

          $('a[data-bs-toggle="pill"]').on("click", function() {
            let newUrl;
            const hash = $(this).attr("href");
            if(hash == "#home") {
              newUrl = url.split("#")[0];
            } else {
              newUrl = url.split("#")[0] + hash;
            }
            newUrl += "";
            history.replaceState(null, null, newUrl);
          });
    });

    const anchor = window.location.hash;
$(`a[href="${anchor}"]`).tab('show');

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/merarum/public_html/app/resources/views/admin/hostelowner/hostelowner-show.blade.php ENDPATH**/ ?>