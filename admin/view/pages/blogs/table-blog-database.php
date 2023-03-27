<?php
$blog_list = blog_select_all();
// var_dump($blog_list);

foreach ($blog_list as $blog_item) {

    $image_list = explode(",", $blog_item['images']);
    $thumbnail = getthumbnail($image_list);
    $xoablog = "index.php?act=deleteblog&id=" . $blog_item['blog_id'];
    $suablog = "index.php?act=editblog&id=" . $blog_item['blog_id'];
    $conten = mb_substr($blog_item['noi_dung'], 0, 40);
    $blog_title = mb_substr($blog_item['blog_title'], 0, 20);
    # code...
    echo '
                            <tr>
                                <td>
                                    ' . $blog_item['blog_id'] . '
                                </td>
                                <td class="productlist">
                                    <a class="d-flex align-items-center gap-2" href="#">
                                    <div class="product-box"><img src="' . $thumbnail . '" alt="' . $thumbnail . '"></div>
                                        <div>
                                            <h6 class="mb-0 product-title">' . $blog_title . '...</h6>
                                        </div>
                                    </a>
                                </td>
                                <td><span>' . $conten . '...</span></td>
                                <td><span>' . $blog_item['create_time'] . '</span></td>
                                <td><span>' . $blog_item['tags'] . '</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="" class="text-primary"
                                            title=""
                                            aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                        <a href="' . $suablog . '" class="text-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                            aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>

                                        <i style="color:#e72e2e;" class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#exampleModal""></i>
                                    </div>
                                </td>
                            </tr>
                            ';
}
