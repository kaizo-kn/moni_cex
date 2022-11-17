<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-5 rounded modal-bs mt-3">
                <div class="card-body cardbody-color p-lg-5 ">
                    <h2 class="text-center text-light mt-3">PMT PTPN IV Dolok Ilir</h2>
                    <div class="d-flex justify-content-center mb-3">
                        <div class="rounded bg-light p-3 rounded-circle">
                            <img src="assets/icon/Logo_PTPN4.png" class="img-fluid profile-image-pic" width="200px" alt="profile">
                        </div>
                    </div>
                    <form action="pmt-login.php" method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" placeholder=" Masukkan Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                        </div>
                        <div class="text-center row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-5 mb-2">Login</button>
                            </div>
                            <div class="col-6">
                                <button onclick="dismissLoginModal()" type="button" class="btn btn-danger px-5 mb-2">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>