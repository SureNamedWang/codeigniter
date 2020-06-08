<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard  <?php echo $serviceUnitId;?></h4>
            </div>
            <div class="row">
            <input type="hidden" name="txtRole" id="txtRole" value="<?php echo $role;?>">
              <div class="table-responsive">
               <table id="patientt-datatables" class="display table table-striped table-hover" cellspacing="0" width="100%">
                   <thead>
                       <tr>
                       <th>Registration Number</th>
                        <th>Nama pasien</th>
                        <th>MRN</th>
                        <th>Service Unit Name</th>
                        <th>Discharge Date</th>
                        <th>Bagian I</th>
                        <th>Bagian II</th>
                        <th>Bagian III</th>
                       </tr>
                   </thead>
                  
               </table>
               </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modal_bagian_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">IDENTITAS PASIEN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="info-pasien"></div>
                        </div>
                        <div class="modal-footer" id="footer">
                          
                            
                        </div>
                    </div>
                </div>
</div>

            <div class="modal fade bd-example-modal-lg" id="modal_bagian_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Swab Awal RS.National Hospital</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="info-pasien-2"></div>
                        </div>
                        <div class="modal-footer" id="footer2">
                          
                            
                        </div>
                    </div>
                </div>
            </div>

             <div class="modal fade bd-example-modal-lg" id="modal_bagian_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Kondisi Pasien</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="info-pasien-3"></div>
                        </div>
                        <div class="modal-footer" id="footer3">
                          
                            
                        </div>
                    </div>
                </div>
            </div>