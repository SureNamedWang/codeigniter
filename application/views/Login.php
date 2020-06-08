<div class="main-panel">
<div class="container" style="margin-top: 10%; position: center;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
               
            </div>
             <?php echo $this->session->flashdata('msg'); ?>
            <div class="row" style="margin-left: -25%;">
            <div class="col">
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                    <form method="POST" action="<?php echo base_url();?>Login/cekLogin" id="formLogin">
                     <h4 class="page-title">Login</h4>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <input type="text" id="NIK" name="NIK" class="form-control" placeholder="NIK">
                        </div><br>
                     <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div><br>

                     <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="fas fa-list"></i>
                            </span>
                        </div>
                       <select name ="idServiceUnit" id="idServiceUnit" class="form-control">
                            <option value="IP-E7">EAST WING FL 7</option>
                            <option value="IP-E8">EAST WING FL 8</option>
                            <option value="IP-W7">WEST WING FL 7</option>
                            <option value="IP-W8">WEST WING FL 8</option>
                       </select>

                    </div>
                        <div class="card-footer text-muted">
                            <input type="submit" class="btn btn-space btn-lg btn-primary toggle-loading" name="loginSubmit" style="text-align: center; width: 100%" value="Log In">
                         <!--    <br><br>
                            <h5 style="text-align: center;">Belum punya akun? Silahkan daftar<a href='<?php echo base_url();?>Register/'> disini</a></h5> -->
                        </div>
                    </form>
                    </div>
                </div>  
            </div>
         <div class="col"></div>
         </div>
        </div>
             
    </div>

    </div>
</div>
