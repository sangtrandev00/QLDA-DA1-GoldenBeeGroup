<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 me-auto">
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                class="bi bi-search"></i></div>
                        <input class="form-control ps-5" type="text" placeholder="Search Payment">
                    </div>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Pending</option>
                        <option>Show All</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Show 10</option>
                        <option>Show 30</option>
                        <option>Show 50</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>Customer Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Method</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#8562</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-1.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Thomas Hardy</p>
                                    </div>
                                </div>
                            </td>
                            <td>$854.00</td>
                            <td><span class="badge rounded-pill alert-success">Paid</span></td>
                            <td>Master Card</td>
                            <td>14 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#7568</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-2.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Victoria Hardy</p>
                                    </div>
                                </div>
                            </td>
                            <td>$653.00</td>
                            <td><span class="badge rounded-pill alert-success">Paid</span></td>
                            <td>Master Card</td>
                            <td>16 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#3265</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-3.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Maria Anders</p>
                                    </div>
                                </div>
                            </td>
                            <td>$152.00</td>
                            <td><span class="badge rounded-pill alert-danger">Failed</span></td>
                            <td>Master Card</td>
                            <td>18 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#8965</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-4.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Martin Loother</p>
                                    </div>
                                </div>
                            </td>
                            <td>$185.00</td>
                            <td><span class="badge rounded-pill alert-success">Paid</span></td>
                            <td>Master Card</td>
                            <td>19 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#4256</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-5.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Thomas Hardy</p>
                                    </div>
                                </div>
                            </td>
                            <td>$452.00</td>
                            <td><span class="badge rounded-pill alert-warning">Pending</span></td>
                            <td>Master Card</td>
                            <td>20 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#3245</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-6.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Victoria Hardy</p>
                                    </div>
                                </div>
                            </td>
                            <td>$352.00</td>
                            <td><span class="badge rounded-pill alert-success">Paid</span></td>
                            <td>Master Card</td>
                            <td>22 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#6589</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-7.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Maria Anders</p>
                                    </div>
                                </div>
                            </td>
                            <td>$452.00</td>
                            <td><span class="badge rounded-pill alert-danger">Failed</span></td>
                            <td>Master Card</td>
                            <td>25 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#7542</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-8.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Martin Loother</p>
                                    </div>
                                </div>
                            </td>
                            <td>$254.00</td>
                            <td><span class="badge rounded-pill alert-success">Paid</span></td>
                            <td>Master Card</td>
                            <td>28 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#6850</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-9.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Victoria Hardy</p>
                                    </div>
                                </div>
                            </td>
                            <td>$145.00</td>
                            <td><span class="badge rounded-pill alert-warning">Pending</span></td>
                            <td>Master Card</td>
                            <td>30 Apr 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#6534</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                    <img src="assets/images/avatars/avatar-10.png" class="rounded-circle" width="44"
                                        height="44" alt="">
                                    <div class="">
                                        <p class="mb-0">Thomas Hardy</p>
                                    </div>
                                </div>
                            </td>
                            <td>$105.00</td>
                            <td><span class="badge rounded-pill alert-success">Paid</span></td>
                            <td>Master Card</td>
                            <td>01 May 2020</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                        aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                    <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                        aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                        aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav class="float-end mt-3">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</main>
<!--end page main-->