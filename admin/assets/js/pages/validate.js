$("#login-admin-form").validate({
  rules: {
    email: {
      required: true
    }
  },
  messages: {
    email: {
      required: "Bắt buộc điền email!"
    }
  }
})

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
      "title": {
        required: "Không de trong tieu de"
      },
      "noidung": {
        required: "Không de trong noi dung"
      }

    }
  });

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

//     $.each($.validator.methods, function (key, value) {
//         $.validator.methods[key] = function () {           
//             if(arguments.length > 0) {
//                 arguments[0] = $.trim(arguments[0]);
//             }
//             return value.apply(this, arguments);
//         };
//     });
// } (jQuery));

// auth admin
$( "#form-login-admin" ).validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    password:{
      required: true
    }
   
  },
  messages: {
      "email": {
          required: "Email không được để trống",
          email : "Định dạng email không đúng"
      },
      "password": {
        required : "Password không được để trống"
      }
  }
});

$("#forgot-auth-admin").validate({
  rules :{
    email: {
      required: true,
      email: true
    },
  messages: {
    "email":{
      required: "Email không được để trống",
      email : "Định dạng email không đúng",
    }
  }
  }
});

$("#resetpass-admin").validate({
  rules: {
    newpass: {
      required: true,
    },
    renewpass: {
      required: true,
      equalTo: "#newpass"
    }
  },
  messages: {
    newpass: {
      required: "Không để trống mật khẩu mới!"
    },
    renewpass: {
      required: "Không để trống nhập lại mật khẩu!",
      equalTo: "Nhập lại mật khẩu không chính xác!"
    }
  }
});

// form list user/ admin
$("#form-adduser").validate({
  rules: {
    fullname:{
      required: true
    },
    address:{
      required: true
    },
    email:{
      required: true,
      email: true
    },
    phone:{
      required: true,
      number: true
    },
    kichhoat:{
      required: true
    },
    username:{
      required: true
    },
    password:{
      required: true
    },
    image: {
      required: true
    },
    role:{
      required: true
    }
  },

  messages:{
    "fullname": {
      required: "Tên của bạn không được bỏ trống"
    },
    "address": {
      required: "Địa chỉ của bạn không được bỏ trống"
    },
    "email": {
      required: "Email không được để trống",
      email : "Định dạng email không đúng"
    },
    "phone":{
      required: "Số điện thoại của bạn không được để trống",
      number: "Số điện thoại không đúng định dạng. Bạn hãy nhập bằng số"
    },
    "kichhoat": {
      required: "Kích hoạt không được bỏ trống"
    },
    "username": {
      required: "Username của  bạn không được bỏ trống"
    },
    "password":{
      required: "Password của bạn không được bỏ trống"
    },
    "image": {
      required: "Hình ảnh của bạn không được để trống"
    },
    "role": {
      required: "Vai trò của bạn không được để trống"
    }
  }
});

$("#form-edit-user").validate({
  rules: {
    fullname:{
      required: true
    },
    address:{
      required: true
    },
    email:{
      required: true,
      email: true
    },
    phone:{
      required: true,
      number: true
    },
    kichhoat:{
      required: true
    },
    username:{
      required: true
    },
    password:{
      required: true
    },
    role:{
      required: true
    }
  },

  messages:{
    "fullname": {
      required: "Tên của bạn không được bỏ trống"
    },
    "address": {
      required: "Địa chỉ của bạn không được bỏ trống"
    },
    "email": {
      required: "Email không được để trống",
      email : "Định dạng email không đúng"
    },
    "phone":{
      required: "Số điện thoại của bạn không được để trống",
      number: "Số điện thoại không đúng định dạng. Bạn hãy nhập bằng số"
    },
    "kichhoat": {
      required: "Kích hoạt không được bỏ trống"
    },
    "username": {
      required: "Username của  bạn không được bỏ trống"
    },
    "password":{
      required: "Password của bạn không được bỏ trống"
    },
    "role": {
      required: "Vai trò của bạn không được để trống"
    }
  }
});

$("#form-edit-admin").validate({
  rules: {
    fullname:{
      required: true
    },
    address:{
      required: true
    },
    email:{
      required: true,
      email: true
    },
    phone:{
      required: true,
      number: true
    },
    kichhoat:{
      required: true
    },
    username:{
      required: true
    },
    password:{
      required: true
    },
    role:{
      required: true
    }
  },

  messages:{
    "fullname": {
      required: "Tên của bạn không được bỏ trống"
    },
    "address": {
      required: "Địa chỉ của bạn không được bỏ trống"
    },
    "email": {
      required: "Email không được để trống",
      email : "Định dạng email không đúng"
    },
    "phone":{
      required: "Số điện thoại của bạn không được để trống",
      number: "Số điện thoại không đúng định dạng. Bạn hãy nhập bằng số"
    },
    "kichhoat": {
      required: "Kích hoạt không được bỏ trống"
    },
    "username": {
      required: "Username của  bạn không được bỏ trống"
    },
    "password":{
      required: "Password của bạn không được bỏ trống"
    },
    "role": {
      required: "Vai trò của bạn không được để trống"
    }
  }
});


$("#user-profile-form").validate({
  rules: {
    email:{
      required: true,
      email: true
    },
    hoten:{
      required: true
    },
    phone: {
      required: true,
      phone: true
    },
    congty: {
      required: true,
    },
    address: {
      required: true
    },
    about_me: {
      required: true
    }
  },
  messages:{
    email:{
      required: "Không để trống email",
      email: "Email không đúng định dạng"
    },
    hoten:{
      required: "Họ và tên không để trống"
    },
    phone: {
      required: "Số điện thoại không để trống",
      phone: "Số điện thoại không chính xác"
    },
    congty: {
      required: "Công ty không để trống",
    },
    address: {
      required: "Địa chỉ không để trống"
    },
    about_me: {
      required: "Giới thiệu không để trống"
    }
  }
})