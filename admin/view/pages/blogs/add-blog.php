<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to blog</title>
</head>

<body>
    <main class="page-content">
        <section class="content blog-page p-4">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>New Post
                            <small>Welcome to Nexa Application</small>
                        </h2>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <ul class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Nexa</a>
                            </li>
                            <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                            <li class="breadcrumb-item active">New Post</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Enter Blog title" />
                                    </div>
                                </div>
                                <select class="form-control show-tick">
                                    <option>Select Category --</option>
                                    <option>Web Design</option>
                                    <option>Photography</option>
                                    <option>Technology</option>
                                    <option>Lifestyle</option>
                                    <option>Sports</option>
                                </select>
                                <form action="/" id="frmFileUpload" class="dropzone m-b-20 m-t-20" method="post"
                                    enctype="multipart/form-data">
                                    <div class="dz-message">
                                        <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                        <h3>Drop files here or click to upload.</h3>
                                        <em>(This is just a demo dropzone. Selected files are <strong>not</strong>
                                            actually
                                            uploaded.)</em>
                                    </div>
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <textarea id="ckeditor">
                            <h2>WYSIWYG Editor</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper sapien non nisl facilisis bibendum in quis tellus. Duis in urna bibendum turpis pretium fringilla. Aenean neque velit, porta eget mattis ac, imperdiet quis nisi. Donec non dui et tortor vulputate luctus. Praesent consequat rhoncus velit, ut molestie arcu venenatis sodales.</p>
                            <h3>Lacinia</h3>
                            <ul>
                                <li>Suspendisse tincidunt urna ut velit ullamcorper fermentum.</li>
                                <li>Nullam mattis sodales lacus, in gravida sem auctor at.</li>
                                <li>Praesent non lacinia mi.</li>
                                <li>Mauris a ante neque.</li>
                                <li>Aenean ut magna lobortis nunc feugiat sagittis.</li>
                            </ul>
                            <h3>Pellentesque adipiscing</h3>
                            <p>Maecenas quis ante ante. Nunc adipiscing rhoncus rutrum. Pellentesque adipiscing urna mi, ut tempus lacus ultrices ac. Pellentesque sodales, libero et mollis interdum, dui odio vestibulum dolor, eu pellentesque nisl nibh quis nunc. Sed porttitor leo adipiscing venenatis vehicula. Aenean quis viverra enim. Praesent porttitor ut ipsum id ornare.</p>
                        </textarea>
                                <button type="button"
                                    class="btn btn-raised btn-primary waves-effect m-t-20">Post</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Blog plugin js section -->

    <!-- Jquery Core Js -->
    <!-- <script src="assets/bundles/libscripts.bundle.js"></script>  -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script src="assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->
    <!-- Check editor <script src="assets/plugins/ckeditor/ckeditor.js"></script> -->

    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="assets/js/forms/editors.js"></script>

</body>

</html>
