

// addproductForm form
$( "#add-product-form" ).validate({
    rules: {
      tensp: {
        required: true,
      },
      mo_ta: {
        required: true,
      },
      thong_tin: {
        required: true,
      },
      images: {
        required: function() {
          console.log(this)
        },
      },
      don_gia: {
        required: true,
        // equalTo: "#newpass"
        number: true,
        min: 0
      },
      giam_gia: {
        required: true,
        number: true,
        min: 0,
        max: 100
        // equalTo: "#newpass"
      },
      so_luong: {
        required: true,
        number: true,
        min: 0,
      },
      ma_danhmuc: {
        required: true,
        // equalTo: "#newpass"
        number: true
      }
     
    },
    messages: {
        "tensp": {
            required: "Không để trống tên sản phẩm",
        },
        "don_gia": {
            required: "Không để trống đơn giá",
            number: "Giá trị nhập phải là số",
            min: "Giá trị nhập phải lớn hơn 0"
        },
        "giam_gia": {
            required: "Bắt buộc nhập giảm giá",
            number: "Phải nhập số",
            min: "Giá trị nhỏ nhất là 0",
            max: "Giấ trị lớn nhất là 100"
        },
        so_luong: {
          required: "Không để trống số lượng",
          min: "Số lượng phải lớn hơn 0",
        },
        "ma_danhmuc": {
            required: "Bắt buộc nhập lại mã danh mục",
            number: "Bắt buộc phải nhập mã danh mục"
        },
        "images": {
            required: "Bắt buộc nhập lại hình ảnh sản phẩm",
            // equalTo: "Bắt buộc nhập giống mật khẩu"
        }
    }
  });

  // editproduct form
$( "#product-form" ).validate({
  rules: {
    tensp: {
      required: true,
    },
    don_gia: {
      required: true,
      // equalTo: "#newpass"
      number: true,
      min: 0
    },
    giam_gia: {
      required: true,
      number: true,
      min: 0,
      max: 100
      // equalTo: "#newpass"
    },
    so_luong: {
      required: true,
      min: 0,
    },
    ma_danhmuc: {
      required: true,
      // equalTo: "#newpass"
      number: true
    },
    images: {
      required: true,
      // equalTo: "#newpass"
    },

   
  },
  messages: {
      "tensp": {
          required: "Bắt buộc nhập tên sản phẩm đầy đủ",
      },
      "don_gia": {
          required: "Bắt buộc nhập số điện thoại",
          number: "Giá trị nhập phải là số",
          min: "Giá trị nhập phải lớn hơn 0"
      },
      "giam_gia": {
          required: "Bắt buộc nhập giảm giá",
          number: "Phải nhập số",
          min: "Giá trị nhỏ nhất là 0",
          max: "Giấ trị lớn nhất là 100"
      },
      "so_luong": {
        required: "Không để trống số lượng sản phẩm",
        min: "Số lượng sản phẩm phải lớn hơn 0"
      },
      "ma_danhmuc": {
          required: "Bắt buộc nhập lại mã danh mục",
          number: "Bắt buộc phải nhập mã danh mục"
      },
      "hinhanh1": {
          required: "Bắt buộc nhập lại hình ảnh chính sản phẩm",
          // equalTo: "Bắt buộc nhập giống mật khẩu"
      }
  }
});

  $("#add-blog").validate({
    rules: {
      title: {
        required: true
      },
      noidung: {
        required: true
      }
    },
    messages: {
      title: {
        required: "Không de trong tieu de"
      }
    }
  })

  // editcate form
  $( "#cate-form" ).validate({
    rules: {
      catename: {
        required: true
        // {
        //   depends: function() {
        //     $(this).val($.trim($(this).val()))
        //     return true;
        //   }
        // }
      },
      cateimage: {
        required: true
      },
      catedesc: {
        required: true
      }
     
    },
    messages: {
        "catename": {
            required: "Bắt buộc nhập tên danh mục đầy đủ",
        },
        cateimage: {
          required: "Hình ảnh sản phẩm không được rỗng"
        },
        catedesc: {
          required: "Mô tả sản phẩm không được rỗng"
        }
    }
  });
  // editcate form
  $( "#editcateForm" ).validate({
    rules: {
      catename: {
        required: true,
      }
     
    },
    messages: {
        "catename": {
            required: "Bắt buộc nhập tên danh mục đầy đủ",
        }
    }
  });

   // adduser form
   $( "#adduserForm" ).validate({
    rules: {
      fullname: {
        required: true,
      },
      address: {
        required: true,
      },
      email: {
        required: true,
      },
      phone: {
        required: true,
      },
      username: {
        required: true,
      },
      password: {
        required: true,
      },
      imageurl: {
        required: true,
      },
      role: {
        required: true,
        number: true
      }
     
    },
    messages: {
        "fullname": {
            required: "Bắt buộc nhập tên sản phẩm đầy đủ",
        },
        "address": {
            required: "Bắt buộc nhập địa chỉ đầy đủ",
        },
        "email": {
            required: "Bắt buộc nhập địa chỉ email đầy đủ",
        },
        "phone": {
            required: "Bắt buộc nhập số điện thoại",
        },
        "username": {
            required: "Bắt buộc nhập username",
        },
        "password": {
            required: "Bắt buộc nhập password",
        },
        "imageurl": {
            required: "Bắt buộc nhập hình ảnh",
        },
        "role": {
            required: "Bắt buộc nhập vai trò",
            number: "Bắt buộc nhập vai trò"
        }
    }
  });

   // edituser form
   $( "#edituserForm" ).validate({
    rules: {
      fullname: {
        required: true,
      },
      address: {
        required: true,
      },
      email: {
        required: true,
      },
      phone: {
        required: true,
      },
      username: {
        required: true,
      },
      password: {
        required: true,
      },
      imageurl: {
        required: true,
      },
      role: {
        required: true,
        number: true
      }
    },
    messages: {
        "fullname": {
            required: "Bắt buộc nhập tên sản phẩm đầy đủ",
        },
        "address": {
            required: "Bắt buộc nhập địa chỉ đầy đủ",
        },
        "email": {
            required: "Bắt buộc nhập địa chỉ email đầy đủ",
        },
        "phone": {
            required: "Bắt buộc nhập số điện thoại",
        },
        "username": {
            required: "Bắt buộc nhập username",
        },
        "password": {
            required: "Bắt buộc nhập password",
        },
        "imageurl": {
            required: "Bắt buộc nhập hình ảnh",
        },
        "role": {
            required: "Bắt buộc nhập vai trò",
            number: "Bắt buộc nhập vai trò"
        }
    }
  });

  $("#add-coupon-form").validate({
    rules: {
      coupon_name: {
        required: true,
        validateCouponCode: true
      },
      coupon_discount: {
        required: true,
        min: 0,
        max: 100
      },
      min_value: {
        required: true,
        min: 1000000
      },
      maximum_use: {
        required: true,
        min: 1,
        max: 1000,
      },
      date_start: {
        required: true

      },
      date_end: {
        required: true,
        greaterThanDate: "#date_start"
      }
    },

    messages: {
      coupon_name: {
        required: "Không để trống mã giảm giá!",
      },
      coupon_discount: {
        required: "Không để trống phần trăm giảm giá!",
        min: "Phằm trăm tối thiểu là 0",
        max: "Phần trăm tối đa là 100"
      },
      min_value: {
        required: "Không để trống đơn hàng tối thiểu!",
        min: "Đơn hàng tối thiểu phải ít nhất là 1000000 VND"
      },
      maximum_use: {
        required: "Không để trống số lượt sử dụng!",
        min: "Số lượt sử dụng tối thiểu là 1",
        max: "Số lượt sử dụng tối đa là 1000"
      },
      date_start: {
        required: "Không để trống thời gian bắt đầu!"
      },
      date_end: {
        required: "Không để trống thời gian kết thúc!"
      }
    }
  })

//   (function ($) {

//     $.each($.validator.methods, function (key, value) {
//         $.validator.methods[key] = function () {           
//             if(arguments.length > 0) {
//                 arguments[0] = $.trim(arguments[0]);
//             }
//             return value.apply(this, arguments);
//         };
//     });
// } (jQuery));


// $.validator.addMethod("validateCouponCode", function(value, element) {
//   return this.optional(element) || /^[a-zA-Z0-9_]*$/i.test(value);
//   // "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ cái và ít nhất một chữ số");   
// }, "Mã coupon phải là chữ cái a - z, hoặc chữ hoa A - Z, hoặc ký tự số 0 - 9")


// jQuery.validator.addMethod("greaterThanDate", 
// function(value, element, params) {

//     if (!/Invalid|NaN/.test(new Date(value))) {
//         return new Date(value) > new Date($(params).val());
//     }

//     return isNaN(value) && isNaN($(params).val()) 
//         || (Number(value) > Number($(params).val())); 
// },'Phải lớn hơn hoặc bằng {0}.');

// $("#date_end").rules('add', { greaterThanDate: "#date_start" });