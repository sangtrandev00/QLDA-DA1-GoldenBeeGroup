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
                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
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

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Add New Product</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Product title</label>
                                <input type="text" class="form-control" placeholder="Product title">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Full description</label>
                                <textarea class="form-control" placeholder="Full description" rows="4"
                                    cols="4"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Images</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Tags</label>
                                <input type="text" class="form-control" placeholder="Enter tags">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Category</label>
                                <select class="form-select">
                                    <option>Fashion</option>
                                    <option>Electronics</option>
                                    <option>Furniture</option>
                                    <option>Sports</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Sub-category</label>
                                <select class="form-select">
                                    <option>Jeans</option>
                                    <option>T-Shirts</option>
                                    <option>Shoes</option>
                                    <option>Mobiles</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Price</label>
                                <div class="row g-3">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Price">
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <select class="form-select">
                                                <option> USD </option>
                                                <option> EUR </option>
                                                <option> RUBL </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Publish on website
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary px-4">Submit Item</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

</main>
<!--end page main-->